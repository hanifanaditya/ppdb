<?php include "header.php"; ?>
    <!-- main content -->
    <div class="main-content col-md-9 ms-auto">
        <div class="title">
            <h2>Data User</h2>
        </div>

        <!-- get data from tb_user -->
        <?php
            $user = new MUser();
            $dtUser = $user->All();
        ?>
        <!-- end get data from tb_user -->

        <!-- message -->
        <?php if(isset($_GET["pesan"])){ ?>
            <div class="alert alert-info" role="alert">
                <?= $_GET["pesan"] ?>
            </div>
        <?php } ?>
        <!-- end message -->

        <a href="form_user.php" class="btn btn-danger btn-sm mb-3"><i class="fas fa-plus"></i> ADD NEW</a>

        <div class="table-responsive">
            <table class="dt-Table table table-bordered" width="100%">
                <thead class="bg-danger text-light">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">NAMA</th>
                        <th scope="col">EMAIL</th>
                        <th scope="col">ROLE</th>
                        <th scope="col">STATUS</th>
                        <th scope="col">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($dtUser as $rsUser){
                    ?>
                    <tr>
                        <td><?= $rsUser["id_user"] ?></td>
                        <td><?= $rsUser["nm_user"] ?></td>
                        <td><?= $rsUser["email_user"] ?></td>
                        <td><?= $rsUser["level_user"] ?></td>
                        <td>
                            <?php if($rsUser["status"]==1){ ?>
                                <span class="badge bg-success">Aktif</span>
                            <?php } else { ?>
                                <span class="badge bg-success">Non Aktif</span>
                                <?php } ?>
                        </td>
                        <td>
                            <a href="form_user.php?id=<?= $rsUser["id_user"] ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                            <a href="action_user.php?id=<?= $rsUser["id_user"] ?>&ac=delete" class="btn btn-danger btn-sm"><i class="fas fa-times"></i></a>
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