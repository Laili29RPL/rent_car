<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Data Pelanggan</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header bg-info">
                <h4 class="text-white">Form Pelanggan</h4>
            </div>

            <div class="card-body">
                <?php
                if(isset($_GET["id_pelanggan"])){
                    // memeriksa ketika load file ini,
                    // apakah membawa data GET dengan nama id_pelanggan
                    // jika ture, maka form pelanggan digunakan untuk edit

                    # mengakses data pelanggan dari id_pelanggan yg dikirim
                    include "connection-pelanggan.php";
                    $id_pelanggan = $_GET["id_pelanggan"];
                    $sql = "select * from pelanggan where id_pelanggan='$id_pelanggan'";
                    // eksekusiperintah SQL
                    $hasil = mysqli_query($connect, $sql);
                    # konversi hasil query ke bentuk array
                    $pelanggan = mysqli_fetch_array($hasil);
                    ?>
                    <form action="process-pelanggan.php" method="post"
                    onsubmit="return comfirm('Apakah anda yakin untuk mengubah data ini?')">
                    ID Pelanggan
                    <input type="text" name="id_pelanggan" 
                    class="form-control mb-2" required
                    value="<?=$pelanggan["id_pelanggan"];?>" readonly/>

                    Nama Pelanggan
                    <input type="text" name="nama_anggota" 
                    class="form-control mb-2" required
                    value="<?=$pelanggan["nama_anggota"];?>" />

                    Alamat Pelanggan
                    <input type="text" name="alamat" 
                    class="form-control mb-2" required
                    value="<?=$pelanggan["alamat"];?>" />

                    Nomor Telepon
                    <input type="number" name="telepon" 
                    class="form-control mb-2" required
                    value="<?=$pelanggan["telepon"];?>" />

                    <button type="submit" class="btn btn-success btn-block"
                    name="edit_anggota">
                        Simpan
                    </button>
                    </form>
                    <?php
                }else{
                    // jika false, maka form pelanggan digunakan untuk insert
                    ?>
                    <form action="process-pelanggan.php" method="post">
                    ID Pelanggan
                    <input type="text" name="id_pelanggan" 
                    class="form-control mb-2" required />

                    Nama Pelanggan
                    <input type="text" name="nama_anggota" 
                    class="form-control mb-2" required />

                    Alamat Pelanggan
                    <input type="text" name="alamat" 
                    class="form-control mb-2" required />

                    Nomor Telepon
                    <input type="text" name="telepon" 
                    class="form-control mb-2" required />

                    <button type="submit" class="btn btn-success btn-block"
                    name="simpan_anggota">
                        Simpan
                    </button>
                    </form>
                    <?php
                }
                ?>
                
            </div>
        </div>
    </div>
</body>
</html>