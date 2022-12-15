<?php
require_once "config/database.php";

session_start();
 
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level']==""){
		header("location:index.php?pesan=gagal");
	}
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
        <a class="navbar-brand" href="index.php">
          <i class="glyphicon glyphicon-check"></i>
          Logout
        </a>
      </div>
    </div> 
  </nav>

  <div class="container-fluid">

    <div class="row">
      <div class="col-md-12">
        <div class="page-header">
          <h4>
            <i class="glyphicon glyphicon-user"></i> Data Arsip Arsiparis

            <div class="pull-right btn-tambah">
              <form class="form-inline">
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="glyphicon glyphicon-search"></i>
                    </div>
                    <input type="text" class="form-control" id="search" name="search" placeholder="Cari disini...">
                  </div>
                </div>

                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah">Add New</button>
              </form>
            </div>

            <!-- <div class="pull-right btn-tambah">
              <form class="form-inline">
                <div class="form-group">
                  <div class="input-group">
                   <select name="sort" id="sort" class="form-control" required>
                    <option value="ASC">A-Z</option>
                    <option value="DESC">Z-A</option>
                  </select>
                </div>
              </div>
            </form>
          </div> -->

        </h4>
      </div>

        <!-- <form action="" id="sorting" method="POST" class="form-inline" style="margin-bottom: 10px">
          <div class="form-group">
            <div class="input-group">
              <label for="">Sorting berdasarkan judul buku</label>
              <select name="sort" id="sort" class="form-control">
                    <option value="ASC">A-Z</option>
                    <option value="DESC">Z-A</option>
                  </select>
            </div>
          </div>
        </form> -->

        <div class="row" style="margin-bottom: 15px;">
          <div class="col-md-6">
            <div class="card">
              <div class="card-body">
                <form class="form-inline">
                  <div class="form-group">
                    <label for="Sorting berdasarkan judul buku" style="margin-right: 10px">Sorting berdasarkan Uraian KA</label>
                     <select name="sort" id="sort" class="form-control" style="width: 100px;">
                    <option value="ASC">A-Z</option>
                    <option value="DESC">Z-A</option>
                  </select>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

        <div id="hasil"></div>

      </div>
    </div>

  </div>

  <footer class="footer">
    <div class="container-fluid">
      <p class="text-muted pull-left"></p>
      <p class="text-muted center ">@kominfo <a href="http://www.getbootstrap.com" target="_blank"></a></p>
    </div>
  </footer>

  <div id="modal-tambah" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <form role="form" id="form-tambah" method="post" action="input.php" enctype="multipart/form-data">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Tambah Data Arsip</h4>
          </div>
          <div class="modal-body">

            <div class="form-group">
              <label>Kode KA</label>
              <input class="form-control" id="id_ka" name="id_ka" required>
            </div> 

            <div class="form-group">
              <label>Uraian KA</label>
              <input class="form-control" id="uraian_ka" name="uraian_ka" required>
            </div>     

            <div class="form-group">
              <label>SKKAD UU Pergub</label>
              <select class="form-control" name="id_skkad" id="id_skkad" required>
                <option value="">-- Pilih Kategori --</option>
                <?php

                $query = mysqli_query($db,"SELECT * FROM pergub");
                $hitung_data = mysqli_num_rows($query);
                if ($hitung_data > 0) {
                  while ($data = mysqli_fetch_array($query)) {
                    ?>
                    <option value="<?php echo $data['id_skkad']; ?>"><?php echo $data['skkad_pergub']; ?></option>
                  <?php } } ?> 
                </select>
              </div>

            

                <div class="form-group">
                  <label>SKKAD UU KIP</label>
                  <select class="form-control" name="id_kategori" id="id_kategori" required>
                    <option value="">-- Pilih Kategori --</option>
                    <?php
                    $query = mysqli_query($db,"SELECT * FROM kategori");
                    $hitung_data = mysqli_num_rows($query);
                    if ($hitung_data > 0) {
                      while ($data = mysqli_fetch_array($query)) {
                        ?>
                        <option value="<?php echo $data['id_kategori']; ?>"><?php echo $data['nama_kategori']; ?></option>
                      <?php } } ?> 
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Uraian JRA</label>
                    <input type="text" class="form-control" name="uraian_jra" id="uraian_jra" required>
                  </div>

                  <div class="form-group">
                    <label>Uraian SKKAD</label>
                    <input type="text" class="form-control" name="uraian_skkad" id="uraian_skkad" required>
                  </div>

                  <div class="form-group">
                    <label>Keterangan SKKAD</label>
                    <input type="text" class="form-control" name="ket_skkad" id="ket_skkad" required>
                  </div>
                  <div class="form-group">
                    <label>Cut Off</label>
                    <input type="text" class="form-control" name="cut_off" id="cut_off" required>
                  </div>
                  <div class="form-group">
                    <label>Inaktif</label>
                    <input type="text" class="form-control" name="inaktif" id="inaktif" required>
                  </div>

                  <div class="form-group">
                <label>Nasib Akhir</label>
                <select class="form-control" name="id_na" id="id_na" required>
                  <option value="">-- Pilih Nasib Akhir Surat --</option>
                  <?php
                  $query = mysqli_query($db,"SELECT * FROM akhir_surat");
                  $hitung_data = mysqli_num_rows($query);
                  if ($hitung_data > 0) {
                    while ($data = mysqli_fetch_array($query)) {
                      ?>
                      <option value="<?php echo $data['id_na']; ?>"><?php echo $data['nama_na']; ?></option>
                    <?php } } ?> 
                  </select>
                </div>

                <div class="form-group">
                <label>Usulan</label>
                <select class="form-control" name="id_na" id="id_na" required>
                  <option value="">-- Pilih Usulan Surat --</option>
                  <?php
                  $query = mysqli_query($db,"SELECT * FROM akhir_surat");
                  $hitung_data = mysqli_num_rows($query);
                  if ($hitung_data > 0) {
                    while ($data = mysqli_fetch_array($query)) {
                      ?>
                      <option value="<?php echo $data['id_na']; ?>"><?php echo $data['nama_na']; ?></option>
                    <?php } } ?> 
                  </select>
                </div>


                  <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3" required></textarea>
                  </div>

                  <div class="form-group">
                    <label>file</label>
                    <input type="file" class="form-control" name="file_baru" id="file_baru" required>
                  </div>

                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-info" data-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-primary" >Simpan</button>
                </div>
              </form>   
            </div>
          </div>
        </div>

        <div id="modal-edit" class="modal fade" role="dialog">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <form role="form" id="form-edit" method="post" action="update.php" enctype="multipart/form-data">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Edit Data Arsip</h4>
                </div>
                <div class="modal-body">
                  <div id="data-edit">

                  </div>        
                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-info" data-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-primary" >Ubah</button>
                </div>
              </form>   
            </div>
          </div>
        </div> 

        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>

 <!--  <script type="text/javascript">
    $(document).ready(function(){
      load_data();
      function load_data(search){
        $.ajax({
          url:"get_data.php",
          method:"POST",
          data: {
            search: search
          },
          success:function(data){
            $('#hasil').html(data);
          }
        });
      }
      $('#search').keyup(function(){
        var search = $("#search").val();
        load_data(search);
      });
    });
  </script> -->
  <script type="text/javascript">

    $(document).ready(function(){
      // var data = "get_data.php";
      //load_data();

      load_data();
      function load_data(search){
        $.ajax({
          url:"get_data.php",
          method:"POST",
          data: {
            search: search
          },
          success:function(data){
            $('#hasil').html(data);
          }
        });
      }

      function sort_data(sort){
        $.ajax({
          url:"get_data.php",
          method:"POST",
          data: {
            sort: sort
          },
          success:function(data){
            console.log(sort);
            $('#hasil').html(data);
          }
        });
      }

      $('#search').keyup(function(){
        var search = $("#search").val();
        load_data(search);
      });

      $('#sort').change(function(){
        var sort = $("#sort").val();
        sort_data(sort);
      });
      
      $("#form-tambah").submit(function(e) {
        e.preventDefault();
        
        // var dataform = $("#form-tambah").serialize();
        $.ajax({
          url: "input.php",
          type: "post",
          // data: dataform,
          data: new FormData( this ),
          processData: false,
          contentType: false,
          success: function(result) {
            // console.log(dataform);
            $('#modal-tambah').modal('hide');
            $("#id_ka").val('');
            $("#uraian_ka").val('');
            $("#id_skkad").val('');
            $("#id_na").val('');
            $("#id_kategori").val('');
            $("#uraian_jra").val('');
            $("#uraian_skkad").val('');
            $("#ket_skkad").val('');
            $("#cut_off").val('');
            $("#inaktif").val('');
            $("#deskripsi").val('');
            $("#file_baru").val('');
            load_data();
          }
        });
      });
      
      $(document).on('click','#edit',function(e){
        e.preventDefault();
        $("#modal-edit").modal('show');
        $.post('edit.php',
        {
          id:$(this).attr('data-id')
        },
        function(html){
          $("#data-edit").html(html);
        }   
        );
      });
      
      
      $("#form-edit").submit(function(e) {
        e.preventDefault();
        
        // var dataform = $("#form-edit").serialize();
        $.ajax({
          url: "update.php",
          type: "post",
          data: new FormData( this ),
          processData: false,
          contentType: false,
          success: function(result) {
            // console.log(this);
            $('#modal-edit').modal('hide');
            $("#id_ka").val('');
            $("#uraian_ka").val('');
            $("#id_skkad").val('');
            $("#id_na").val('');
            $("#id_kategori").val('');
            $("#uraian_jra").val('');
            $("#uraian_skkad").val('');
            $("#ket_skkad").val('');
            $("#cut_off").val('');
            $("#inaktif").val('');
            $("#deskripsi").val('');
            $("#file_baru").val('');
            load_data();
          }
        });
      });
      
      
      $(document).on('click','#hapus',function(e){
        e.preventDefault();
        $.post('hapus.php',
          {id:$(this).attr('data-id')},
          function(html){
           load_data();      
         }   
         );
      });


    });
  </script>
</body>
</html>