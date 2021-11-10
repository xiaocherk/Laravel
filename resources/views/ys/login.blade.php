<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login Page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="/loginAllign.css">
    <link rel="stylesheet" type="text/css" href="/login.css">
    <!--===============================================================================================-->
</head>

<body>

    <body>

        <div class="limiter">
            <div class="container-login100">
                <div class="wrap-login100 p-t-85 p-b-20">
                    <form method="POST" class="login100-form validate-form">
                        @csrf
                        <span class="login100-form-title p-b-70">
                            Welcome
                        </span>
                        <span class="login100-form-avatar">
                            <img src="/Images/nezuko.jpg" alt="AVATAR">
                        </span>

                        <div class="wrap-input100 validate-input m-t-85 m-b-35" data-validate="Enter username">
                            <input class="input100" type="text" name="email">
                            <span class="focus-input100" data-placeholder="Email"></span>
                        </div>

                        <div class="wrap-input100 validate-input m-b-50" data-validate="Enter password">
                            <input class="input100" type="password" name="password">
                            <span class="focus-input100" data-placeholder="Password"></span>
                        </div>

                        <div class="container-login100-form-btn">
                            <input type="submit" name="submit" class="login100-form-btn" value="LOG IN">

                        </div>

                        <ul class="login-more p-t-190">
                            <li class="m-b-8">
                                <span class="txt1">
                                    Forgot
                                </span>

                                <a href="#" class="txt2">
                                    Username / Password?
                                </a>
                            </li>

                            <li>
                                <span class="txt1">
                                    Don’t have an account?
                                </span>

                                <a href="form" class="txt2">
                                    Sign up
                                </a>
                            </li>
                        </ul>
                    </form>
                </div>
            </div>
        </div>


        <div id="dropDownSelect1"></div>

    </body>

</html>