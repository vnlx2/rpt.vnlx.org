<?php

require __DIR__."/../src/helpers.php";
require __DIR__."/../src/udata.php";

if (!(isset($_GET["uc"]) && is_string($_GET["uc"]) && is_numeric($_GET["uc"]))) {
	header("Location: cf_2024_nov.php");
	exit(0);
}

$uc = (int)$_GET["uc"];
if ($uc < 0 || $uc >= count($data)) {
	header("Location: cf_2024_nov.php");
	exit(0);
}

$ud = $data[$uc];

if ($ud[2] === 0) {
	$amt = "<b style=\"color: red;\">-Rp.".number_format($ud[3], 0, ",", ".")."</b>";
	$type = "DB";
} else {
	$amt = "<b style=\"color: green;\">+Rp.".number_format($ud[2], 0, ",", ".")."</b>";
	$type = "CR";
}

$url = ($_SERVER["HTTPS"] ? "https" : "http") . "://" . $_SERVER["HTTP_HOST"];

if ($ud[5]) {
	$att = $ud[5];
	$ogi = e("{$url}/{$att[0]}");
} else {
	$att = NULL;
	$ogi = NULL;
}

$title = "TX {$uc} | ".e($ud[1]);

?><!DOCTYPE html>
<html>
<head>
<title><?= $title ?></title>
<meta property="og:title" content="<?= $title ?>">
<meta property="og:description" content="<?= $title ?>">
<meta property="og:url" content="<?= "{$url}{$_SERVER["REQUEST_URI"]}" ?>"/>
<?php if (isset($ogi)): ?><meta property="og:image" content="<?= $ogi ?>"><?php endif; ?>

<link rel="stylesheet" type="text/css" href="assets/css/base.css" />
<style>
.mc {
	text-align: center;
	margin: auto;
}
.cetb {
	width: 700px;
	margin: auto;
}
.cetb td, .cetb th {
	padding: 10px;
}
.etb {
	font-size: 15px;
	table-layout: auto;
	border-collapse: collapse;
	width: 100%;
	border: 2px solid #000;
	font-family: Monospace;
}
</style>
</head>
<body>
	<div class="mc">
		<a href="cf_2024_nov.php"><h1>Kembali ke daftar transaksi</h1></a>
		<h1>Detail Transaksi</h1>
		<div class="cetb">
			<table class="etb" border="1">
				<tbody>
					<tr>
						<th>Transaction ID</th>
						<td><?= $uc; ?></td>
					</tr>
					<tr>
						<th>Date</th>
						<td><?= $ud[0]; ?></td>
					</tr>
					<tr>
						<th>Desc</th>
						<td><?= $ud[1]; ?></td>
					</tr>
					<tr>
						<th>Amount</th>
						<td><?= $amt ?></td>
					</tr>
					<tr>
						<th>Type</th>
						<td><?= $type; ?></td>
					</tr>
					<tr>
						<th>Notes</th>
						<td><?= $ud[4]; ?></td>
					</tr>
				</tbody>
			</table>
		</div>
		<h2>Attachment(s)</h2>
			<?php if ($att === NULL): ?>
				<p>No attachment</p>
			<?php else: ?>
			<?php foreach ($att as $at): ?>
				<img style="border: 1px solid #000; margin: auto;" src="<?= $at; ?>" />
			<?php endforeach; ?>
		<?php endif; ?>
	</div>
</body>
</html>
