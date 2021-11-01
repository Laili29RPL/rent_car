<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pelanggan</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <!-- card header -->
            <div class="card-header bg-info">
                <h4 class="text-white">Data Pelanggan</h4>
            </div>
            <!-- card body -->
            <div class="card-body">
                <!--kotak pencarian data pelanggan-->
                <form action="list-pelanggan.php" method="get">
                    <input type="text" name="search"
                    class="form-control mb-2"
                    placeholder="Masukkan Keyword Pencarian"
                    required />
                </form>
                <ul class="list-group">
                    <?php
                    include("connection-pelanggan.php");
                    if (isset($_GET["search"])) {
                        # jika pada saat load halaman ini,
                        # akan mengecek apakah ada data dengan method
                        # GET yg bernama "search"
                        $search = $_GET["search"];
                        $sql = "select*from pelanggan
                        where pelanggan like '%$search%'
                        or nama_pelanggan like '%$search%'
                        or alamat like '%$search%' ";
                    } else {
                        $sql = "select * from pelanggan";
                    }
                   
                    //eksekusi perintah SQL
                    $query = mysqli_query($connect, $sql);
                    while ($pelanggan = mysqli_fetch_array($query)) {?>
                        <li class="list-group-item">
                        <div class="row">
                            <!-- bagian data pelanggan -->
                            <div class="col-lg-8 col-md-10">
                                <h5>Nama Pelanggan: <?php echo $pelanggan["nama_pelanggan"];?></h5>
                                <h6>Alamat: <?php echo $pelanggan["alamat"];?></h6>
                                <h6>Telepon: <?php echo $pelanggan["telepon"];?></h6>
                                <h6>ID Pelanggan: <?php echo $pelanggan["pelanggan"];?></h6>
                            </div>

                            <!-- bagian tombol pilihan -->
                            <div class="col-lg-4 col-md-2">
                                <a href="form-pelanggan.php?pelanggan=<?php echo $pelanggan["pelanggan"];?>"> 
                                    <button class="btn btn-block btn-primary">
                                        Edit
                                    </button>
                                </a>
                                <div class="card-footer">
                                    <a href="delete.php?pelanggan=<?=$pelanggan["pelanggan"]?>"
                                    onClick="return confirm('Apakah Anda Yakin?')">
                                </div>
                                <button class="btn btn-block btn-danger" >
                                    Hapus
                                </button>
                                </a>
                            </div>
                        </div>
                    </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>

            <div class="card-footer">
                <a href="form-pelanggan.php"> 
                    <button class="btn btn-success">
                        Tambah Data Pelanggan
                    </button>
                </a>
            </div>
            <!-- card footer -->
        </div>
    </div>
</body>
</html>