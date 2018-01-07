<?php session_start(); ?>
<?php
if(!isset($_SESSION['usermikhmon'])){
	header("Location:login.php");
}
?>
<?php
error_reporting(0);
require('./lib/api.php');
include('./config.php');
include('./vouchers/kvouchers.php');

$API = new RouterosAPI();
$API->debug = false;
if ($API->connect( $iphost, $userhost, $passwdhost )) {
	$ARRAY = $API->comm("/ip/hotspot/print");
	$API->disconnect();
	$server1 = ($ARRAY[0]['name']);
	$server2 = ($ARRAY[1]['name']);
	$server3 = ($ARRAY[2]['name']);
	$server4 = ($ARRAY[3]['name']);
	$server5 = ($ARRAY[4]['name']);
}

$tlimit = $uptimelimit;
if ($tlimit == $utimelimit1){
	$vtimelimit = "Durasi:$utimelimit1t";
}elseif ($tlimit == $utimelimit2){
	$vtimelimit = "Durasi:$utimelimit2t";
}elseif ($tlimit == $utimelimit3){
	$vtimelimit = "Durasi:$utimelimit3t";
}elseif ($tlimit == $utimelimit4){
	$vtimelimit = "Durasi:$utimelimit4t";
}else {
	$vtimelimit= "";
}

$blimit = $upbytelimit;
if ($blimit == $ubytelimit1){
	$vbytelimit = "Kuota:$ubytelimit1t";
}elseif ($blimit == $ubytelimit2){
	$vbytelimit = "Kuota:$ubytelimit2t";
}elseif ($blimit == $ubytelimit3){
	$vbytelimit = "Kuota:$ubytelimit3t";
}elseif ($blimit == $ubytelimit4){
	$vbytelimit = "Kuota:$ubytelimit4t";
}elseif ($blimit == $ubytelimit5){
	$vbytelimit = "Kuota:$ubytelimit5t";
}else {
	$vbytelimit= "";
}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Mikrotik Hotspot Generate Kode Vouchers</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta http-equiv="pragma" content="no-cache" />
		<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;"/>
		<link rel="icon" href="./img/favicon.png" />
		<link rel="stylesheet" href="css/style.css" media="screen">
		<script>
			function Reload() {
				location.reload();
			}
			function goBack() {
				window.history.back();
			}
		</script>
	</head>
	<body>
		<div class="main">
			<table class="tnav">
				<tr>
					<td style="text-align: center;" colspan=2>Generate Voucher</td>
				</tr>
				<tr>
					<td colspan=2>
						<button class="material-icons" onclick="location.href='genkvs.php';" title="Reload">autorenew</button>
						<div class="dropdown" style="float:right;">
							<button class="material-icons">local_play</button>
								<div class="dropdown-content">
									<a class="material-icons" href="#">local_play</a>
									<a href="genkv.php">1 Voucher</a>
									<a href="genkvs.php">1-99 Voucher</a>
									<a href="genupm.php">1 Custom User Pass</a>
								</div>
						</div>
						<button class="material-icons" onclick="location.href='./';" title="Dashboard">dashboard</button>
						<button class="material-icons" onclick="goBack()" title="Back">arrow_back</button>
					</td>
				</tr>
			</table>
			<form autocomplete="off" method="post" action="">
				<table class="tnav" align="center"  >
					<tr><td>Jenis Voucher</td><td>:</td><td>
						<select name="genall" required="1">
							<option value="">Pilih...</option>
							<option value="kv">Kode Voucher</option>
							<option value="up">User Password</option>
						</select>
						</td>
					</tr>
					<tr><td>Server Hotspot</td><td>:</td><td>
						<select name="server" required="1">
							<option value="all">all</option>
							
							<?php
							$TotalReg = count($srvlist);

							for ($i=0; $i<$TotalReg; $i++){
							$regtable = $srvlist[$i];echo "<option>" . $regtable['name'];echo "</option>";
							}
								?>
						</select>
						</td>
					</tr>
					<tr><td>Profile | Masa Aktif</td><td>:</td><td>
						<select name="uprofile" required="1">
							<option value="">Pilih...</option>
							<?php
								$proflist = array ('1'=>$profile1,$profile2,$profile3,$profile4,$profile5,$profile6,$profile7,$profile8,$profile9,$profile10,$profile11,$profile12,$profile13,$profile14,$profile15);
								
									if($profile1 == ""){
									}elseif ($profile2 == ""){
										for ($i = 1; $i <= 1; $i++) {
										echo "<option>$proflist[$i]</option>";
									}
									}elseif ($profile3 == ""){
										for ($i = 1; $i <= 2; $i++) {
										echo "<option>$proflist[$i]</option>";
									}
									}elseif ($profile4 == ""){
										for ($i = 1; $i <= 3; $i++) {
										echo "<option>$proflist[$i]</option>";
									}
									}elseif ($profile5 == ""){
										for ($i = 1; $i <= 4; $i++) {
										echo "<option>$proflist[$i]</option>";
									}
									}elseif ($profile6 == ""){
										for ($i = 1; $i <= 5; $i++) {
										echo "<option>$proflist[$i]</option>";
									}
									}elseif ($profile7 == ""){
										for ($i = 1; $i <= 6; $i++) {
										echo "<option>$proflist[$i]</option>";
									}
									}elseif ($profile8 == ""){
										for ($i = 1; $i <= 7; $i++) {
										echo "<option>$proflist[$i]</option>";
									}
									}elseif ($profile9 == ""){
										for ($i = 1; $i <= 8; $i++) {
										echo "<option>$proflist[$i]</option>";
									}
									}elseif ($profile10 == ""){
										for ($i = 1; $i <= 9; $i++) {
										echo "<option>$proflist[$i]</option>";
									}
									}elseif ($profile11 == ""){
										for ($i = 1; $i <= 10; $i++) {
										echo "<option>$proflist[$i]</option>";
									}
									}elseif ($profile12 == ""){
										for ($i = 1; $i <= 11; $i++) {
										echo "<option>$proflist[$i]</option>";
									}
									}elseif ($profile13 == ""){
										for ($i = 1; $i <= 12; $i++) {
										echo "<option>$proflist[$i]</option>";
									}
									}elseif ($profile14 == ""){
										for ($i = 1; $i <= 13; $i++) {
										echo "<option>$proflist[$i]</option>";
									}
									}elseif ($profile15 == ""){
										for ($i = 1; $i <= 14; $i++) {
										echo "<option>$proflist[$i]</option>";
									}
									}else{
										for ($i = 1; $i <= 15; $i++) {
										echo "<option>$proflist[$i]</option>";
									}
									}
								?>
						</select>
						</td>
					</tr>
					<tr><td>Durasi</td><td>:</td><td>
						<select name="utimelimit" required="1">
							<option value="0">Pilih...</option>
							<?php
								$timelist = array ('1'=>$utimelimit1,$utimelimit2,$utimelimit3,$utimelimit4,$utimelimit5,$utimelimit6,$utimelimit7,$utimelimit8,$utimelimit9,$utimelimit10);
								
								$timetlist = array ('1'=>$utimelimit1t,$utimelimit2t,$utimelimit3t,$utimelimit4t,$utimelimit5t,$utimelimit6t,$utimelimit7t,$utimelimit8t,$utimelimit9t,$utimelimit10t);
								
									if($utimelimit1 == ""){
									}elseif ($utimelimit2 == ""){
										for ($i = 1; $i <= 1; $i++) {
										echo "<option value=$timelist[$i]>$timetlist[$i]</option>";
									}
									}elseif ($utimelimit3 == ""){
										for ($i = 1; $i <= 2; $i++) {
										echo "<option value=$timelist[$i]>$timetlist[$i]</option>";
									}
									}elseif ($utimelimit4 == ""){
										for ($i = 1; $i <= 3; $i++) {
										echo "<option value=$timelist[$i]>$timetlist[$i]</option>";
									}
									}elseif ($utimelimit5 == ""){
										for ($i = 1; $i <= 4; $i++) {
										echo "<option value=$timelist[$i]>$timetlist[$i]</option>";
									}
									}elseif ($utimelimit6 == ""){
										for ($i = 1; $i <= 5; $i++) {
										echo "<option value=$timelist[$i]>$timetlist[$i]</option>";
									}
									}elseif ($utimelimit7 == ""){
										for ($i = 1; $i <= 6; $i++) {
										echo "<option value=$timelist[$i]>$timetlist[$i]</option>";
									}
									}elseif ($utimelimit8 == ""){
										for ($i = 1; $i <= 7; $i++) {
										echo "<option value=$timelist[$i]>$timetlist[$i]</option>";
									}
									}elseif ($utimelimit9 == ""){
										for ($i = 1; $i <= 8; $i++) {
										echo "<option value=$timelist[$i]>$timetlist[$i]</option>";
									}
									}elseif ($utimelimit10 == ""){
										for ($i = 1; $i <= 9; $i++) {
										echo "<option value=$timelist[$i]>$timetlist[$i]</option>";
									}
									}else{
										for ($i = 1; $i <= 10; $i++) {
										echo "<option value=$timelist[$i]>$timetlist[$i]</option>";
									}
									}
								?>
						</select>
						</td>
					</tr>
					<tr><td>Kuota</td><td>:</td><td>
						<select name="ubytelimit" required="1">
							<option value="0">Pilih...</option>
							<?php
								$bytelist = array ('1'=>$ubytelimit1,$ubytelimit2,$ubytelimit3,$ubytelimit4,$ubytelimit5,$ubytelimit6,$ubytelimit7,$ubytelimit8,$ubytelimit9,$ubytelimit10);
								
								$bytetlist = array ('1'=>$ubytelimit1t,$ubytelimit2t,$ubytelimit3t,$ubytelimit4t,$ubytelimit5t,$ubytelimit6t,$ubytelimit7t,$ubytelimit8t,$ubytelimit9t,$ubytelimit10t);
								
									if($ubytelimit1 == ""){
									}elseif ($ubytelimit2 == ""){
										for ($i = 1; $i <= 1; $i++) {
										echo "<option value=$bytelist[$i]>$bytetlist[$i]</option>";
									}
									}elseif ($ubytelimit3 == ""){
										for ($i = 1; $i <= 2; $i++) {
										echo "<option value=$bytelist[$i]>$bytetlist[$i]</option>";
									}
									}elseif ($ubytelimit4 == ""){
										for ($i = 1; $i <= 3; $i++) {
										echo "<option value=$bytelist[$i]>$bytetlist[$i]</option>";
									}
									}elseif ($ubytelimit5 == ""){
										for ($i = 1; $i <= 4; $i++) {
										echo "<option value=$bytelist[$i]>$bytetlist[$i]</option>";
									}
									}elseif ($ubytelimit6 == ""){
										for ($i = 1; $i <= 5; $i++) {
										echo "<option value=$bytelist[$i]>$bytetlist[$i]</option>";
									}
									}elseif ($ubytelimit7 == ""){
										for ($i = 1; $i <= 6; $i++) {
										echo "<option value=$bytelist[$i]>$bytetlist[$i]</option>";
									}
									}elseif ($ubytelimit8 == ""){
										for ($i = 1; $i <= 7; $i++) {
										echo "<option value=$bytelist[$i]>$bytetlist[$i]</option>";
									}
									}elseif ($ubytelimit9 == ""){
										for ($i = 1; $i <= 8; $i++) {
										echo "<option value=$bytelist[$i]>$bytetlist[$i]</option>";
									}
									}elseif ($ubytelimit10 == ""){
										for ($i = 1; $i <= 9; $i++) {
										echo "<option value=$bytelist[$i]>$bytetlist[$i]</option>";
									}
									}else{
										for ($i = 1; $i <= 10; $i++) {
										echo "<option value=$bytelist[$i]>$bytetlist[$i]</option>";
									}
									}
								?>
						</select>
						</td>
					</tr>
					<tr><td>Harga</td><td>:</td><td>
						<select name="uprice" required="1">
							<option value="">Pilih...</option>
							<option>Free</option>
							<?php
								$pricelist = array ('1'=>$price1,$price2,$price3,$price4,$price5,$price6,$price7,$price8,$price9,$price10,$price11,$price12,$price13,$price14,$price15);
								
									if($price1 == ""){
									}elseif ($price2 == ""){
										for ($i = 1; $i <= 1; $i++) {
										echo "<option>$pricelist[$i]</option>";
									}
									}elseif ($price3 == ""){
										for ($i = 1; $i <= 2; $i++) {
										echo "<option>$pricelist[$i]</option>";
									}
									}elseif ($price4 == ""){
										for ($i = 1; $i <= 3; $i++) {
										echo "<option>$pricelist[$i]</option>";
									}
									}elseif ($price5 == ""){
										for ($i = 1; $i <= 4; $i++) {
										echo "<option>$pricelist[$i]</option>";
									}
									}elseif ($price6 == ""){
										for ($i = 1; $i <= 5; $i++) {
										echo "<option>$pricelist[$i]</option>";
									}
									}elseif ($price7 == ""){
										for ($i = 1; $i <= 6; $i++) {
										echo "<option>$pricelist[$i]</option>";
									}
									}elseif ($price8 == ""){
										for ($i = 1; $i <= 7; $i++) {
										echo "<option>$pricelist[$i]</option>";
									}
									}elseif ($price9 == ""){
										for ($i = 1; $i <= 8; $i++) {
										echo "<option>$pricelist[$i]</option>";
									}
									}elseif ($price10 == ""){
										for ($i = 1; $i <= 9; $i++) {
										echo "<option>$pricelist[$i]</option>";
									}
									}elseif ($price11 == ""){
										for ($i = 1; $i <= 10; $i++) {
										echo "<option>$pricelist[$i]</option>";
									}
									}elseif ($price12 == ""){
										for ($i = 1; $i <= 11; $i++) {
										echo "<option>$pricelist[$i]</option>";
									}
									}elseif ($price13 == ""){
										for ($i = 1; $i <= 12; $i++) {
										echo "<option>$pricelist[$i]</option>";
									}
									}elseif ($price14 == ""){
										for ($i = 1; $i <= 13; $i++) {
										echo "<option>$pricelist[$i]</option>";
									}
									}elseif ($price15 == ""){
										for ($i = 1; $i <= 14; $i++) {
										echo "<option>$pricelist[$i]</option>";
									}
									}else{
										for ($i = 1; $i <= 15; $i++) {
										echo "<option>$pricelist[$i]</option>";
									}
									}
								?>
						</select>
						</td>
					</tr>
					<tr>
						<td>Jumlah Voucher</td>
						<td>:</td>
						<td><input type="text" name="jumlahv" required="1" size="3" maxlength="2"></td>
					</tr>
					<tr>
						<td></td>
						<td colspan=3>
							<input type="submit" class="btnsubmit" value="Generate"/>
						</td>
					</tr>
					<tr><td colspan=3><p style="color:green;">Catatan: Maksimal jumlah voucher per lembar [A4=18 Legal/F4=21]<br>Sesuaikan margin agar hasil maksimal.</p></td></tr>
				</table>
			</form>
				<table class="tnav">
					<tr>
						<td>
							<button class="btnsubmit" onclick="location.href='./vcolorconf.php';">Ganti Warna</button>
							<button class="btnsubmit" onclick="window.open('./vouchers/printkvs.php','_blank');">Cetak Kode Voucher</button>
							<button class="btnsubmit" onclick="window.open('./vouchers/printvs.php','_blank');">Cetak User Password</button>
						</td>
					</tr>
				</table>
				<br>
				<table class="tprinta">
					<tr>
						<th>Generate Voucher Sebelumnya</th>
					</tr>
					<tr>
						<td style="text-align: center; ">Aktif:<?php print_r($vprofname);?> <?php print_r($vtimelimit);?> <?php print_r($vbytelimit);?></td></tr><tr><td style="text-align: center; "><?php print_r($vserver);?> <?php print_r($vprice);?></td>
					</tr>
				</table>
				<br>
<?php
	if(isset($_POST['uprofile'])){
		$API = new RouterosAPI();
		$API->debug = false;
		if ($API->connect($iphost, $userhost, $passwdhost)) {
		}
		$profname = ($_POST['uprofile']);
		$uprofile = $profname;
			if ($uprofile == $profile1){
				$vprofile = $vname1;
			}elseif ($uprofile == $profile2){
				$vprofile = $vname2;
			}elseif ($uprofile == $profile3){
				$vprofile = $vname3;
			}elseif ($uprofile == $profile4){
				$vprofile = $vname4;
			}elseif ($uprofile == $profile5){
				$vprofile = $vname5;
			}elseif ($uprofile == $profile6){
				$vprofile = $vname6;
			}elseif ($uprofile == $profile7){
				$vprofile = $vname7;
			}elseif ($uprofile == $profile8){
				$vprofile = $vname8;
			}elseif ($uprofile == $profile9){
				$vprofile = $vname9;
			}elseif ($uprofile == $profile10){
				$vprofile = $vname10;
			}elseif ($uprofile == $profile11){
				$vprofile = $vname11;
			}elseif ($uprofile == $profile12){
				$vprofile = $vname12;
			}elseif ($uprofile == $profile13){
				$vprofile = $vname13;
			}elseif ($uprofile == $profile14){
				$vprofile = $vname14;
			}elseif ($uprofile == $profile15){
				$vprofile = $vname15;
			}else {
				$vprofile= "";
			}
		$timelimit = ($_POST['utimelimit']);
		$tlimit = $timelimit;
			if ($tlimit == $utimelimit1){
				$vtimelimit = "Durasi:$utimelimit1t";
			}elseif ($tlimit == $utimelimit2){
				$vtimelimit = "Durasi:$utimelimit2t";
			}elseif ($tlimit == $utimelimit3){
				$vtimelimit = "Durasi:$utimelimit3t";
			}elseif ($tlimit == $utimelimit4){
				$vtimelimit = "Durasi:$utimelimit4t";
			}elseif ($tlimit == $utimelimit5){
				$vtimelimit = "Durasi:$utimelimit5t";
			}elseif ($tlimit == $utimelimit6){
				$vtimelimit = "Durasi:$utimelimit6t";
			}elseif ($tlimit == $utimelimit7){
				$vtimelimit = "Durasi:$utimelimit7t";
			}elseif ($tlimit == $utimelimit8){
				$vtimelimit = "Durasi:$utimelimit8t";
			}elseif ($tlimit == $utimelimit9){
				$vtimelimit = "Durasi:$utimelimit9t";
			}elseif ($tlimit == $utimelimit10){
				$vtimelimit = "Durasi:$utimelimit10t";
			}else {
				$vtimelimit= "";
		}
		$bytelimit = ($_POST['ubytelimit']);
		$blimit = $bytelimit;
			if ($blimit == $ubytelimit1){
				$vbytelimit = "Kuota:$ubytelimit1t";
			}elseif ($blimit == $ubytelimit2){
				$vbytelimit = "Kuota:$ubytelimit2t";
			}elseif ($blimit == $ubytelimit3){
				$vbytelimit = "Kuota:$ubytelimit3t";
			}elseif ($blimit == $ubytelimit4){
				$vbytelimit = "Kuota:$ubytelimit4t";
			}elseif ($blimit == $ubytelimit5){
				$vbytelimit = "Kuota:$ubytelimit5t";
			}elseif ($blimit == $ubytelimit6){
				$vbytelimit = "Kuota:$ubytelimit6t";
			}elseif ($blimit == $ubytelimit7){
				$vbytelimit = "Kuota:$ubytelimit7t";
			}elseif ($blimit == $ubytelimit8){
				$vbytelimit = "Kuota:$ubytelimit8t";
			}elseif ($blimit == $ubytelimit9){
				$vbytelimit = "Kuota:$ubytelimit9t";
			}elseif ($blimit == $ubytelimit10){
				$vbytelimit = "Kuota:$ubytelimit10t";
			}else {
				$vbytelimit= "";
			}
		$price = ($_POST['uprice']);
		$serverh = ($_POST['server']);
		$jmlv = ($_POST['jumlahv']);
		$kkv = "$profname-". rand(100,999) . "-" . date("d.m.y");
		$genall = ($_POST['genall']);
	if($genall=="kv"){
		for($i=1;$i<=$jmlv;$i++){
			$a[$i]= substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZABCDEFGHIJKLMNOPQRSTUVWXYZ"), -4);
			$n[$i]= rand(1000,9999);
			$u[$i] = "$a[$i]$n[$i]";
		}
		for($i=1;$i<=$jmlv;$i++){
			$API->comm("/ip/hotspot/user/add", array(
				"server" => "$serverh",
				"name" => "$u[$i]",
				"password" => "$u[$i]",
				"profile" => "$profname",
				"limit-uptime" => "$timelimit",
				"limit-bytes-out" => "$bytelimit",
				"comment" => "$kkv",
			));
		}
		$my_file = 'vouchers/kvouchers.php';
		$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
		$data = '<?php $vkkv="' . $kkv . '"; $vserver="' . $serverh . '"; $vprofname="' . $vprofile . '"; $uptimelimit="' . $timelimit . '"; $upbytelimit="' . $bytelimit . '"; $vprice="' . $price . '"; ?>';
	}
	if($genall=="up"){
		for($i=1;$i<=$jmlv;$i++){
			$a[$i]= substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZABCDEFGHIJKLMNOPQRSTUVWXYZ"), -6);
			$n[$i]= rand(100000,999999);
		}
		for($i=1;$i<=$jmlv;$i++){
			$API->comm("/ip/hotspot/user/add", array(
			"server" => "$serverh",
			"name" => "$a[$i]",
			"password" => "$n[$i]",
			"profile" => "$profname",
			"limit-uptime" => "$timelimit",
			"limit-bytes-out" => "$bytelimit",
			"comment" => "$kkv",
			));
		}
		
		$my_file = 'vouchers/vouchers.php';
		$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
		$data = '<?php $vkkv="' . $kkv . '"; $vserver="' . $serverh . '"; $vprofname="' . $vprofile . '"; $uptimelimit="' . $timelimit . '"; $upbytelimit="' . $bytelimit . '"; $vprice="' . $price . '"; ?>';
	}
		
		$API->disconnect();
		
		
		
		fwrite($handle, $data);
		
		echo	"<table class='tprinta'>";
		echo				"<tr>";
		echo					"<th>Generate Voucher Sekarang</th>";
		echo				"<tr>";
		echo					"<td style='text-align: center; '>Aktif:$vprofile $vtimelimit $vbytelimit</td></tr><tr><td style='text-align: center; '>$serverh $price</td>";
		echo				"</tr>";
		echo	"</table>";
		echo	"<br>";
	}
?>
	</body>
</html>
