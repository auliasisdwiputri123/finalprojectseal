
<?php

require_once "config/database.php";

$data = mysqli_query($db, "SELECT * FROM buku WHERE id_ka = '$_POST[id]'");

	// var_dump ($data);
	// die();
$row = mysqli_fetch_array ($data);

?>
<form role="form" id="form-edit" method="post" action="update.php" enctype="multipart/form-data">
	<div class="form-group">
		<label>Kode KA</label>
		<input type="text" name="id_ka" id="id_ka" class="form-control" value="<?php echo $row['id_ka'] ; ?>" readonly>
	</div>

	<div class="form-group">
		<label>Uraian KA</label>
		<input type="text" name="uraian_ka" id="uraian_ka" class="form-control" value="<?php echo $row['uraian_ka'] ; ?>" required>
	</div>

	<div class="form-group">
		<label>Penulis</label>
		<select class="form-control" name="id_skkad" id="id_skkad" required>
			
			<?php

			$query = mysqli_query($db,"SELECT * FROM pergub");
			$hitung_data = mysqli_num_rows($query);
			if ($hitung_data > 0) {
				while ($data = mysqli_fetch_array($query)) {
					?>
					<option value="<?php echo $data['id_skkad']; ?>" <?= ($row['id_skkad'] == $data['id_skkad']) ? 'selected' : '' ?>><?php echo $data['skkad_pergub']; ?></option>
				<?php } } ?> 
			</select>
		</div>

			<div class="form-group">
				<label>SKKAD UU KIP</label>
				<select class="form-control" name="id_kategori" id="id_kategori" required>
					
					<?php
					$query = mysqli_query($db,"SELECT * FROM kategori");
					$hitung_data = mysqli_num_rows($query);
					if ($hitung_data > 0) {
						while ($data = mysqli_fetch_array($query)) {
							?>
							<option value="<?php echo $data['id_kategori']; ?>" <?= ($row['id_kategori'] == $data['id_kategori']) ? 'selected' : '' ?>><?php echo $data['nama_kategori']; ?></option>
						<?php } } ?> 
					</select>
				</div>

				<div class="form-group">
					<label>Uraian JRA</label>
					<input type="text" class="form-control" name="uraian_jra" id="uraian_jra" value="<?php echo $row['uraian_jra'] ; ?>" required>
				</div>

				<div class="form-group">
					<label>Uraian SKKAD</label>
					<input type="text" class="form-control" name="uraian_skkad" id="uraian_skkad" value="<?php echo $row['uraian_skkad'] ; ?>" required>
				</div>

				<div class="form-group">
					<label>Ket SKKAD</label>
					<input type="text" class="form-control" name="ket_skkad" id="ket_skkad" value="<?php echo $row['ket_skkad'] ; ?>" required>
				</div>
				<div class="form-group">
					<label>Cut Off</label>
					<input type="text" class="form-control" name="cut_off" id="cut_off" value="<?php echo $row['cut_off'] ; ?>" required>
				</div>
				<div class="form-group">
					<label>Inaktif</label>
					<input type="text" class="form-control" name="inaktif" id="inaktif" value="<?php echo $row['inaktif'] ; ?>" required>
				</div>

			<div class="form-group">
			<label>Nasib Akhir</label>
			<select class="form-control" name="id_na" id="id_na" required>
				
				<?php

				$query = mysqli_query($db,"SELECT * FROM akhir_surat");
				$hitung_data = mysqli_num_rows($query);
				if ($hitung_data > 0) {
					while ($datap = mysqli_fetch_array($query)) {
						?>
						<option value="<?php echo $datap['id_na']; ?>" <?= ($row['id_na'] == $datap['id_na']) ? 'selected' : '' ?>><?php echo $datap['nama_na']; ?></option>
					<?php } } ?> 
				</select>
			</div>

			<div class="form-group">
			<label>Usulan</label>
			<select class="form-control" name="id_na" id="id_na" required>
				
				<?php

				$query = mysqli_query($db,"SELECT * FROM akhir_surat");
				$hitung_data = mysqli_num_rows($query);
				if ($hitung_data > 0) {
					while ($datap = mysqli_fetch_array($query)) {
						?>
						<option value="<?php echo $datap['id_na']; ?>" <?= ($row['id_na'] == $datap['id_na']) ? 'selected' : '' ?>><?php echo $datap['nama_na']; ?></option>
					<?php } } ?> 
				</select>
			</div>


				<div class="form-group">
					<label>Deskripsi</label>
					<textarea class="form-control" name="deskripsi" id="deskripsi" rows="3" required><?php echo $row['deskripsi'] ; ?></textarea>
				</div>

			

			</form>