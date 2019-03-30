<?php
namespace classes\data;

use classes\entity\MailLink;

use classes\util\DBUtil;

class MailLinkManagerDB
{


    /**
     * @param Insert Maillink $mail data into the mysql database
     */
    public static function saveMailLink(MailLink $mailLink){
        $conn=DBUtil::getConnection();
        $sql="call procSaveMailLink(?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $mailLink->emailId,$mailLink->userId, $mailLink->status);
        $stmt->execute();
        if($stmt->errno!=0){
            printf("Error: %s.\n",$stmt->error);
        }
        $stmt->close();
        $conn->close();
    }



}
?>
