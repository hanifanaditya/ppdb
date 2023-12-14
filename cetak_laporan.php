<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        .logo{
            width: 100px;
        }

        h1,h2,h3,h4,h5,h6{
            padding: 0;
            margin: 0;
        }
    </style>
</head>
<body>
     <!-- get data from tb_daftar -->
     <?php
        include "libs/inc.php";
        $id_jurusan = $_POST["id_jurusan"];
        $daftar = new MDaftar();
        $sql = "SELECT d.*,j.nama_jurusan FROM tb_daftar as d INNER JOIN tb_jurusan as j ON d.id_jurusan = j.id_jurusan WHERE d.id_jurusan=$id_jurusan AND d.verified_daftar = 1";
        $dtDaftar = $daftar->select($sql);
    ?>
    <!-- end get data from tb_daftar -->

    <!-- kop laporan -->
    <table class="w-100">
        <tr>
            <td>
                <img src="assets/images/logo.png" class="logo" alt="">
            </td>
            <td class="text-center">
                <h4>PEMERINTAH PROVINSI JAWA TIMUR</h4>
                <h4>DINAS PENDIDIKAN</h4>
                <h1>SMK MARYNOLL</h1>
                <p>JL Tidak Diketahui No 89 , Kota Madiun</p>
            </td>
        </tr>
    </table>

    <!-- tampilkan data pendaftar -->
    <table class="dtTable table-bordered" width="100%">
        <thead class="bg-danger text-light">
            <tr>
                <th>NO DAFTAR</th>
                <th>NAMA</th>
                <th>JURUSAN</th>
                <th>SEKOLAH</th>
                <th>NILAI</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if(count($dtDaftar)>0){
                foreach($dtDaftar as $rsDaftar){
            ?>
            <tr>
                <td><?= $rsDaftar["no_daftar"] ?></td>
                <td><?= $rsDaftar["nm_daftar"] ?></td>
                <td><?= $rsDaftar["nama_jurusan"] ?></td>
                <td><?= $rsDaftar["asal_sekolah_daftar"] ?></td>
                <td><?= $rsDaftar["nilai_daftar"] ?></td>
            </tr>
            <?php
                }
            } else {
            ?>
            <tr>
                <td colspan="5" class="text-center"> Data Tidak Ada</td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <!-- end data pendaftaran -->
</body>
</html>