<div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Data Arsip</h3>
  </div>
  <div class="panel-body">
      <div class="table-responsive">

        <table class="table table-striped table-bordered display" id="myTable" cellspacing="0" width="100%">
            <thead>
                <tr>
                <th>No.</th>
                    <th>Kode KA</th>
                    <th>Uraian KA</th>
                    <th>SKKAD UU KIP</th>
                    <th>SKKAD PERGUB</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                require_once "config/database.php";

                $keyword="";
                if (isset($_POST['search'])) {
                    $keyword = $_POST['search'];
                }

                $sortir="";
                if (isset($_POST['sort'])) {
                    $sortir = $_POST['sort'];
                }


                if($sortir == 'DESC'){

                    $query = mysqli_query($db,"SELECT * FROM buku INNER JOIN kategori ON kategori.id_kategori=buku.id_kategori INNER JOIN pergub ON pergub.id_skkad=buku.id_skkad WHERE uraian_ka LIKE '%".$keyword."%' ORDER BY uraian_ka DESC");
             // }

                    $hitung_data = mysqli_num_rows($query);
                    if ($hitung_data > 0) {
                        while ($data = mysqli_fetch_array($query)) {
                            ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $data['id_ka']; ?></td>
                                <td><?php echo $data['uraian_ka']; ?></td>
                                <td><?php echo $data['nama_kategori']; ?></td>
                                <td><?php echo $data['skkad_pergub']; ?></td>
                                <td>
                                    <a href="detail.php?id_ka=<?php echo $data['id_ka']; ?>">Detail</a> |
                                    <a href="#" id="edit" data-id="<?php echo $data['id_ka']; ?>">Edit</a> |
                                    <a href="#" id="hapus" data-id="<?php echo $data['id_ka']; ?>">Hapus</a> 
                                </td>
                            </tr>
                        <?php } } else{ ?>


                           <tr>
                            <td colspan="6" class="text-center">Tidak ada data ditemukan</td>
                        </tr>


                    <?php } } elseif($sortir == 'ASC'){

                        $query = mysqli_query($db,"SELECT * FROM buku INNER JOIN kategori ON kategori.id_kategori=buku.id_kategori INNER JOIN pergub ON pergub.id_skkad=buku.id_skkad WHERE uraian_ka LIKE '%".$keyword."%' ORDER BY uraian_ka ASC");
             // }

                        $hitung_data = mysqli_num_rows($query);
                        if ($hitung_data > 0) {
                            while ($data = mysqli_fetch_array($query)) {
                                ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $data['id_ka']; ?></td>

                                    <td><?php echo $data['uraian_ka']; ?></td>
                                    <td><?php echo $data['nama_kategori']; ?></td>
                                    <td><?php echo $data['skkad_pergub']; ?></td>
                                    <td>
                                        <a href="detail.php?id_ka=<?php echo $data['id_ka']; ?>">Detail</a> |
                                        <a href="#" id="edit" data-id="<?php echo $data['id_ka']; ?>">Edit</a> |
                                        <a href="#" id="hapus" data-id="<?php echo $data['id_ka']; ?>">Hapus</a> 
                                    </td>
                                </tr>
                            <?php } } else{ ?>


                               <tr>
                                <td colspan="6" class="text-center">Tidak ada data ditemukan</td>
                            </tr>


                        <?php } } else{

                            $query = mysqli_query($db,"SELECT * FROM buku INNER JOIN kategori ON kategori.id_kategori=buku.id_kategori INNER JOIN pergub ON pergub.id_skkad=buku.id_skkad WHERE uraian_ka LIKE '%".$keyword."%' ORDER BY uraian_ka ASC");
             // }

                            $hitung_data = mysqli_num_rows($query);
                            if ($hitung_data > 0) {
                                while ($data = mysqli_fetch_array($query)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $data['id_ka']; ?></td>
                                        
                                        <td><?php echo $data['uraian_ka']; ?></td>
                                        <td><?php echo $data['nama_kategori']; ?></td>
                                        <td><?php echo $data['skkad_pergub']; ?></td>
                                        <td>
                                            <a href="detail.php?id_ka=<?php echo $data['id_ka']; ?>">Detail</a> |
                                            <a href="#" id="edit" data-id="<?php echo $data['id_ka']; ?>">Edit</a> |
                                            <a href="#" id="hapus" data-id="<?php echo $data['id_ka']; ?>">Hapus</a> 
                                        </td>
                                    </tr>
                                <?php } } else{ ?>


                                   <tr>
                                    <td colspan="6" class="text-center">Tidak ada data ditemukan</td>
                                </tr>


                            <?php } }  ?> 


                        </tbody>
                    </table>
                </div>
            </div>
        </div>