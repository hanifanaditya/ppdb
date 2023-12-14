<?php include "header.php"; ?>
    <!-- main content -->
    <div class="main-content col-md-9 ms-auto">

        <?php
            $login = $_SESSION["login"];

            //get data jurusan
            $jurusan = new MJurusan();
            $dtJurusan = $jurusan->All();
            
            // get data pendaftaran
            $daftar = new MDaftar();
            $sql = "SELECT * FROM tb_daftar WHERE id_user = ".$login["id_user"];
            $dDaftar = @$daftar->select($sql);
            $rsDaftar = @$dDaftar[0];

            // jika status diserahkan
            if(count($dDaftar)==0 || @$rsDaftar["status_daftar"]==0 || @$rsDaftar["status_daftar"]==2){
        ?>

        <div class="title">
            <h2>Formulir Pendaftaran</h2>
        </div>

        <!-- message -->
        <?php if(isset($_GET["pesan"])){ ?>
            <div class="alert alert-info" role="alert">
                <?= $_GET["pesan"] ?>
            </div>
        <?php } ?>
        <!-- jika ditolak -->
        <?php if(@$rsDaftar["status_daftar"]==2){ ?>
            <div class="alert alert-danger" role="alert">
                <strong>DITOLAK</strong> Periksa Kembali Data dan Syarat-Syarat Anda
            </div>
        <?php } ?>
        <!-- end message -->

        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="action_daftar.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nisn" class="form-label fw-bold">NISN</label>
                        <input type="hidden" name="id_user" value="<?= @$login["id_user"] ?>">
                        <input type="hidden" name="id_daftar" value="<?= @$rsDaftar["id_daftar"] ?>">
                        <input type="text" name="nisn" id="nisn" class="form-control" value="<?= @$rsDaftar["nisn"] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="nm_daftar" class="form-label fw-bold">Nama Lengkap</label>
                        <input type="text" name="nm_daftar" id="nm_daftar" class="form-control" value="<?= @$rsDaftar["nm_daftar"] ?>" required>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="tmp_lahir_daftar" class="form-label fw-bold">Tempat Lahir</label>
                                <input type="text" name="tmp_lahir_daftar" id="tmp_lahir_daftar" class="form-control" value="<?= @$rsDaftar["tmp_lahir_daftar"] ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label for="tgl_lahir_daftar" class="form-label fw-bold">Tempat Lahir</label>
                                <input type="date" name="tgl_lahir_daftar" id="tgl_lahir_daftar" class="form-control" value="<?= @$rsDaftar["tgl_lahir_daftar"] ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="alamat_daftar" class="form-label fw-bold">Alamat</label>
                        <textarea name="alamat_daftar" id="alamat_datar" class="form-control"><?= @$rsDaftar["alamat_daftar"] ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="jk_daftar" class="form-label fw-bold">Jenis Kelamin</label>
                        <select name="jk_daftar" id="jk_daftar" class="form-select">
                            <option <?= @$rsDaftar["jk_daftar"] == "L" ? "selected" : "" ?> value="L">Laki-Laki</option>
                            <option <?= @$rsDaftar["jk_daftar"] == "P" ? "selected" : "" ?> value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="agama_daftar" class="form-label fw-bold">Agama</label>
                        <select name="agama_daftar" id="agama_daftar" class="form-select">
                            <option <?= @$rsDaftar["agama_daftar"] == "Islam" ? "selected" : "" ?> value="Islam">Islam</option>
                            <option <?= @$rsDaftar["agama_daftar"] == "Kristen" ? "selected" : "" ?> value="Kristen">Kristen</option>
                            <option <?= @$rsDaftar["agama_daftar"] == "Katolik" ? "selected" : "" ?> value="Katolik">Katolik</option>
                            <option <?= @$rsDaftar["agama_daftar"] == "Hindu" ? "selected" : "" ?> value="Hindu">Hindu</option>
                            <option <?= @$rsDaftar["agama_daftar"] == "Budha" ? "selected" : "" ?> value="Budha">Budha</option>
                            <option <?= @$rsDaftar["agama_daftar"] == "Konghucu" ? "selected" : "" ?> value="Konghucu">Konghucu</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="telp_daftar" class="form-label fw-bold">Telepon</label>
                        <input type="text" name="telp_daftar" id="telp_daftar" class="form-control" value="<?= @$rsDaftar["telp_daftar"] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="asal_sekolah_daftar" class="form-label fw-bold">Asal Sekolah</label>
                        <input type="text" name="asal_sekolah_daftar" id="asal_sekolah_daftar" class="form-control" value="<?= @$rsDaftar["asal_sekolah_daftar"] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="nm_ayah_daftar" class="form-label fw-bold">Nama Ayah</label>
                        <input type="text" name="nm_ayah_daftar" id="nm_ayah_daftar" class="form-control" value="<?= @$rsDaftar["nm_ayah_daftar"] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="nm_ibu_daftar" class="form-label fw-bold">Nama Ibu</label>
                        <input type="text" name="nm_ibu_daftar" id="nm_ibu_daftar" class="form-control" value="<?= @$rsDaftar["nm_ibu_daftar"] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="nilai_daftar" class="form-label fw-bold">Nilai Ujian</label>
                        <input type="number" name="nilai_daftar" id="nilai_daftar" class="form-control" step="0.01" value="<?= @$rsDaftar["nilai_daftar"] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="id_jurusan" class="form-label fw-bold">Jurusan</label>
                        <select name="id_jurusan" id="id_jurusan" class="form-select">
                            <option value="">- Pilih Jurusan -</option>
                            <?php
                                foreach($dtJurusan as $rsJurusan){
                            ?>
                                <option <?= @$rsDaftar["id_jurusan"] == $rsJurusan["id_jurusan"] ? "selected" : "" ?> value="<?= $rsJurusan["id_jurusan"] ?>"><?= $rsJurusan["nama_jurusan"] ?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="syarat_daftar" class="form-label fw-bold">Syarat Pendaftaran</label>
                        <input type="file" name="syarat_daftar" id="syarat_daftar" class="form-control" aria-describedby="syarat" required>
                        <div id="syarat" class="form-text">Silahkan Upload semua syarat dalam file PDF dan maximal ukuran 1.5 mb</div>
                        <?php
                            if(isset($rsDaftar["syarat_daftar"])){
                        ?>
                            <a href="syarat/<?= $rsDaftar["syarat_daftar"] ?>" target="_blank">Lihat File Syarat</a>
                        <?php    
                            }
                        ?>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-md-6 d-grid gap-2">
                                <input type="submit" value="SIMPAN" class="btn btn-danger">
                            </div>
                            <div class="col-md-6 d-grid gap-2">
                                <?php
                                    if(isset($rsDaftar["id_daftar"])){
                                ?>
                                <a href="update_status_daftar.php?id=<?= $rsDaftar["id_daftar"] ?>&status=1" class="btn btn-warning">SERAHKAN</a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php
            } else {
                if(@$rsDaftar["verified_daftar"]==1){
        ?>
                    <div class="text-center my-5">
                        <h2 class="text-success">DATA VERIFIED</h2>
                        <p>Data Pendaftaran anda sudah diverifikasi , silahkan menunggu <br>pengumuman dari <strong>Panitia Penerimaan Peserta Didik Baru ( PPDB ) SMK MARYNOLL</strong></p>
                    </div>
        <?php
                } else {
        ?>
                    <div class="text-center my-5">
                        <h2>DATA DISERAHKAN</h2>
                        <p>Data Pendaftaran anda sudah diserahkan , silahkan menunggu <br>verifikasi dari <strong>Panitia Penerimaan Peserta Didik Baru ( PPDB ) SMK MARYNOLL</strong></p>
                    </div>
        <?php
                }
            }
        ?>
    </div>
    <!-- end main content -->
<?php include "footer.php"; ?>