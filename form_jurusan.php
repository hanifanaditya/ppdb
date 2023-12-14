<?php include "header.php"; ?>
    <!-- main content -->
    <div class="main-content col-md-9 ms-auto">
        
        <!-- get data from tb_user -->
        <?php
            $jurusan = new MJurusan();
            
            // mengambil data berdasarkan Id
            if(isset($_GET["id"])){
                $rsJurusan = $jurusan->GetByID($_GET["id"])[0];
            }

            // cek parameter id
            $mode = isset($_GET["id"]) ? "edit" : "add";
        ?>
        <!-- end get data from tb_user -->

        <div class="title">
            <h2><?= ucwords($mode) ?> Jurusan</h2>
        </div>

        <!-- message -->
        <?php if(isset($_GET["pesan"])){ ?>
            <div class="alert alert-info" role="alert">
                <?= $_GET["pesan"] ?>
            </div>
        <?php } ?>
        <!-- end message -->

        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="action_jurusan.php?ac=<?= $mode ?>" method="post">
                    <div class="mb-3">
                        <label for="nama_jurusan" class="form-label fw-bold">Nama Jurusan</label>
                        <input type="hidden" name="id_jurusan" value="<?= @$rsJurusan["id_jurusan"] ?>">
                        <input type="text" name="nama_jurusan" id="nama_jurusan" class="form-control" value="<?= @$rsJurusan["nama_jurusan"] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="pagu_jurusan" class="form-label fw-bold">Pagu Jurusan</label>
                        <input type="number" name="pagu_jurusan" id="pagu_jurusan" class="form-control" value="<?= @$rsJurusan["pagu_jurusan"] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="status_jurusan" class="form-label fw-bold">Status</label>
                        <select name="status_jurusan" id="status_jurusan" class="form-select">
                            <option <?= @$rsUser["status_jurusan"] == 1 ? "selected" : "" ?> value="1">Aktif</option>
                            <option <?= @$rsUser["status_jurusan"] == 0 ? "selected" : "" ?> value="0">Non Aktif</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <input type="submit" value="SIMPAN" class="btn btn-danger">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end main content -->
<?php include "footer.php"; ?>