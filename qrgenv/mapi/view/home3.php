<!DOCTYPE html>
<html lang="en">
<head>
	<title>Goldy Wallet</title>
	<meta charset="UTF-8">
        <meta http-equiv="Cache-Control" content="no-store" />
	<meta http-equiv="cache-control" content="max-age=0" />
	<meta http-equiv="cache-control" content="no-cache" />
	<meta http-equiv="expires" content="0" />
	<meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
	<meta http-equiv="pragma" content="no-cache" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="l2/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="l2/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="l2/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="l2/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="l2/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="l2/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="l2/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="l2/css/util.css">
	<link rel="stylesheet" type="text/css" href="l2/css/main.css">
<!--===============================================================================================-->
	<link rel="stylesheet" href="bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
</head>
<body>
        <div class="limiter">
                <div class="container-login100">
                        <div class="wrap-login100 p-t-100 p-b-30">
                                        <div class="login100-form-avatar">
                                                <img src="logo3.png" alt="AVATAR">
                                        </div>

                                        <span class="login100-form-title p-t-20 p-b-45">
                                                Goldy Wallet
                                        </span>

<div class="container-login100">
	<ul class="nav nav-tab2s">
                                                <li class="active">
                                                        <a href="#tab_default_1" data-toggle="tab">
                                                        <center> <font color=white><b> LOGIN </b></font> </center></a>
                                                </li>
                                                <li>
                                                        <a href="#tab_default_2" data-toggle="tab">
                                                        <center> <font color=white><b> SIGNUP </b></font> </center></a>
                                                </li>
                                        </ul>
<br>
                                        <div class="tab-content">
                                                <div class="tab-pane active" id="tab_default_1">

                                <form class="login100-form" action="index.php" method="POST">
					<input type="hidden" name="action" value="login">
					<div class="wrap-input100 m-b-10">
						<input autofocus class="input100" type="text" name="username" placeholder="<?php echo $lang['FORM_USER']; ?>">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user"></i>
						</span>
					</div>
<br><br>
					<div class="wrap-input100 m-b-10">
						<input class="input100" type="password" name="password" placeholder="<?php echo $lang['FORM_PASS']; ?>">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock"></i>
						</span>
					</div>
<br><br>
                                        <div class="wrap-input100 m-b-10">
<input type "text" class="input100" name="auth" placeholder="<?php echo $lang['FORM_2FA']; ?>">
                                                <span class="focus-input100"></span>
                                                <span class="symbol-input100">
                                                        <i class="fa fa-lock"></i>
                                                </span>
                                        </div>
					<div class="container-login100-form-btn p-t-10">
						<button type="submit" class="login100-form-btn">
							<?php echo $lang['FORM_LOGIN']; ?>
						</button>
					</div>

				</form>

                                                </div>
                                                <div class="tab-pane fade" id="tab_default_2">

                                <form class="login100-form" action="index.php" method="POST">
					<input type="hidden" name="action" value="register" />
                                        <div class="wrap-input100 m-b-10">
                                                <input autofocus class="input100" type="text" name="username" placeholder="<?php echo $lang['FORM_USER']; ?>">
                                                <span class="focus-input100"></span>
                                                <span class="symbol-input100">
                                                        <i class="fa fa-user"></i>
                                                </span>
                                        </div>
<br><br>
                                        <div class="wrap-input100 m-b-10">
                                                <input class="input100" type="password" name="password" placeholder="<?php echo $lang['FORM_PASS']; ?>">
                                                <span class="focus-input100"></span>
                                                <span class="symbol-input100">
                                                        <i class="fa fa-lock"></i>
                                                </span>
                                        </div>
<br><br>
                                        <div class="wrap-input100 m-b-10">
                                                <input class="input100" type="password" name="confirmPassword" placeholder="<?php echo $lang['FORM_PASSCONF']; ?>">
                                                <span class="focus-input100"></span>
                                                <span class="symbol-input100">
                                                        <i class="fa fa-lock"></i>
                                                </span>
                                        </div>

                                        <div class="container-login100-form-btn p-t-10">
                                                <button type="submit" class="login100-form-btn">
                                                        <?php echo $lang['FORM_SIGNUP']; ?>
                                                </button>
                                        </div>

                                </form>

                                                </div>
	
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
</div>

                        </div>
                </div>
        </div>

</div>

<!--===============================================================================================-->	
	<script src="l2/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="l2/vendor/bootstrap/js/popper.js"></script>
	<script src="l2/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="l2/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="l2/js/main.js"></script>

</body>
</html>
