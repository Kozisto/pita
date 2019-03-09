<?php if (!defined("IN_WALLET")) { die("Auth Error!"); } ?>
<?php
if (!empty($error))
{
    echo "<p style='font-weight: bold; color: red;'>" . $error['message']; "</p>";
}

if (satoshitize($balance) <= 0) { $balance = "0"; }

$jsondata = file_get_contents('https://www.coinexchange.io/api/v1/getmarketsummary?market_id=345');
$data = json_decode($jsondata, true);

$btcprice = 0;
$btcbalance = $btcprice * satoshitize($balance);

$jsondata2 = file_get_contents('https://blockchain.info/ticker');
$data2 = json_decode($jsondata2, true);

$btcusd = $data2['USD']['sell'];
$usdbalance = $btcusd * number_format($btcbalance,8);

$usdpeps1 = $btcprice * $btcusd;
$usdpeps = number_format($usdpeps1,4);

?>

	<div class="main">	
		<h1><img src=/view/logo.png height=125></h1>
		<div class="w3_agile_main_grids">
			<div class="w3layouts_main_grid_left">
				<div class="agileinfo_main_grid_left_grid">
					<h3>Wallet Summary</h3>
					<ul>
						<li>Balance<span><font color=orange><?php echo number_format(satoshitize($balance),4); ?></font></span></li>
						<li style='font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;'><font size=4>GOLDY</font></li>
					</ul>
					<ul>
						<li style='font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;'>US Dollars<span><font color=orange>Equal <?php echo number_format($usdbalance,4); ?></font></span></li>
						<li style='font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;'><font size=4>USD</font></li>
					</ul>
					<ul>
						<li style='font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;'>Bitcoins<span><font color=orange>Equals : <?php echo number_format($btcbalance,8); ?></font></span></li>
						<li style='font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;'><font size=4>BTC</font></li>
					</ul>
					<ul>
						<li style='font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;'>Price<span><font color=orange>1 BTC : <?php echo number_format($btcusd,2); ?></font></span><span><font color=orange>1 GOLDY : <?php echo $usdpeps; ?></font></span></li>
						<li style='font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;'><font size=4>USD</font></li>
					</ul>
				</div>
				<div class="agile_amount">
					<h3>Welcome <?php echo $user_session; ?></h3>
					<form method=post>
                                        <input type="hidden" name="action" value="logout" />
                                        <button type="submit" class="btn btn-default" style="width:70%;"><?php echo $lang['WALLET_LOGOUT']; ?></button>
                                        </form>
                                </div>
                                <div class="agile_amount">
<?php
if ($admin)
{
  ?>
<p><strong>Admin Links:</strong></p>
  <a href="?a=home" class="btn btn-default">Admin Dashboard</a>

<br />
<br />
<p><strong><?php echo $lang['WALLET_USERLINKS']; ?></strong></p>
  <?php
}
?>

<form action="index.php" method="post">
<input type="hidden" name="action" value="authgen" />
<button type="submit" class="btn btn-default"><?php echo $lang['WALLET_2FAON']; ?></button>
</form>
<form action="index.php" method="post">
<input type="hidden" name="action" value="disauth" />
<button type="submit" class="btn btn-default"><?php echo $lang['WALLET_2FAOFF']; ?></button>
</form>
		</div>
			</div>
			<div class="agileits_main_grid_right">
				<div class="wthree_payment_grid">
                        <div class="tabbable-panel">
                                <div class="tabbable-line">
                                        <ul class="nav nav-tabs ">
                                                <li class="active">
                                                        <a href="#tab_default_2" data-toggle="tab">
                                                        <center><img src=/view/trans.png width=32><br><br><b>History</b></small></center></a>
                                                </li>
                                                <li>
                                                        <a href="#tab_default_4" data-toggle="tab">
                                                        <center><img src=/view/send.png width=32><br><br><b>Send</b></small></center></a>
                                                </li>
                                                <li>
                                                        <a href="#tab_default_5" data-toggle="tab">
                                                        <center><img src=/view/qr.png width=32><br><br><b>Address</b></small></center></a>
                                                </li>
                                                <li>
                                                        <a href="#tab_default_3" data-toggle="tab">
                                                        <center><img src=/view/option.png width=32><br><br><b>Setting</b></small></center></a>
                                                </li>
                                        </ul>
                                        <div class="tab-content">
                                                <div class="tab-pane" id="tab_default_4">
<br><br>
<p><strong><?php echo $lang['WALLET_SEND']; ?></strong></p>
<form action="index.php" method="POST" class="clearfix" id="withdrawform">
    <input type="hidden" name="action" value="withdraw" />
    <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">
    <div><input type="text" class="form-control" name="address" placeholder="<?php echo $lang['WALLET_ADDRESS']; ?>"></div><br>
    <div><input type="text" class="form-control" name="amount" placeholder="<?php echo $lang['WALLET_AMOUNT']; ?>"></div><br>
    <div><button type="submit" style="width:100%;" class="btn btn-default"><?php echo $lang['WALLET_SENDCONF']; ?></button></div><br>
</form>
<center><p id="withdrawmsg"></p></center>
                                                </div>
                                                <div class="tab-pane" id="tab_default_5">
<br><br>
<center>
<table width=100%><tr><td align=center>
<form action="index.php" method="POST" id="newaddressform">
        <input type="hidden" name="action" value="new_address" />
        <button type="submit" style="width:100%;" class="btn btn-default"><?php echo "<b><font color=blue>Generate New Address</font></b>"; ?></button>
</form><br><br>
</td></tr></table>
<p id="newaddressmsg"></p>
<?php
foreach ($addressList as $address)
{
?>
<div class="panel panel-default">
<div class="panel-body" style="valign=center;">
        <table><tr><td>
        <a href="<?php echo $server_url;?>qrgen/?address=<?php echo $address;?>">
        <img src="<?php echo $server_url;?>qrgen/?address=<?php echo $address;?>" alt="QR Code" style="width:42px;height:42px;border:0;">
        </td><td width=10></td><td><b><?php echo $address; ?></td></table>
</div>
</div>
<?php
}
?>
                                                </div>
                                                <div class="tab-pane" id="tab_default_2">
<br><br>
<div class="panel panel-default">
<div class="panel-body" style="valign=center;">
        <center><b><?php echo "[LAST 10 TRANSACTIONS]"; ?></center></b>
</div>
</div>
<table width=100% class="table table-bordered table-striped" id="txlist">
<thead>
   <tr>
      <td nowrap><?php echo $lang['WALLET_DATE']; ?></td>
      <td nowrap><?php echo $lang['WALLET_ADDRESS']; ?></td>
      <td nowrap><?php echo $lang['WALLET_TYPE']; ?></td>
      <td nowrap><?php echo $lang['WALLET_AMOUNT']; ?></td>
   </tr>
</thead>
<tbody>
   <?php
   $bold_txxs = "";
   foreach($transactionList as $transaction) {
      if($transaction['category']=="send") { $tx_type = '<b style="color: #FF0000;">Sent</b>'; } else { $tx_type = '<b style="color: #01DF01;">Received</b>'; }
      echo '<tr>
               <td>'.date('n/j/Y h:i a',$transaction['time']).'</td>
               <td>'.$transaction['address'].'</td>
               <td>'.$tx_type.'</td>
               <td>'.abs($transaction['amount']).'</td>
            </tr>';
   }
   ?>
   </tbody>
</table>

                                                </div>
                                                <div class="tab-pane" id="tab_default_3">
<br><br>
<br />
<div class="panel panel-default">
<div class="panel-body" style="valign=center;">
        <center><b><?php echo "[CHANGE PASSWORD]"; ?></center></b>
</div>
</div>
<?php
if ($admin)
{
  ?>
<p><strong>Admin Links:</strong></p>
  <a href="?a=home" class="btn btn-default">Admin Dashboard</a>

<br />
<br />
<p><strong><?php echo $lang['WALLET_USERLINKS']; ?></strong></p>
  <?php
}
?>
<form action="index.php" method="POST" class="clearfix" id="pwdform">
    <input type="hidden" name="action" value="password" />
    <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">
    <div><input type="password" class="form-control" name="oldpassword" placeholder="<?php echo $lang['WALLET_PASSUPDATEOLD']; ?>"></div><br>
    <div><input type="password" class="form-control" name="newpassword" placeholder="<?php echo $lang['WALLET_PASSUPDATENEW']; ?>"></div><br>
    <div><input type="password" class="form-control" name="confirmpassword" placeholder="<?php echo $lang['WALLET_PASSUPDATENEWCONF']; ?>"></div><br>
    <div><button type="submit" style="width:100%;" class="btn btn-default"><?php echo $lang['WALLET_PASSUPDATECONF']; ?></button></div><br>
</form>
<center><p id="pwdmsg"></p></center>
                                                </div>
                                        </div>
                                </div>
                                        </div>
                                </div>
                                </div>
			</div>
			<div class="clear"> </div>
		</div>
		<div class="agileits_copyright">
			<p>© &copy 2018 Goldy. All rights reserved</p>
		</div>
	</div>
<script type="text/javascript">
var blockchain_tx_url = "<?=$blockchain_tx_url?>";
$("#withdrawform input[name='action']").first().attr("name", "jsaction");
$("#newaddressform input[name='action']").first().attr("name", "jsaction");
$("#pwdform input[name='action']").first().attr("name", "jsaction");
$("#donate").click(function (e){
  $("#donateinfo").show();
  $("#withdrawform input[name='address']").val("<?=$donation_address?>");
  $("#withdrawform input[name='amount']").val("0.01");
});
$("#withdrawform").submit(function(e)
{
    var postData = $(this).serializeArray();
    var formURL = $(this).attr("action");
    $.ajax(
    {
        url : formURL,
        type: "POST",
        data : postData,
        success:function(data, textStatus, jqXHR)
        {
            var json = $.parseJSON(data);
            if (json.success)
            {
                window.setTimeout(function(){window.location.replace('index.php?<?php echo rand(100,999); ?>#tab_default _4')},2000)
                $("#withdrawform input.form-control").val("");
                $("#withdrawmsg").text(json.message);
                $("#withdrawmsg").css("color", "green");
                $("#withdrawmsg").show();
                updateTables(json);
            } else {
                $("#withdrawmsg").text(json.message);
                $("#withdrawmsg").css("color", "red");
                $("#withdrawmsg").show();
            }
            if (json.newtoken)
            {
              $('input[name="token"]').val(json.newtoken);
            }
        },
        error: function(jqXHR, textStatus, errorThrown)
        {
            //ugh, gtfo
        }
    });
    e.preventDefault();
});
$("#newaddressform").submit(function(e)
{
    var postData = $(this).serializeArray();
    var formURL = $(this).attr("action");
    $.ajax(
    {
        url : formURL,
        type: "POST",
        data : postData,
        success:function(data, textStatus, jqXHR)
        {
            var json = $.parseJSON(data);
            if (json.success)
            {
                window.setTimeout(function(){window.location.replace('index.php?<?php echo rand(100,999); ?>#tab_default_5')},2000)
                $("#newaddressmsg").text(json.message);
                $("#newaddressmsg").css("color", "green");
                $("#newaddressmsg").show();
                updateTables(json);
            } else {
                $("#newaddressmsg").text(json.message);
                $("#newaddressmsg").css("color", "red");
                $("#newaddressmsg").show();
            }
            if (json.newtoken)
            {
              $('input[name="token"]').val(json.newtoken);
            }
        },
        error: function(jqXHR, textStatus, errorThrown)
        {
            //ugh, gtfo
        }
    });
    e.preventDefault();
});
$("#pwdform").submit(function(e)
{
    var postData = $(this).serializeArray();
    var formURL = $(this).attr("action");
    $.ajax(
    {
        url : formURL,
        type: "POST",
        data : postData,
        success:function(data, textStatus, jqXHR)
        {
            var json = $.parseJSON(data);
            if (json.success)
            {
               window.setTimeout(function(){window.location.replace('index.php?<?php echo rand(100,999); ?>#tab_default_3')},2000)
               $("#pwdform input.form-control").val("");
               $("#pwdmsg").text(json.message);
               $("#pwdmsg").css("color", "green");
               $("#pwdmsg").show();
            } else {
               $("#pwdmsg").text(json.message);
               $("#pwdmsg").css("color", "red");
               $("#pwdmsg").show();
            }
            if (json.newtoken)
            {
              $('input[name="token"]').val(json.newtoken);
            }
        },
        error: function(jqXHR, textStatus, errorThrown)
        {
            //ugh, gtfo
        }
    });
    e.preventDefault();
});

function updateTables(json)
{
        $("#balance").text(json.balance.toFixed(8));
        $("#alist tbody tr").remove();
        for (var i = json.addressList.length - 1; i >= 0; i--) {
                $("#alist tbody").prepend("<tr><td>" + json.addressList[i] + "</td></tr>");
        }
        $("#txlist tbody tr").remove();
        for (var i = json.transactionList.length - 1; i >= 0; i--) {
                var tx_type = '<b style="color: #01DF01;">Received</b>';
                if(json.transactionList[i]['category']=="send")
                {
                        tx_type = '<b style="color: #FF0000;">Sent</b>';
                }
                $("#txlist tbody").prepend('<tr> \
               <td>' + moment(json.transactionList[i]['time'], "X").format('l hh:mm a') + '</td> \
               <td>' + json.transactionList[i]['address'] + '</td> \
               <td>' + tx_type + '</td> \
               <td>' + Math.abs(json.transactionList[i]['amount']) + '</td> \
               <td>' + (json.transactionList[i]['fee']?json.transactionList[i]['fee']:'') + '</td> \
               <td>' + json.transactionList[i]['confirmations'] + '</td> \
               <td><a href="' + blockchain_tx_url.replace("%s", json.transactionList[i]['txid']) + '" target="_blank">Info</a></td> \
            </tr>');
        }
}
function pageRefresh()
{
        window.location.replace('index.php')
}
// Javascript to enable link to tab
var url = document.location.toString();
if (url.match('#')) {
    $('.nav-tabs a[href="#' + url.split('#')[1] + '"]').tab('show');
}

// Change hash for page-reload
$('.nav-tabs a').on('shown.bs.tab', function (e) {
    window.location.hash = e.target.hash;
})
</script>

