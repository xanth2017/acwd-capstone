<?php
require_once '../../includes/autoload.php';

use classes\business\UserManager;

ob_start();
include '../../includes/security.php';
include '../../includes/inneradminheader.php';


$UM=new UserManager();
$first_name = isset($_POST['firstname']) && !empty($_POST['firstname'])?$_POST['firstname']:"";
$last_name = isset($_POST['lastname']) && !empty($_POST['lastname'])?$_POST['lastname']:"";
$email = isset($_POST['email']) && !empty($_POST['email'])?$_POST['email']:"";
$users = $UM->searchAllUsers($first_name, $last_name, $email);

?>


<div class="container-fluid mt-2" style="margin-top:88px !important;">

    <div class="row ">
        <div class="col-lg-1 col-sm-2"></div>
        <div class="col-lg-10 col-sm-8">
            <div class="row">
                <div class="col-12">
                    <h1>Search Users</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <form method="post" action="<?= $_SERVER["PHP_SELF"]?>" class="row">
                        <div class="col-3">
                            <label class="label" for="firstname">First Name: </label>
                            <input type="text" id="firstname" name="firstname" id="firstname" value="<?php echo $first_name?$first_name:""; ?>">
                        </div>
                        <div class="col-3">
                            <label class="label" for="lastname">Last Name: </label>
                            <input type="text" id="lastname" name="lastname" id="lastname" value="<?php echo $last_name?$last_name:""; ?>">
                        </div>
                        <div class="col-3">
                            <label class="label" for="email">Email: </label>
                            <input type="text" id="email" name="email" id="email" value="<?php echo $email?$email:""; ?>">
                        </div>
                        <div class="col-3">
                            <button type="submit" class="btn btn-primary" name="search" value="Search">Search</button>
                            <button class="btn btn-secondary" id="btn-clear" name="clear_search" value="Search">Clear Search</button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
        <div class="col-lg-1 col-sm-2"></div>
    </div>
    <div class="row">
        <div class="col-lg-1 col-sm-2"></div>
        <div class="col-lg-10 col-sm-8">
            <h2 class="mt-4 mb-4 text-center">List User</h2>
        </div>
        <div class="col-lg-1 col-sm-2"></div>
    </div>
    <div class="row">
        <div class="col-lg-1 col-sm-2"></div>
        <div class="col-lg-10 col-sm-8">

            <table class="table">
                <thead>
                    <th>#</th>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Company</th>
                </thead>
                <tbody>
                    <?php foreach ($users as $key => $user){
                        if(isset($user->id)){ ?>

                    <tr>
                        <td class='center'><input type='checkbox' name='selected[]' value="<?php echo $user->id; ?>"></td>
                        <td class='center'><a href='edit.php?id=<?php echo $user->id; ?>'><?php echo $user->id; ?></a></td>
                        <td><?php echo $user->firstName; ?></td>
                        <td><?php echo $user->lastName; ?></td>
                        <td><?php echo $user->email; ?></td>
                        <td><?php echo $user->company; ?></td>
                    </tr>
                    <?php }} ?>
                </tbody>
            </table>

        </div>
        <div class="col-lg-1 col-sm-2"></div>
    </div>
    <div class="row">
        <div class="col-lg-1 col-sm-2"></div>
        <div class="col-lg-10 col-sm-8">
            <button type="delete" class="btn btn-danger" id="btn-delete" name="delete" value="Delete">Delete</button>
            <button class="btn btn-info" id="btn-email" name="mass_email" value="Email"
            data-toggle="modal" data-target="#contact" data-original-title>Mass Email</button>
        </div>

    <div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="contactLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="card	card.bg-primary" style="background-color:white; padding:10px;">
                <div class="panel-heading">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="panel-title" id="contactLabel"><span class="glyphicon glyphicon-info-sign"></span>
                      Mass Email Form</h4>
                </div>
                <form id="mailForm" method="post" action="./sendemail.php" accept-charset="utf-8">
                  <input type="hidden" id="recipients" name="ids" value="" />
                <div class="modal-body" style="padding: 5px;">
                      <div class="row">

                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
                                <input class="form-control" name="email" placeholder="E-mail" type="text" required />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
                                <input class="form-control" name="subject" placeholder="Subject" type="text" required />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <textarea style="resize:vertical;" class="form-control" placeholder="Message..." rows="6" name="comment" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer" style="margin-bottom:5px; margin-top:5px;">
                        <button type="button" id="send" class="btn btn-success">Send</button>
                            <!--<span class="glyphicon glyphicon-ok"></span>-->
                        <input type="reset" class="btn btn-danger" value="Clear" />
                            <!--<span class="glyphicon glyphicon-remove"></span>-->
                        <button style="float: right;" type="button" class="btn btn-default btn-close" data-dismiss="modal">Close</button>
                    </div>
                </div>
        </div>
    </div>

        <div class="col-lg-1 col-sm-2"></div>
    </div>
</div>
<?php include '../../includes/innerfooter.php'; ?>
<script type="text/javascript">
  jQuery(document).ready(function(){
    var firstName = jQuery('#firstname'),
        lastName = jQuery('#lastname'),
        email = jQuery("#email");

    jQuery('#btn-clear').on('click', function(){
        firstName.val("");
        lastName.val("");
        email.val("");
    });

    jQuery('#send').on('click', function(e){
        e.preventDefault();
        var selectedIds = [];
        jQuery('[name="selected[]"]:checked').each(function(element){
          selectedIds.push(jQuery(this).val());
        });
        jQuery("[name='ids']").val(selectedIds.join(","));
        setTimeout(function(){
          jQuery("#mailForm").submit();
        }, 1000);
    });

  });
</script>
