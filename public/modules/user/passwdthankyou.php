<?php
require_once '../../includes/autoload.php';

use classes\business\UserManager;
use classes\entity\User;

ob_start();
include '../../includes/innerheader.php';
?>



<div class="jumbotron-fluid" style="background-color: #f9f9f9">
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="card mt-3 " style="width: 38rem; min-width: 22rem;">
                <div class="card-header bg-primary text-white" style="font-family: 'Roboto Slab', serif;">
                    <h2 class="text-center ">Thank you!</h2>
                    <h5 class="text-center ">Password Reset Success</h5>
                </div>
                <div class="card-block mt-2 px-2 py-2" style="font-family: 'Roboto Slab', serif;">
                    <blockquote class=" card title blockquote ">
                        <br>
                        <p class="mb-0"><i class="fa fa-quote-left mr-2" aria-hidden="true"></i>
                            All is not Lost; the unconquerable will,
                            And study of revenge, immortal hate,
                            And the courage never to submit or yeild.
                            <i class="fa fa-quote-right ml-2" aria-hidden="true"></i></p>
                        <footer class="blockquote-footer font-italic mt-2">John Milton,
                            <cite title="Source Title">Paradise Lost</cite></footer>
                        <br>
                        <p class="card-text" style="font-size: 1rem">
                            The reset password will be sent to the email address as provided by you.</p>
                        <p class="card-text " style="font-size: 0.5rem">
                            <b>Please feel free to email support@abcjobs.com, if you do no receive the reset
                                password within 24hrs.</b></p>
                </div>

            </div>
        </div>
    </div>
</div> <!-- /container -->




<?php
include '../../includes/innerfooter.php';
?>