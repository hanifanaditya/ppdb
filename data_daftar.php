<?php include "header.php"; ?>
    <!-- main content -->
    <div class="main-content col-md-9 ms-auto">
        <div class="title">
            <h2>Data Pendaftaran</h2>
        </div>

        <!-- get data from tb_daftar -->
        <?php
            $daftar = new MDaftar();
            $sql = "SELECT d.*,j.nama_jurusan FROM tb_daftar as d INNER JOIN tb_jurusan as j ON d.id_jurusan = j.id_jurusan WHERE status_daftar=1";
            $dtDaftar = $daftar->select($sql);
        ?>
        <!-- end get data from tb_daftar -->

        <!-- message -->
        <?php if(isset($_GET["pesan"])){ ?>
            <div class="alert alert-info" role="alert">
                <?= $_GET["pesan"] ?>
            </div>
        <?php } ?>
        <!-- end message -->

        <div class="table-responsive">

            <table class="dt-Table table table-bordered" width="100%">
                <thead class="bg-danger text-light">
                    <tr>
                        <th scope="col" data-priority="1">NO DAFTAR</th>
                        <th scope="col" data-priority="2">NAMA</th>
                        <th scope="col" data-priority="3">JURUSAN</th>
                        <th scope="col" data-priority="4">NILAI</th>
                        <th scope="col">SYARAT</th>
                        <th width="16%" scope="col">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($dtDaftar as $rsDaftar){
                    ?>
                    <tr>
                        <td><a href="detail_daftar.php?id=<?= $rsDaftar["id_daftar"] ?>"><?= $rsDaftar["no_daftar"] ?></a></td>
                        <td><?= $rsDaftar["nm_daftar"] ?></td>
                        <td><?= $rsDaftar["nama_jurusan"] ?></td>
                        <td><?= $rsDaftar["nilai_daftar"] ?></td>
                        <td>
                            <?php 
                                if(isset($rsDaftar["syarat_daftar"])){ 
                            ?>
                                <a href="syarat/<?= $rsDaftar["syarat_daftar"] ?>" target="_blank" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i> LIHAT</a>
                            <?php 
                                } 
                            ?>
                        </td>
                        <td>
                            <?php if(@$rsDaftar["verified_daftar"]==0){ ?>
                            <div class="d-flex">
                                <a class="btn btn-success btn-sm" href="update_verifikasi_daftar.php?id=<?= $rsDaftar["id_daftar"] ?>&verifikasi=1" class="dropdown-item text-success" style="font-size: 14px;" title="Verifikasi"><i class="fas fa-check"></i> Verifikasi</a>
                                <a class="btn btn-danger btn-sm mx-2" href="update_status_daftar.php?id=<?= $rsDaftar["id_daftar"] ?>&status=2" class="dropdown-item text-danger" style="font-size: 14px;" title="Tolak"><i class="fas fa-times"></i> Tolak</a>
                            </div>
                            <?php } ?>
                        </td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- end main content -->
<?php include "footer.php"; ?>