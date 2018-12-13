<?php
    session_start();
    if(!isset($_SESSION["login"]))
    {
        echo $_SESSION["login"];
        header("Location:login.php");
        exit;
    }
    require 'functions.php';
    $spl=query(" SELECT * FROM supplier");
    if(isset($_POST["cari"]))
    {
        $spl=cari($_POST["keyword"]);
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1> Daftar Supplier</h1>

    <a href="logout.php">Logout</a>
    <a href="tambah.php">Tambah Data Supplier</a>

    <form action="" method="post">
        <input type ="text" name="keyword" size="40" autofocus placeholder="Masukkan keyword pencarian" autocomplete="off">
        <button type ="submit" name=cari> cari </button>
    </form>
    <table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>No.</th>
        <th>Nama Toko</th>
        <th>Jenis Barang</th>
        <th>No Telepon</th>
        <th>Alamat</th>
        <th>Gambar</th>
        <th>Aksi</th>
    </tr>
    <?php $i=1 ?>
    <?php foreach($spl as $row):?>
    <tr>
        <td><?= $i; ?></td>
        <td><?= $row["Namatoko"]; ?></td>
        <td><?= $row["Jenis"]; ?></td>
        <td><?= $row["Telepon"]; ?></td>
        <td><?= $row["Alamat"]; ?></td>
        <td><img src="image/<?php echo $row["Gambar"]; ?>"alt="" height="100" width="100" srcset=""></td>
        <td>
            <a href="edit.php?id=<?php echo $row["id"];?>">Edit</a>
            <a href="hapus.php?id=<?php echo $row["id"];?>"onclick="return confirm('Apakah data ini akan dihapus')">Hapus</a>
    </tr>
    <?php $i++ ?>
    <?php endforeach;?>
    </table>
</body>
</html>
