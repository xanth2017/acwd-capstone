<?php
require_once '../../includes/autoload.php';

use classes\business\UserManager;
use classes\entity\User;

ob_start();
include '../../includes/innerheader.php';
?>

<?php
$email="";

if (isset($_REQUEST["submitted"])){
    $email=$_REQUEST["email"];

    if($email!=''){
        $UM=new UserManager();
        $user=new User();
        $user->email=$email;

        $existuser=$UM->getUserByEmail($email);

        if(isset($existuser)){
            // Save the Data to Database
            //$UM->sendEmail($user);
            header("Location:passwdthankyou.php");
        }
        else{
            $formerror="User Does Not Exist";
            echo $formerror;
        }
    }else{
        $formerror="Please fill in the fields";
        echo $formerror;
    }


}


?>





<!-- Main jumbotron for a primary form or call to action -->

<div class="jumbotron-fluid" style="background-color: #f9f9f9">
    <br>
    <div class="container ">
        <div class="row justify-content-center" style="font-family: 'Roboto Slab', serif;">
            <div style="color:red;"><?= $formerror; ?></div>
            <div class="card mt-5" style="width: 28rem; min-width: 22rem;">
                <div class="card-header bg-primary">
                    <p class="text-white h4 text-center ">Lets find your password </p>
                </div>
                <div class="card-block text-center">
                    <h4 class="card-title"></h4>
                    <br>
                    <form method="post" action="<?= $_SERVER["PHP_SELF"]?>">
                    <div class="input-group">
                        <input type="text"  name="email" class="form-control" placeholder="Eg: abc@example.com"
                               aria-describedby="basic-addon2">
                        <span class="input-group-addon" id="inputEmail">
                                       <i class="fa fa-envelope-o" aria-hidden="true"></i></span>
                    </div>
                    <br>
                        <input type="hidden" name="submitted" value="1">
                        <button name="submit" value="Submit" type="submit" class="btn btn-primary"
                                style="font-family: 'Roboto Slab', serif;">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> <!-- /container -->




<?php
include '../../includes/innerfooter.php';
?>
