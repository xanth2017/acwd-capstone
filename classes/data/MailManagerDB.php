<?php
namespace classes\data;

use classes\entity\Mail;
use classes\entity\MailList;
use classes\util\DBUtil;

class MailManagerDB
{

    /**
     * @param $row which is an array which holds the values of the user information
     * @return a new User object
     */
    public static function fillMail($row){
        $mail=new Mail();
        $mail->emailId=$row["email_id"];
        $mail->emailBody=$row["email_body"];
        $mail->emailSubject=$row["email_subject"];
        return $mail;
    }

    /**
     * @param $row which is an array which holds the values of the user information
     * @return a new User object
     */
    public static function fillMailList($row){
        $maillist=new Mail();
        $maillist->emailId=$row["email_id"];
        $maillist->emailBody=$row["email_body"];
        $maillist->emailSubject=$row["email_subject"];
        $maillist->recipentEmail=$row["email"];
        $maillist->recipentFirstName=$row["firstname"];
        $maillist->recipentLastName=$row["lastname"];
        $maillist->sentDate=$row["created_on"];
        return $maillist;
    }


    /**
     * @param Insert Mail $mail data into the mysql database
     */
    public static function saveMail(Mail $mail){
        $conn=DBUtil::getConnection();
        $sql="call procSaveMail(?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $mail->emailBody,$mail->emailSubject);
        $stmt->execute();
        if($stmt->errno!=0){
            printf("Error: %s.\n",$stmt->error);
        }
        $stmt->close();
        $conn->close();
    }

    public static function getLatestMail(){
        $email = NULL;
        $conn=DBUtil::getConnection();
        $sql="select * from tb_email order by email_id desc limit 1";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            if($row = $result->fetch_assoc()){
                $email=self::fillMail($row);
            }
        }
        $conn->close();
        return $email;
    }

    public static function getAllSuccessMail(){
      $list = array();
      $conn=DBUtil::getConnection();
      $sql="SELECT tb_user.firstname, tb_user.lastname, tb_user.email, tb_email.email_body, tb_email.email_subject, tb_email.created_on, tb_email.email_id
            FROM tb_email_link
            LEFT JOIN tb_email ON tb_email_link.email_id=tb_email.email_id
            LEFT JOIN tb_user ON tb_email_link.user_id=tb_user.id
            WHERE tb_email_link.status=1";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()){
            $mail=self::fillMailList($row);
            $list[]=$mail;
          }
      }
      $conn->close();
      return $list;

    }



}
?>
