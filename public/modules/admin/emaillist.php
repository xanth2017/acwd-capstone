<?php
require_once '../../includes/autoload.php';

use classes\business\UserManager;
use classes\business\MailManager;

ob_start();
include '../../includes/security.php';
include '../../includes/inneradminheader.php';


$MM=new MailManager();
// $first_name = isset($_POST['firstname']) && !empty($_POST['firstname'])?$_POST['firstname']:"";
// $last_name = isset($_POST['lastname']) && !empty($_POST['lastname'])?$_POST['lastname']:"";
// $email = isset($_POST['email']) && !empty($_POST['email'])?$_POST['email']:"";
$mail_list = $MM->getAllSuccessMail();

?>


<div class="container-fluid mt-2" style="margin-top:88px !important;">

    <div class="row ">
        <div class="col-lg-1 col-sm-2"></div>
        <div class="col-lg-10 col-sm-8">
            <div class="row">
                <div class="col-12">
                    <h1>Mass Email Listing</h1>
                </div>
            </div>


        </div>
        <div class="col-lg-1 col-sm-2"></div>
    </div>
    <div class="row">
        <div class="col-lg-1 col-sm-2"></div>
        <div class="col-lg-10 col-sm-8">
            <h2 class="mt-4 mb-4 text-center">List Successful Emails</h2>
        </div>
        <div class="col-lg-1 col-sm-2"></div>
    </div>
    <div class="row">
        <div class="col-lg-1 col-sm-2"></div>
        <div class="col-lg-10 col-sm-8">

            <table class="table">
                <thead>
                    <th>#</th>
                    <th>Email ID</th>
                    <th>Recipents</th>
                    <th>Email Body</th>
                    <th>Email Subject</th>
                    <th>Sent Date</th>
                </thead>
                <tbody>
                    <?php foreach ($mail_list as $key => $value) { ?>
                      <tr>
                        <td><?php echo $key + 1;  ?></td>
                        <td><?php echo $value->emailId;  ?></td>
                        <td><?php echo $value->recipentFirstName." ".$value->recipentLastName;  ?></td>
                        <td><?php echo $value->emailBody;  ?></td>
                        <td><?php echo $value->emailSubject;  ?></td>
                        <td><?php echo $value->sentDate;  ?></td>
                      </tr>
                    <?php } ?>
                    <tr></tr>
                </tbody>
            </table>

        </div>
        <div class="col-lg-1 col-sm-2"></div>
    </div>
    <div class="row">
        <div class="col-lg-1 col-sm-2"></div>
        <div class="col-lg-10 col-sm-8">
        </div>


        </div>
    </div>

        <div class="col-lg-1 col-sm-2"></div>
    </div>
</div>
<?php include '../../includes/innerfooter.php'; ?>
<script type="text/javascript">

</script>
