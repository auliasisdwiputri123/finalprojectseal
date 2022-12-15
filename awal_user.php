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
            <i class="glyphicon glyphicon-user"></i> Data Arsip

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
      
      

    });
  </script>
</body>
</html>