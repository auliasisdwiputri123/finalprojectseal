<?php

require_once "config/database.php";

$data = mysqli_query($db, "SELECT * FROM buku INNER JOIN kategori ON kategori.id_kategori=buku.id_kategori INNER JOIN pergub ON pergub.id_skkad=buku.id_skkad INNER JOIN akhir_surat ON akhir_surat.id_na=buku.id_na  WHERE id_ka = '$_GET[id_ka]'");

// var_dump ($data);
// die();
$row = mysqli_fetch_array($data);

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Aplikasi Arsip</title>

	<link rel="shortcut icon" href="assets/img/favicon.png">

	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/datepicker.min.css" rel="stylesheet">

	<link href="assets/css/style.css" rel="stylesheet">

</head>

<body>
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="awal_user.php">
					<i class="glyphicon glyphicon-check"></i>
					Kelola Arsip
				</a>
			</div>
		</div>
	</nav>

	<div class="container-fluid">

		<div class="row">
			<div class="col-md-12">
				<div class="page-header">
					<h4>
						<i class="glyphicon glyphicon-user"></i> Detail Data Arsip


					</h4>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Data Arsip</h3>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-4 text-center">
								<img src="assets/img/<?= $row['file_baru'] ?>" width="80%">
							</div>

							<div class="col-md-4">
								<table class="table table-bordered table-striped">
									<tr>
										<th>Kode KA</th>
										<td width="10px">:</td>
										<td><?= $row['id_ka'] ?></td>
									</tr>
									<tr>
										<th>SKKUD Pergub</th>
										<td width="10px">:</td>
										<td><?= $row['skkad_pergub'] ?></td>
									</tr>
									<tr>
										<th>SKKUD UU KIP</th>
										<td width="10px">:</td>
										<td><?= $row['nama_kategori'] ?></td>
									</tr>
									<tr>
										<th>Uraian JRA</th>
										<td width="10px">:</td>
										<td><?= $row['uraian_jra'] ?></td>
									</tr>
									<tr>
										<th>Uraian SKKAD</th>
										<td width="10px">:</td>
										<td><?= $row['uraian_skkad'] ?></td>
									</tr>
									<tr>
										<th>Keterangan SKKAD</th>
										<td width="10px">:</td>
										<td><?= $row['ket_skkad'] ?></td>
									</tr>
									<tr>
										<th>Cut Off</th>
										<td width="10px">:</td>
										<td><?= $row['cut_off'] ?></td>
									</tr>
									<tr>
										<th>inaktif</th>
										<td width="10px">:</td>
										<td><?= $row['inaktif'] ?></td>
									</tr>
									<tr>
										<th>Nasib Akhir</th>
										<td width="10px">:</td>
										<td><?= $row['nama_na'] ?></td>
									</tr>
									<tr>
										<th>Usulan</th>
										<td width="10px">:</td>
										<td><?= $row['nama_na'] ?></td>
									</tr>
									<tr>
										<th>Deskripsi</th>
										<td width="10px">:</td>
										<td><?= $row['deskripsi'] ?></td>
									</tr>
								</table>
							</div>
						</div>
						<a href="awal_user.php" class="btn btn-primary">
							<< Kembali</a>
					</div>
				</div>

			</div>
		</div>

	</div>

	<footer class="footer">
		<div class="container-fluid">
			<p class="text-muted pull-left"></p>
			<p class="text-muted pull-right "><a href="http://www.getbootstrap.com" target="_blank"></a></p>
		</div>
	</footer>

</body>

</html>