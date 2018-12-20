<?php
require_once '../../includes/autoload.php';

use classes\business\UserManager;
use classes\entity\User;

ob_start();
session_start();
include '../../includes/innerheader.php';



if(isset($_SESSION['email']) && $_SESSION['email'] !== ""){
    $email = $_SESSION['email'];

}
?>


    <div class="jumbotron-fluid mt-2" >

        <div class="row ">
            <div class="col-lg-3 col-sm-2"></div>
            <div class="col-lg-6 col-sm-8">

                    <h1>Thank You</h1>

                    You have successfully registered to community portal<br /><br />

                    Continue with <a href="updateprofile.php">login</a>
            </div>
        </div>
    </div>


<?php
include '../../includes/innerfooter.php';
?>