

<?php

if (isset($_GET['id'])) {
    // ambil id dari url atau method get
    $id = $_GET['id'];

    //1. buat koneksi dengan mysql
    $con = mysqli_connect("localhost", "root", "", "arsip");

    //2. cek konesksi dengan mysql
    if (mysqli_connect_errno()) {
        echo "koneksi gagal" . mysqli_connect_error();
    } else {
        echo "berhasil";
    }

    //3. membaca data dari table mysql
    $sql = "SELECT * FROM buku WHERE id_ka='$id'";

    //4. tampilkan data dengan menjalankan sql query
    if ($result = mysqli_query($con, $sql)) {
        echo "<br>";
        while ($user_data = mysqli_fetch_assoc($result)) {
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
    } else {
        echo "eror: " . $sql . "<br>" . mysqli_error($con);
    }

    //5. tutup koneksi mysql
    mysqli_close($con);
}
//tangkap dulu datanya

if (isset($_POST['submit'])) {

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


    //1. buat koneksi dengan mysqli
    $con = mysqli_connect("localhost", "root", "", "arsip");

    //2. cek koneksi dengan mysqli
    if (mysqli_connect_errno()) {
        echo "koneksi gagal" . mysqli_connect_error();
    } else {
        echo "";
    }
    //buat sql query insert ke database
    //buat query insert dan jalankan
    $sql = "UPDATE list SET id_ka='$id_ka',uraian_ka='$uraian_ka',id_skkad='$id_skkad',id_na='$id_na',
    id_kategori='$id_kategori',uraian_jra='$uraian_jra',uraian_skkad='$uraian_skkad',ket_skkad='$ket_skkad',
    cut_off='$cut_off',inaktif='$inaktif',deskripsi='$deskripsi' WHERE id_ka='$id' ";

    //jalankan query 
    if (mysqli_query($con, $sql)) {
        echo "data berhasi diubah";
    } else {
        echo "ada error" . mysqli_error($con);
    }

    //5. tutup koneksi mysql
    mysqli_close($con);

    $data['hasil'] = 'sukses';

echo json_encode($data);
}


?>






