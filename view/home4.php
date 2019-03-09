<html>
<head>
<title>Goldy Web Wallet</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Goldy Web Wallet , Cryptocurrency , 2FA Support" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="/view/css1/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
<link href="/view/css1/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
<link href="/view/css1/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- web font -->
<link href="//fonts.googleapis.com/css?family=Oswald:400,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

<!-- //web font -->
</head>
<body>
<br><br>
<?php if (!defined("IN_WALLET")) { die("Auth Error"); } ?>
<div class="main-agileits">
<!--form-stars-here-->
		<div class="form-w3-agile">
			<center><img src=logo.png height=150><br><br>
			<font color=white><small><b>WALLET LOGIN FORM</b></small></font><br><br>
                <form action="index.php" method="POST" class="clearfix">
                    <input type="hidden" name="action" value="login" />
                    <div class="form-sub-w3"><input autofocus type="text" class="form-control" name="username" placeholder="<?php echo $lang['FORM_USER']; ?>">
                                <div class="icon-w3">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                </div></div>
                    <div class="form-sub-w3"><input type="password" class="form-control" name="password" placeholder="<?php echo $lang['FORM_PASS']; ?>">
                                <div class="icon-w3">
                                        <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                                </div></div>
                    <div class="form-sub-w3"><input type="text" class="form-control" name="auth" placeholder="<?php echo $lang['FORM_2FA']; ?>">
                                <div class="icon-w3">
                                        <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                                </div></div>

                                <p class="p-bottom-w3ls">Are you new to ?<a class="w3_play_icon1" href="#small-dialog1">  Register here</a></p>
                                <div class="submit-w3l">
					<input type="submit" value="Login">
                                </div>
                </form>
<?php
                if (!empty($error))
                {
                    echo "<br><center><p style='font-size: bold; color: red;'>" . $error['message']; "</p>";
                }
?>
		</div>
<!--//form-ends-here-->
</div>
<div id="small-dialog1" class="mfp-hide">
					<div class="contact-form1">
										<div class="contact-w3-agileits">
										<h3>Register Form</h3>
											<form action="index.php" method="POST" class="clearfix">
<input type="hidden" name="action" value="register" />

												<div class="form-sub-w3ls">
<input autofocus type="text" class="form-control" name="username" placeholder="<?php echo $lang['FORM_USER']; ?>">
													<div class="icon-agile">
														<i class="fa fa-user" aria-hidden="true"></i>
													</div>
												</div>
												<div class="form-sub-w3ls">
<input type="password" class="form-control" name="password" placeholder="<?php echo $lang['FORM_PASS']; ?>">
													<div class="icon-agile">
														<i class="fa fa-unlock-alt" aria-hidden="true"></i>
													</div>
												</div>
												<div class="form-sub-w3ls">
<input type="password" class="form-control" name="confirmPassword" placeholder="<?php echo $lang['FORM_PASSCONF']; ?>">
													<div class="icon-agile">
														<i class="fa fa-unlock-alt" aria-hidden="true"></i>
													</div>
												</div>
											</div>
										<div class="submit-w3l">
											<input type="submit" value="Register">
										</div>
										</form>
					</div>	
				</div>
<!-- copyright -->
        <div class="copyright w3-agile">
                <p> <font color=white><b>© 2018 Goldy Web Wallet . All rights reserved</p>
        </div>
	<!-- //copyright --> 
	<script type="text/javascript" src="/view/js1/jquery-2.1.4.min.js"></script>
	<!-- pop-up-box -->  
		<script src="/view/js1/jquery.magnific-popup.js" type="text/javascript"></script>
	<!--//pop-up-box -->
	<script>
		$(document).ready(function() {
		$('.w3_play_icon,.w3_play_icon1,.w3_play_icon2').magnificPopup({
			type: 'inline',
			fixedContentPos: false,
			fixedBgPos: true,
			overflowY: 'auto',
			closeBtnInside: true,
			preloader: false,
			midClick: true,
			removalDelay: 300,
			mainClass: 'my-mfp-zoom-in'
		});
																		
		});
	</script>
</body>
</html>
