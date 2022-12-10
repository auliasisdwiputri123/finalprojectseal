<?php

require_once "config/database.php";

// if(isset($_POST['submit'])){
$id_ka = $_POST['id_ka'];
$uraian_ka = $_POST['uraian_ka'];
$id_skkad = $_POST['id_skkad'];
$id_na = $_POST['id_na'];
$id_kategori = $_POST['id_kategori'];
$uraian_jra = $_POST['uraian_jra'];
$uraian_skkad = $_POST['uraian_skkad'];
$ket_skkad = $_POST['ket_skkad'];
$cut_off = $_POST['cut_off'];
$inaktif = $_POST['inaktif'];
$deskripsi = $_POST['deskripsi'];

$ekstensi_diperbolehkan	= array('pdf');
$file_baru = $_FILES['file_baru']['name'];
$x = explode('.', $file_baru);
$ekstensi = strtolower(end($x));
$file_tmp = $_FILES['file_baru']['tmp_name'];

if (!empty($file_baru)){
	if (in_array($ekstensi, $ekstensi_diperbolehkan) === true){

                //Mengupload file_baru
		move_uploaded_file($file_tmp, 'assets/img/'.$file_baru);
	}
}

$query = mysqli_query($db, "INSERT INTO buku(id_ka, uraian_ka, id_skkad, id_na, id_kategori, uraian_jra, uraian_skkad, ket_skkad, cut_off, inaktif , deskripsi, file_baru) VALUES ('$id_ka','$uraian_ka', '$id_skkad', '$id_na', '$id_kategori', '$uraian_jra', '$uraian_skkad', '$ket_skkad', '$cut_off' , '$inaktif' ,'$deskripsi','$file_baru')");

$data['hasil'] = 'sukses';

echo json_encode($data);
// }

// mysqli_query($db, $query)
// or die ("Gagal Perintah SQL".mysql_error());

?>

