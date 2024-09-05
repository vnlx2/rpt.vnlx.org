<?php

require __DIR__."/../src/helpers.php";

$fields = [
	"date",
	"desc",
	"in",
	"out",
	"balance"
];
$data = [
	[
		"2024-08-24 22:25:00",
		"Funding from Ammar Faizi",
		300000,
		0,
		""
	],
	[
		"2024-08-24 22:25:00",
		"Bayar booth CF ke M. Nuryusuf Ali",
		0,
		300000,
		""
	],
	[
		"2024-09-02 08:56:30",
		"Funding from Gilang Fachrezi",
		300000,
		0,
		""
	],
	[
		"2024-09-02 08:56:30",
		"Funding from I Nyoman Kahar Wedanta",
		50000,
		0,
		""
	],
	[
		"2024-09-02 13:21:00",
		"Funding from I Putu Heri Subrata",
		60000,
		0,
		""
	],
	[
		"2024-09-03 19:58:32",
		"Funding from Made Widiambara",
		500000,
		0,
		""
	],
	[
		"2024-09-04 18:17:23",
		"Funding from Arief Setiawan",
		100000,
		0,
		""
	]
];

?><!DOCTYPE html>
<html>
<head>
<title>Laporan Keuangan VNL</title>
<link rel="stylesheet" type="text/css" href="assets/css/base.css" />
<style>
html {
	font-family: Arial, sans-serif;
}
.mc {
	text-align: center;
}
.mup {
	text-align: left;
}
.tb-rpt {
	table-layout: auto;
	border-collapse: collapse;
	width: 100%;
	border: 2px solid #000;
	font-family: Monospace;
}
.tb-rpt td {
	border: 2px solid #000;
	padding: 5px;
}
.tb-rpt th {
	border: 2px solid #000;
	padding: 5px;
}
.tb-rpt .abc {
	width: 20%;
}
.ctc {
	border: 1px solid #000;
	width: 400px;
	padding: 10px 10px 40px 10px;
	margin: 0 0 20px 0;
}
#countdown {
	display: flex;
	border: 1px solid #000;
	width: 400px;
}
.cd {
	padding: 5px;
}
</style>
<script>
let countdownInterval = null;

function startCountdown() {
		clearInterval(countdownInterval);
		const eventDateTime = new Date("2024-11-08T08:00:00");
		const countdownElement = document.getElementById('countdown');

		let fireCountdown = function() {
			const now = new Date();
			const timeDifference = eventDateTime - now;

			if (timeDifference <= 0) {
				clearInterval(countdownInterval);
				countdownElement.innerHTML = "<h2>Event has started!</h2>";
			} else {
				const days = Math.floor(timeDifference / (1000 * 60 * 60 * 24));
				const hours = Math.floor((timeDifference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
				const minutes = Math.floor((timeDifference % (1000 * 60 * 60)) / (1000 * 60));
				const seconds = Math.floor((timeDifference % (1000 * 60)) / 1000);

				document.getElementById('days').innerHTML = `<b>${days} Hari</b>`;
				document.getElementById('hours').innerHTML = `<b>${hours} Jam</b>`;
				document.getElementById('minutes').innerHTML = `<b>${minutes} Menit</b>`;
				document.getElementById('seconds').innerHTML = `<b>${seconds} Detik</b>`;
			}
		};

		fireCountdown();
		countdownInterval = setInterval(fireCountdown, 1000);
}
</script>
</head>
<body>
	<div class="mc">
		<a href=".."><h3>Kembali ke Halaman Utama</h3></a>
		<h1>Laporan Keuangan VNL<br/>Untuk Pembiayaan Booth di CF (2024 Nov)</h1>
		<div id="countdown">
			<div class="cd">Countdown to CF Day 1 (2024 Nov 8th):</div>
			<div class="cd" id="days"></div>
			<div class="cd" id="hours"></div>
			<div class="cd" id="minutes"></div>
			<div class="cd" id="seconds"></div>
		</div>
		<script>startCountdown();</script>
		<div class="mup">
			<h3>Bendahara VNL: Ammar Faizi</h3>
			<div class="ctc">
				<h3 style="text-align: center;">Kontak Bendahara VNL</h3>
				<table>
					<tbody>
						<tr><td>E-Mail</td><td>:</td><td>Ammar Faizi &lt;<a href="mailto:Ammar Faizi <ammarfaizi2@vnlx.org>">ammarfaizi2@vnlx.org</a>&gt;</td></tr>
						<tr><td>Phone</td><td>:</td><td><a href="tel:+6285867152777">+6285867152777</a></td></tr>
						<tr><td>Facebook</td><td>:</td><td><a target="_blank" href="https://www.facebook.com/ammarfaizi2">https://www.facebook.com/ammarfaizi2</a></td></tr>
						<tr><td>GitHub</td><td>:</td><td><a target="_blank" href="https://github.com/ammarfaizi2">https://github.com/ammarfaizi2</a></td></tr>
						<tr><td>Telegram</td><td>:</td><td><a target="_blank" href="https://t.me/ammarfaizi2">https://t.me/ammarfaizi2</a></td></tr>
					</tbody>
				</table>
			</div>
		</div>
		<table border="1" class="tb-rpt">
			<thead>
				<tr>
					<th style="width: 8px;">No.</th>
					<th style="width: 205px;">Date</th>
					<th style="width: 305px;">Description</th>
					<th style="width: 115px;">In</th>
					<th style="width: 115px;">Out</th>
					<th style="width: 115px;">Balance</th>
					<th style="max-width: 100px;">Notes</th>
				</tr>
			</thead>
			<tbody>
<?php $b = 0; foreach ($data as $i => $d):
	if ($d[2] <= 0 && $d[3] > 0)
		$clr = "#fadee8";
	else if ($d[2] > 0 && $d[3] <= 0)
		$clr = "#d9fcdc";
	else
		$clr = "#fff";
?>
				<tr style="background-color: <?= $clr; ?>">
					<td><?= ++$i ?>.</td>
					<td><?= e(date("D, d M Y H:i:s", strtotime($d[0]))); ?></td>
					<td align="left"><?= e($d[1]); ?></td>
					<td align="right"><?= e(rupiah_fmt($d[2])); ?></td>
					<td align="right"><?= e(rupiah_fmt($d[3])); ?></td>
					<td align="right"><?php $b = $b + $d[2] - $d[3]; ?><?= rupiah_fmt($b); ?></td>
					<td><?= e($d[4]); ?></td>
				</tr>
<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</body>
</html>
