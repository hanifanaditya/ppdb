<?php include "header.php"; ?>
    <!-- main content -->
    <div class="main-content col-md-9 ms-auto">
        
        <!-- get data from tb_user -->
        <?php
            $user = new MUser();
            
            // mengambil data berdasarkan Id
            if(isset($_GET["id"])){
                $rsUser = $user->GetByID($_GET["id"])[0];
            }

            // cek parameter id
            $mode = isset($_GET["id"]) ? "edit" : "add";
        ?>
        <!-- end get data from tb_user -->

        <div class="title">
            <h2><?= ucwords($mode) ?> User</h2>
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
                <form action="action_user.php?ac=<?= $mode ?>" method="post">
                    <div class="mb-3">
                        <label for="nm_user" class="form-label fw-bold">Nama</label>
                        <input type="hidden" name="id_user" value="<?= @$rsUser["id_user"] ?>">
                        <input type="text" name="nm_user" id="nm_user" class="form-control" value="<?= @$rsUser["nm_user"] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="email_user" class="form-label fw-bold">Email</label>
                        <input type="email" name="email_user" id="email_user" class="form-control" value="<?= @$rsUser["email_user"] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="password_user" class="form-label fw-bold">Password</label>
                        <input type="password" name="password_user" id="password_user" class="form-control">
                        <input type="hidden" name="old_password" value="<?= @$rsUser["password_user"] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="level_user" class="form-label fw-bold">Level</label>
                        <select name="level_user" id="level_user" class="form-select">
                            <option <?= @$rsUser["level_user"] == "Admin" ? "selected" : "" ?> value="Admin">Admin</option>
                            <option <?= @$rsUser["level_user"] == "User" ? "selected" : "" ?> value="User">User</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label fw-bold">Status</label>
                        <select name="status" id="status" class="form-select">
                            <option <?= @$rsUser["status"] == 1 ? "selected" : "" ?> value="1">Aktif</option>
                            <option <?= @$rsUser["status"] == 0 ? "selected" : "" ?> value="0">Non Aktif</option>
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