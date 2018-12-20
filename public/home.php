<?php

include 'includes/header.php';

$firstName="";
$lastName="";
$email="";
$password="";
?>

<!-- Main jumbotron for a primary form or call to action -->

<div class="jumbotron-fluid mt-2" style="background: url(images/hero2.1.png) center center;background-size: cover;">

    <br>
    <div class="container">
        <div class="row justify-content-center ">
            <!--    <div class="col-md-4 "></div>-->
            <div class="">
                <div class="form-body bg-faded px-4 py-4 mb-4" style="width: 22rem;">
                    <h4 class="text-center" style="font-family: 'Roboto Slab', serif;"><b>ABC Jobs'</b> Coder Community</h4>
                    <p class="text-center" style="font-family: 'Roboto Slab', serif; font-size: 1rem;">Portal
                        for coders to share resources and job opportunities!</p>
                    <br>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#SectionA" role="tab"
                               style="font-family: 'Roboto Slab', serif; font-size: 1.2rem;">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#SectionB" role="tab"
                               style="font-family: 'Roboto Slab', serif; font-size: 1.2rem;"><span class="text-nowrap">
                                Log In</span></a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content mt-4 ">
                        <!-- Start of Register Tab Panel-->
                        <div class="tab-pane active" id="SectionA" role="tabpanel">
                            <div class="container">
                                <form method="post" action="modules/user/register.php">

                                    <div class="form-group row">
                                        <label for="inputFirstname"
                                               class="col-form-label col-form-label-sm">First Name
                                        </label>
                                        <input name="firstName" value="<?=$firstName?>" type="text"
                                               class="form-control form-control-sm"
                                               id="inputUsername"
                                               placeholder="Please input your first name">
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputLastname"
                                               class="col-form-label col-form-label-sm">Last Name
                                        </label>
                                        <input name="lastName" value="<?=$lastName?>" type="text"
                                               class="form-control form-control-sm"
                                               id="inputUsername"
                                               placeholder="Please input your last name">
                                    </div>

                                    <div class="form-group row ">

                                        <label for="inputEmail" class="col-form-label col-form-label-sm">Email</label>
                                        <input name="email" value="<?=$email?>" type="email"
                                               class="form-control form-control-sm"
                                               id="inputEmail"
                                               placeholder="Eg: abc@example.com">

                                    </div>

                                    <div class="form-group row ">

                                        <label for="inputPassword" class="col-form-label col-form-label-sm">Password
                                        </label>
                                        <input name="password" value="<?=$password?>" type="password" class="form-control form-control-sm"
                                               id="inputPassword"
                                               placeholder="(6 characters or more)">
                                    </div>

                                    <div class="form-group row ">

                                        <label for="inputPassword" class="col-form-label col-form-label-sm">
                                            Confirm Password
                                        </label>
                                        <input name="cpassword" value="<?=$password?>" type="password" class="form-control form-control-sm"
                                               id="inputPassword"
                                               placeholder="(6 characters or more)">
                                    </div>

                                    <div class="form-group row ">
                                        <p style="font-size: 0.5rem">By clicking <b>"Join Now"</b>, you have agreed
                                            ABC Jobs User Agreement, Privacy Policy, and Cookie Policy</p>
                                    </div>

                                    <div class="form-group row justify-content-center ">
                                        <input type="hidden" name="submitted" value="1">
                                        <button name="submit" value="Submit" type="submit" class="btn btn-primary"
                                                style="font-family: 'Roboto Slab', serif;">Join Now</button>

                                    </div>

                                </form>
                            </div>
                        </div>
                        <!-- Start of Login Tab Panel-->
                        <div class="tab-pane fade " id="SectionB" role="tabpanel">
                            <div class="container">
                                <form method="post" action="login.php">
                                    <div class="form-group row">
                                        <label for="inputEmail" class="col-form-label
                                        col-form-label-sm">Email</label>
                                        <input name="email" type="email" class="form-control form-control-sm"
                                               value="<?=$email?>" id="inputEmail" placeholder="Eg: johnsmith@abc.com">
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword" class="col-form-label col-form-label-sm">Password
                                        </label>
                                        <input name="password" type="password" class="form-control form-control-sm"
                                               value="<?=$password?>" id="inputPassword" placeholder="Password (6 characters or more)">
                                    </div>
                                    <div class="form-group row">
                                        <div class="">
                                            <input type="hidden" name="submitted" value="1">
                                            <button name="login" type="submit" class="btn btn-primary"
                                                    style="font-family: 'Roboto Slab', serif;">Log In</button>
                                            <a href="modules/user/forgetpasswd.php" class="ml-1"  style="font-family: 'Roboto Slab', serif;">
                                                <span class="text-nowrap">Forgot Password?</span></a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--       <div class="col-md-4 "></div>  -->
        </div>

    </div>
</div> <!-- /container -->


<?php
include 'includes/footer.php';
?>
