<?php
require_once "config/database.php";

if (isset($_POST['id_ka']) || isset($_POST['uraian_ka']) || isset($_POST['id_skkad']) || isset($_POST['id_na']) || isset($_POST['id_kategori']) ||
isset($_POST['uraian_jra']) || isset($_POST['uraian_skkad']) || isset($_POST['ket_skkad']) || isset($_POST['cut_off']) || isset($_POST['inaktif']) || isset($_POST['deskripsi']) ) {
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
}

// mysqli_query($db, $query)
// or die ("Gagal Perintah SQL".mysql_error());

if(empty($deskripsi)){
	$query = mysqli_query($db, "UPDATE buku SET id_ka='$id_ka',uraian_ka='$uraian_ka',id_skkad='$id_skkad',id_na='$id_na',
    id_kategori='$id_kategori',uraian_jra='$uraian_jra',uraian_skkad='$uraian_skkad',ket_skkad='$ket_skkad',
    cut_off='$cut_off',inaktif='$inaktif',deskripsi='$deskripsi' WHERE id_ka = '$id_ka'");
}else{
    $query = mysqli_query($db, "UPDATE buku SET id_ka='$id_ka',uraian_ka='$uraian_ka',id_skkad='$id_skkad',id_na='$id_na',
    id_kategori='$id_kategori',uraian_jra='$uraian_jra',uraian_skkad='$uraian_skkad',ket_skkad='$ket_skkad',
    cut_off='$cut_off',inaktif='$inaktif',deskripsi='$deskripsi' WHERE id_ka = '$id_ka'");
}
$data['hasil'] = 'sukses';

echo json_encode($data);
