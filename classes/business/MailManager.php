<?php
namespace classes\business;

use classes\entity\Mail;
use classes\entity\MailLink;
use classes\entity\MailList;
use classes\data\MailManagerDB;
use classes\data\MailLinkManagerDB;

class MailManager
{

  public function saveMail(Mail $mail){
      return MailManagerDB::saveMail($mail);
  }

  public function getLatestMail(){
    return MailManagerDB::getLatestMail();
  }

  public function saveMailLink(MailLink $mailLink){
      return MailLinkManagerDB::saveMailLink($mailLink);
  }

  public function getAllSuccessMail(){
    return MailManagerDB::getAllSuccessMail();
  }
}

?>
