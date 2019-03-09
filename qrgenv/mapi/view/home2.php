<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
   	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<meta name="keywords" content="Pepegold, online wallet, send, recieve, PEPS, x11, block explorer">
	<meta name="description" content="PepeGold Online Wallet store and send your PEPS coins online , Secured wallet 2FA ">
	<meta name="author" content="PepeGold Foundation">
   <link rel="stylesheet" href="/index_files/bootstrap.min.css"> 
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
   <link rel="stylesheet" href="/index_files/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="/index_files/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="/index_files/blue.css">
    <!-- Morris chart -->
  <link rel="stylesheet" href="/index_files/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="/index_files/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="/index_files/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="/index_files/daterangepicker-bs3.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="/index_files/bootstrap3-wysihtml5.min.css">
  <script src="/index_files/moment.min.js.download"></script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
   <link href="/index_files/languages.min.css" rel="stylesheet">
   <title>PepeGold Web Wallet</title>
<style type="text/css">.jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0) transparent;background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;z-index: 10000;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}</style></head>
<body class="skin-blue sidebar-mini">
<?php

$jsondata = file_get_contents('/var/www/html/at-pepe.json');
$data = json_decode($jsondata, true);

$btcprice = $data['0h_open'];

$jsondata2 = file_get_contents('https://blockchain.info/ticker');
$data2 = json_decode($jsondata2, true);

$btcusd = $data2['USD']['sell'];

$usdprice = $btcprice * $btcusd;
$usdprice2 = number_format($usdprice,2);

$usdpeps1 = (1 / $btcprice) * ( 1 / $btcusd);
$usdpeps = number_format($usdpeps1,2);

?>
<div class="wrapper"> 
<header class="main-header">
    <!-- Logo -->
    <a href="/index.php" class="logo" title="PepeGold logo">
      <img src="http://pepegold.org/assets/img/logo.png" height=80%>
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <!-- logo for regular state and mobile devices -->
     <span class="logo-lg"></a>
  </header>
   <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar" style="height: auto;">
          <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">			   
		 <li>
          <a href="http://explorer.PepeGold.org/" target="_blank">
            <i class="fa fa-search"></i> <span>Block Explorer</span>
          </a>
        </li>
        <li>
          <a href="https://graviex.net/markets/pepsbtc" target="_blank">
            <i class="fa fa-bar-chart"></i> <span>PEPS Market</span>
          </a>
        </li>
		 <li>
          <a href="http://angrypool.com/explorer/PEPS" target="_blank">
            <i class="fa fa-users"></i> <span>Mining Pool</span>
          </a>
        </li>
		<li>
          <a href="https://bitcointalk.org/index.php?topic=3182756.0" target="_blank">
            <i class="fa fa-comments-o"></i> <span>Official thread</span>
            <small class="label pull-right bg-yellow">BitcoinTalk</small>
          </a>
        </li>
		
		<li class="treeview active">
          <a href="/index.php#">
            <i class="fa fa-envelope"></i> <span>Contact us</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu menu-open" style="display: block;">
            	<li><a href="https://PepeGold.org/"><i class="fa fa-globe"></i> Official website</a></li>
            	<li><a href="https://www.facebook.com/pepegoldcoin"><i class="fa fa-facebook"></i> Facebook page</a></li>
		<li><a href="https://twitter.com/PepeGoldCoin"><i class="fa fa-twitter"></i>Twitter page</a></li>
		<li><a href="https://www.reddit.com/user/weluvpepegold "><i class="fa fa-globe"></i> Reddit</a></li>
		<li><a href="https://pepegold.slack.com/"><i class="fa fa-globe"></i> Slack</a></li>
		<li><a href="https://discord.gg/WjVU7gE"><i class="fa fa-globe"></i> Discord</a></li>
		<li><a href="https://t.me/pepegoldcoin"><i class="fa fa-globe"></i> Telegram</a></li>
          </ul>
        </li>
		
		</ul>
    </section>
    <!-- /.sidebar -->
  </aside> <div class="content-wrapper" style="min-height: 512px;">
<section class="content">
<div class="row">
	     <div class="col-md-8">
               <div class="box box-info">
                    <div class="box-header with-border">
                       <center><h1 class="box-title">PepeGold Web Wallet</span> <br></h1>
                    </div>
</div></div>
<div class="col-md-4">
	<div class="box box-info">
		<div class="box-header with-border">
           <h3 class="box-title">Log In </h3> 
        </div>
	<div class="register-box-body">
                <form action="index.php" method="POST" class="clearfix">
                    <input type="hidden" name="action" value="login">
					<div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
		    <input type="text" class="form-control" name="username" placeholder="<?php echo $lang['FORM_USER']; ?>">
                    </div>
					<br>
					<div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    <input type="password" class="form-control" name="password" placeholder="<?php echo $lang['FORM_PASS']; ?>">
                    </div>
					<br>
					<div class="row">
                     <div class="col-md-12">
                                 <button type="submit" class="btn btn-default"><?php echo $lang['FORM_LOGIN']; ?></button>
	            	</div>
                    </div>
             </form>
	</div>
</div>
<p class="small-box" style="font-weight: bold; color: red;padding: 4px 10px;"></p><div class="box box-info">
		<div class="box-header with-border">
           <h3 class="box-title">Register new account </h3> 
        </div>
	<div class="register-box-body">
                <form action="index.php" method="POST" class="clearfix">
                    <input type="hidden" name="action" value="register" />
					<div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
		    <input type="text" class="form-control" name="username" placeholder="<?php echo $lang['FORM_USER']; ?>">
                    </div>
					<br>
					<div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    <input type="password" class="form-control" name="password" placeholder="<?php echo $lang['FORM_PASS']; ?>">
                    </div>
					<br>
					<div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    <input type="password" class="form-control" name="confirmPassword" placeholder="<?php echo $lang['FORM_PASSCONF']; ?>">
                    </div>
					<br>
					<div class="row">
                     <div class="col-md-12">
                                 <button type="submit" class="btn btn-default"><?php echo $lang['FORM_SIGNUP']; ?></button>
	            	</div>
                    </div>
               </form>
	</div>
</div>
</div>
</div>  <!-- /row -->		
	</section>			
            
        </div>

<footer class="main-footer">
<div class="row">
        <div class="col-md-12" style="text-align: center;">
           Powered by <a href="http://PepeGold.org/">PepeGold</a> Donate for development PEPS : 1Pf7oyQQcQ2NZgE3LSXXKz24ZBUxnRCVUn
        </div>
        		
</div>
</footer>
 <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="/index.php#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
 </div><div id="control-sidebar-theme-demo-options-tab" class="tab-pane active"><div><h4 class="control-sidebar-heading"></h4><h4 class="control-sidebar-heading">Skins</h4><ul class="list-unstyled clearfix"><li style="float:left; width: 33.33333%; padding: 5px;"><a href="javascript:void(0);" data-skin="skin-blue" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover"><div><span style="display:block; width: 20%; float: left; height: 7px; background: #367fa9;"></span><span class="bg-light-blue" style="display:block; width: 80%; float: left; height: 7px;"></span></div><div><span style="display:block; width: 20%; float: left; height: 20px; background: #222d32;"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;"></span></div></a><p class="text-center no-margin">Blue</p></li><li style="float:left; width: 33.33333%; padding: 5px;"><a href="javascript:void(0);" data-skin="skin-black" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover"><div style="box-shadow: 0 0 2px rgba(0,0,0,0.1)" class="clearfix"><span style="display:block; width: 20%; float: left; height: 7px; background: #fefefe;"></span><span style="display:block; width: 80%; float: left; height: 7px; background: #fefefe;"></span></div><div><span style="display:block; width: 20%; float: left; height: 20px; background: #222;"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;"></span></div></a><p class="text-center no-margin">Black</p></li><li style="float:left; width: 33.33333%; padding: 5px;"><a href="javascript:void(0);" data-skin="skin-purple" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover"><div><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-purple-active"></span><span class="bg-purple" style="display:block; width: 80%; float: left; height: 7px;"></span></div><div><span style="display:block; width: 20%; float: left; height: 20px; background: #222d32;"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;"></span></div></a><p class="text-center no-margin">Purple</p></li><li style="float:left; width: 33.33333%; padding: 5px;"><a href="javascript:void(0);" data-skin="skin-green" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover"><div><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-green-active"></span><span class="bg-green" style="display:block; width: 80%; float: left; height: 7px;"></span></div><div><span style="display:block; width: 20%; float: left; height: 20px; background: #222d32;"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;"></span></div></a><p class="text-center no-margin">Green</p></li><li style="float:left; width: 33.33333%; padding: 5px;"><a href="javascript:void(0);" data-skin="skin-red" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover"><div><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-red-active"></span><span class="bg-red" style="display:block; width: 80%; float: left; height: 7px;"></span></div><div><span style="display:block; width: 20%; float: left; height: 20px; background: #222d32;"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;"></span></div></a><p class="text-center no-margin">Red</p></li><li style="float:left; width: 33.33333%; padding: 5px;"><a href="javascript:void(0);" data-skin="skin-yellow" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover"><div><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-yellow-active"></span><span class="bg-yellow" style="display:block; width: 80%; float: left; height: 7px;"></span></div><div><span style="display:block; width: 20%; float: left; height: 20px; background: #222d32;"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;"></span></div></a><p class="text-center no-margin">Yellow</p></li><li style="float:left; width: 33.33333%; padding: 5px;"><a href="javascript:void(0);" data-skin="skin-blue-light" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover"><div><span style="display:block; width: 20%; float: left; height: 7px; background: #367fa9;"></span><span class="bg-light-blue" style="display:block; width: 80%; float: left; height: 7px;"></span></div><div><span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc;"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;"></span></div></a><p class="text-center no-margin" style="font-size: 12px">Blue Light</p></li><li style="float:left; width: 33.33333%; padding: 5px;"><a href="javascript:void(0);" data-skin="skin-black-light" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover"><div style="box-shadow: 0 0 2px rgba(0,0,0,0.1)" class="clearfix"><span style="display:block; width: 20%; float: left; height: 7px; background: #fefefe;"></span><span style="display:block; width: 80%; float: left; height: 7px; background: #fefefe;"></span></div><div><span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc;"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;"></span></div></a><p class="text-center no-margin" style="font-size: 12px">Black Light</p></li><li style="float:left; width: 33.33333%; padding: 5px;"><a href="javascript:void(0);" data-skin="skin-purple-light" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover"><div><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-purple-active"></span><span class="bg-purple" style="display:block; width: 80%; float: left; height: 7px;"></span></div><div><span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc;"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;"></span></div></a><p class="text-center no-margin" style="font-size: 12px">Purple Light</p></li><li style="float:left; width: 33.33333%; padding: 5px;"><a href="javascript:void(0);" data-skin="skin-green-light" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover"><div><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-green-active"></span><span class="bg-green" style="display:block; width: 80%; float: left; height: 7px;"></span></div><div><span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc;"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;"></span></div></a><p class="text-center no-margin" style="font-size: 12px">Green Light</p></li><li style="float:left; width: 33.33333%; padding: 5px;"><a href="javascript:void(0);" data-skin="skin-red-light" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover"><div><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-red-active"></span><span class="bg-red" style="display:block; width: 80%; float: left; height: 7px;"></span></div><div><span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc;"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;"></span></div></a><p class="text-center no-margin" style="font-size: 12px">Red Light</p></li><li style="float:left; width: 33.33333%; padding: 5px;"><a href="javascript:void(0);" data-skin="skin-yellow-light" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover"><div><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-yellow-active"></span><span class="bg-yellow" style="display:block; width: 80%; float: left; height: 7px;"></span></div><div><span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc;"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;"></span></div></a><p class="text-center no-margin" style="font-size: 12px;">Yellow Light</p></li></ul></div></div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg" style="position: fixed; height: auto;"></div>

<!-- jQuery 2.2.0 -->
<script src="/index_files/jQuery-2.2.0.min.js.download"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/index_files/jquery-ui.min.js.download"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="/index_files/bootstrap.min.js.download"></script>
<!-- Morris.js charts -->
<script src="/index_files/raphael-min.js.download"></script>
<script src="/index_files/morris.min.js.download"></script>
<!-- Sparkline -->
<script src="/index_files/jquery.sparkline.min.js.download"></script>
<!-- jvectormap -->
<script src="/index_files/jquery-jvectormap-1.2.2.min.js.download"></script>
<script src="/index_files/jquery-jvectormap-world-mill-en.js.download"></script>
<!-- jQuery Knob Chart -->
<script src="/index_files/jquery.knob.js.download"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="/index_files/bootstrap3-wysihtml5.all.min.js.download"></script>
<!-- Slimscroll -->
<script src="/index_files/jquery.slimscroll.min.js.download"></script>
<!-- FastClick -->
<script src="/index_files/fastclick.js.download"></script>
<!-- AdminLTE App -->
<script src="/index_files/app.min.js.download"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/index_files/dashboard.js.download"></script>
<!-- AdminLTE for demo purposes -->
<script src="/index_files/demo.js.download"></script>

</div></body></html>
