<?php include "header.php"; ?>
    <!-- main content -->
    <div class="main-content col-md-9 ms-auto">
        <div class="title">
            <h2>Detail Pendaftaran</h2>
        </div>

        <!-- get data from tb_daftar -->
        <?php
            $id_daftar = $_GET["id"];
            $daftar = new MDaftar();
            $sql = "SELECT d.*,j.nama_jurusan FROM tb_daftar as d INNER JOIN tb_jurusan as j ON d.id_jurusan = j.id_jurusan WHERE id_daftar=$id_daftar";
            $dtDaftar = $daftar->select($sql);
            $rsDaftar = $dtDaftar[0]; // single data
        ?>
        <!-- end get data from tb_daftar -->
        <table class="table">
            <tr>
                <td class="fw-bold" width="30%">No Pendaftaran</td>
                <td>: <?= $rsDaftar["no_daftar"] ?></td>
            </tr>
            <tr>
                <td class="fw-bold" width="30%">NISN</td>
                <td>: <?= $rsDaftar["tgl_daftar"] ?></td>
            </tr>
            <tr>
                <td class="fw-bold" width="30%">Tempat, Tanggal Lahir</td>
                <td>: <?= $rsDaftar["tmp_lahir_daftar"] ?> , <?= date("d F Y",strtotime($rsDaftar["tgl_lahir_daftar"])) ?></td>
            </tr>
            <tr>
                <td class="fw-bold" width="30%">Alamat</td>
                <td>: <?= $rsDaftar["alamat_daftar"] ?></td>
            </tr>
            <tr>
                <td class="fw-bold" width="30%">Jenis Kelamin</td>
                <td>: <?= $rsDaftar["jk_daftar"] == 0 ? "Laki-Laki" : "Perempuan" ?></td>
            </tr>
            <tr>
                <td class="fw-bold" width="30%">Agama</td>
                <td>: <?= $rsDaftar["agama_daftar"] ?></td>
            </tr>
            <tr>
                <td class="fw-bold" width="30%">Telepon</td>
                <td>: <?= $rsDaftar["telp_daftar"] ?></td>
            </tr>
            <tr>
                <td class="fw-bold" width="30%">Asal Sekolah</td>
                <td>: <?= $rsDaftar["asal_sekolah_daftar"] ?></td>
            </tr>
            <tr>
                <td class="fw-bold" width="30%">Nilai</td>
                <td>: <?= $rsDaftar["nilai_daftar"] ?></td>
            </tr>
            <tr>
                <td class="fw-bold" width="30%">Jurusan yang dipilih</td>
                <td>: <?= $rsDaftar["nama_jurusan"] ?></td>
            </tr>
            <tr>
                <td class="fw-bold" width="30%">Nama Ayah</td>
                <td>: <?= $rsDaftar["nm_ayah_daftar"] ?></td>
            </tr>
            <tr>
                <td class="fw-bold" width="30%">Nama Ibu</td>
                <td>: <?= $rsDaftar["nm_ibu_daftar"] ?></td>
            </tr>
            <tr>
                <td class="fw-bold" width="30%">Syarat</td>
                <td>:
                    <?php
                    if(isset($rsDaftar["syarat_daftar"])){
                ?>
                    <a href="syarat/<?= $rsDaftar["syarat_daftar"] ?>" target="_blank" class="btn btn-primary btn-sm"><i class="fas fa-eye"> LIHAT</i></a>
                <?php     
                    }
                ?>
                </td>
            </tr>
            <tr>
                <td class="fw-bold" width="30%">Verified</td>
                <td>: <span class="badge bg-<?= $rsDaftar["verified_daftar"]==1 ? "success" : "warning" ?>"><?= $rsDaftar["verified_daftar"]==1 ? "Verified" : "Belum Verified" ?></span></td>
            </tr>
            <tr>
                <td class="fw-bold" width="30%">Status</td>
                <td>: 
                    <!-- diserahkan -->
                    <?php if( $rsDaftar["status_daftar"]==1){ ?>
                        <span class="badge bg-warning">Diserahkan</span>
                    <?php } ?>
                    <!-- ditolak -->
                    <?php if( $rsDaftar["status_daftar"]==2){ ?>
                        <span class="badge bg-danger">Ditolak</span>
                    <?php } ?>
                    <!-- diterima -->
                    <?php if( $rsDaftar["status_daftar"]==3){ ?>
                        <span class="badge bg-warning">Diterima</span>
                    <?php } ?>
                </td>
            </tr>
        </table>
    </div>
    <!-- end main content -->
<?php include "footer.php"; ?>