<head>
    <title>ABC Jobs Portal</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css"
          integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/style.css">
    <!--Font Awesome for gyphicons-->
    <script src="https://use.fontawesome.com/26edcf6caf.js"></script>

    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
</head>

<body>

<div class="content">
    <?php if (isset($_SESSION["email"]) && $_SESSION["email"]): ?>
    <nav class="navbar navbar-light bg-faded navbar-full fixed-top navbar-toggleable-sm">
        <!--Collapsible navbar-->
        <button class="navbar-toggler navbar-toggler-right type="button" data-toggle="collapse"
        data-target="#login" aria-controls="login" aria-expanded="false" aria-label="Toggle Navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <a class="navbar-brand mr-auto" href="../../home.php"><img src="../../images/AbcLogo.png" alt="ABC Jobs"></a>

        <br>
        <!--Start of collapse navbar-->
        <div class="collapse navbar-collapse" id="login">

            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link mx-3 my-3 font-weight-bold" href="../../profile.php" style="font-family: 'Roboto
                    Slab', serif;">
                        Home <span class="sr-only">(current)
                    </span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-3 my-3 font-weight-bold" href="updateprofile.php" style="font-family: 'Roboto
                    Slab', serif;">
                        Edit Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-3 my-3 font-weight-bold" href="./searchuser.php"
                       style="font-family: 'Roboto Slab', serif;">
                        Search Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-3 my-3 font-weight-bold" href="../../logout.php" style="font-family: 'Roboto Slab', serif;">
                        Log Out</a>
                </li>
            </ul>
            <div class="navbar-nav ml-auto">
                <form class="form-inline" action="/phpcrudsample/public/modules/user/search-proc.php">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for users">
                        <span class="input-group-btn">
                        <button class="btn btn-secondary bg-primary text-white" type="button">
                            <i class="fa fa-search" aria-hidden="true"></i></button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </nav><!--navbar-nav collapse-->


        <!-- This navbar is activated when there is no user login in sessions.php-->
        <?php else: ?>
        <nav class="navbar navbar-light bg-faded navbar-full fixed-top navbar-toggleable-sm">
            <!--Collapsible navbar-->
            <button class="navbar-toggler navbar-toggler-right type="button" data-toggle="collapse"
            data-target="#login" aria-controls="login" aria-expanded="false" aria-label="Toggle Navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <a class="navbar-brand mr-auto" href="../../home.php"><img src="../../images/AbcLogo.png" alt="ABC
            Jobs"></a>

            <br>
            <!--Start of collapse navbar-->
            <div class="collapse navbar-collapse" id="not_login">
                <div class="navbar-nav ml-auto">
                    <form method="post" class="form-inline" action="login.php">
                        <div class="form-group  ">
                            <label class="sr-only" for="email">Email:</label>
                            <input type="email" class="form-control mr-2" id="email" placeholder="Enter email"  name="email">
                        </div>
                        <div class="form-group ">
                            <label class="sr-only" for="pwd">Password:</label>
                            <input type="password" class="form-control mr-2" id="pwd" placeholder="Enter password" name="pwd">
                        </div>
                        <div class="form-group ">
                            <button type="submit" name="submit" value="Submit" class="btn btn-primary mr-2 "
                                    style="font-family: 'Roboto Slab', serif;">
                                <i class="fa fa-sign-in mr-2" aria-hidden="true"></i>Log In</button>
                            <a href="forgetpasswd.php" style="font-family: 'Roboto Slab', serif;">Forget
                                Password?</a>
                        </div>
                    </form>
                </div>
            </div><!--navbar-nav collapse-->
            <?php endif; ?>

        </nav>
