<?php if (!defined("IN_WALLET")) { die("Auth Error!"); } ?>
<?php
if (!empty($error))
{
    echo "<p style='font-weight: bold; color: red;'>" . $error['message']; "</p>";
}
if (satoshitize($balance) < 1) { $balance = "0"; }

$jsondata = file_get_contents('https://www.coinexchange.io/api/v1/getmarketsummary?market_id=345');
$data = json_decode($jsondata, true);

$btcprice = $data['result']['AskPrice'];

$btcprice = 0;
$btcbalance = $btcprice * satoshitize($balance);

$jsondata2 = file_get_contents('https://blockchain.info/ticker');
$data2 = json_decode($jsondata2, true);

$btcusd = $data2['USD']['sell'];
$usdbalance = $btcusd * number_format($btcbalance,8);

?>

<div class="container">
    <div class="row">
                <div class="col-md-12">
                        <div class="tabbable-panel">
                                <div class="tabbable-line">
                                        <ul class="nav nav-tabs ">
                                                <li class="active">
                                                        <a href="#tab_default_1" data-toggle="tab">
                                                        <center><img src=wallet.png width=20><br><br><small><b>Fund</b></small></center></a>
                                                </li>
                                                <li>
                                                        <a href="#tab_default_2" data-toggle="tab">
                                                        <center><img src=trans.png width=20><br><br><small><b>Logs</b></small></center></a>
                                                </li>
                                                <li>
                                                        <a href="#tab_default_4" data-toggle="tab">
                                                        <center><img src=send.png width=20><br><br><small><b>Send</b></small></center></a>
						</li>
                                                <li>
                                                        <a href="#tab_default_5" data-toggle="tab">
                                                        <center><img src=qr.png width=20><br><br><small><b>Address</b></small></center></a>
                                                </li>
                                                <li>
                                                        <a href="#tab_default_3" data-toggle="tab">
                                                        <center><img src=option.png width=20><br><br><small><b>Pref</b></small></center></a>
                                                </li>
                                        </ul>
                                        <div class="tab-content">
                                                <div class="tab-pane active" id="tab_default_1">
<br><br>
<div class="panel panel-default">
<div class="panel-body" style="valign=center;">
        <center><b>
        <?php echo $lang['WALLET_HELLO']; ?> , <strong><?php echo $user_session; ?></strong>!
        <?php if ($admin) {?><strong><font color="red">[Admin]</font><?php }?></strong></font>
	</center></b>
</div>
</div>
<div class="panel panel-default">
<div class="panel-body">
    <strong id="balance"><?php echo "<table width=100%><tr><td></td><td align=center><b><h3>".number_format(satoshitize($balance),8)." GOLDY</h3><b><strong><h4>[ ".number_format($usdbalance, 2)." USD ]</b></small></h4></td><td></td></tr></table>"; ?></strong>
</div>
</div>
<div class="panel panel-default">
<div class="panel-body" style="valign=center;">
    <strong id="balance"><?php echo "<table><tr><td><img src=btclogo.png></td><td width=10></td><td width=10%></td><td><strong><small>Currrent Rate<br> 1 BTC =  USD $btcusd </table>"; ?></strong>
</div>
</div>

<form action="index.php" method="POST">

<br />
<center>
<form>
        <input type="hidden" name="action" value="logout" />
        <button type="submit" class="btn btn-default" style="width:100%;"><?php echo $lang['WALLET_LOGOUT']; ?></button>
</form>
</center>
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
                                                </div>
                                                <div class="tab-pane" id="tab_default_4">
<br><br>
<form action="index.php" method="POST" class="clearfix" id="withdrawform">
    <input type="hidden" name="action" value="withdraw" />
    <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">
    <div class="col-md-4"><input type="text" class="form-control" name="address" placeholder="<?php echo $lang['WALLET_ADDRESS']; ?>"></div><br>
    <div class="col-md-2"><input type="text" class="form-control" name="amount" placeholder="<?php echo $lang['WALLET_AMOUNT']; ?>"></div><br>
    <div class="col-md-2"><button type="submit" class="btn btn-default"><?php echo $lang['WALLET_SENDCONF']; ?></button></div><br>
</form>
                                                </div>
                                                <div class="tab-pane" id="tab_default_5">
<br><br>
<center>
<table width=100%><tr><td align=center>
<form action="index.php" method="POST" id="newaddressform">
        <input type="hidden" name="action" value="new_address" />
        <button type="submit" style="width:100%;" class="btn btn-default"><?php echo "<b><font color=blue>Generate New Address</font></b>"; ?></button>
</form>
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
	</td><td width=10></td><td><font size=1><small><b><?php echo $address; ?></td></table>
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
<table class="table table-bordered table-striped" id="txlist">
<thead>
   <tr>
      <td nowrap><?php echo $lang['WALLET_DATE']; ?></td>
      <td nowrap><?php echo $lang['WALLET_ADDRESS']; ?></td>
      <td nowrap><?php echo $lang['WALLET_TYPE']; ?></td>
      <td nowrap><?php echo $lang['WALLET_AMOUNT']; ?></td>
      <td nowrap><?php echo $lang['WALLET_FEE']; ?></td>
      <td nowrap><?php echo $lang['WALLET_CONFS']; ?></td>
      <td nowrap><?php echo $lang['WALLET_INFO']; ?></td>
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
               <td></td>
               <td>'.$transaction['confirmations'].'</td>
               <td><a href="' . $blockchain_tx_url,  $transaction['txid'] . '" target="_blank">Info</a></td>
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
<form action="index.php" method="POST" class="clearfix" id="pwdform">
    <input type="hidden" name="action" value="password" />
    <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">
    <div class="col-md-2"><input type="password" class="form-control" name="oldpassword" placeholder="<?php echo $lang['WALLET_PASSUPDATEOLD']; ?>"></div><br>
    <div class="col-md-2"><input type="password" class="form-control" name="newpassword" placeholder="<?php echo $lang['WALLET_PASSUPDATENEW']; ?>"></div><br>
    <div class="col-md-2"><input type="password" class="form-control" name="confirmpassword" placeholder="<?php echo $lang['WALLET_PASSUPDATENEWCONF']; ?>"></div><br>
    <div class="col-md-2"><button type="submit" style="width:100%;" class="btn btn-default"><?php echo $lang['WALLET_PASSUPDATECONF']; ?></button></div><br>
</form>

                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
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
                window.setTimeout(function(){window.location.replace('index.php?<?php echo rand(100,999); ?>#tab_default_4')},2000)
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
