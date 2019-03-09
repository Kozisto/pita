<?php

$server_url = "http://80.211.216.45/";  // ENTER WEBSITE URL ALONG WITH A TRAILING SLASH

$db_host = "localhost";
$db_user = "root";
$db_pass = "1wq22ew3";
$db_name = "wallet";

$rpc_host = "127.0.0.1";
$rpc_port = "30002";
$rpc_user = "rpc";
$rpc_pass = "pass";

$fullname = "Goldy"; //Website Title (Do Not include 'wallet')
$short = "GOLDY"; //Coin Short (BTC)
$blockchain_tx_url = "https://xlrc.blockxplorer.info/tx/"; //Blockchain Url
$support = "support@goldy.io"; //Your support eMail
$hide_ids = array(1); //Hide account from admin dashboard
$donation_address = ""; //Donation Address

$reserve = "0.001"; //This fee acts as a reserve. The users balance will display as the balance in the daemon minus the reserve. We don't reccomend setting this more than the Fee the daemon charges.

?>
