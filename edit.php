<?php

    require 'functions.php';
    if(isset($_POST['submit']))
    {


        if(edit($_POST)>0)
        {
            echo "
            <script>
                alert('data berhasil disimpan');
                document.location.href='index.php';
            </script>

            ";
        }else{
            echo "
            <script>
                alert('data gagal disimpan');
                document.location.href='tambah_data.php';
            </script>";
            echo "<br>";
            echo mysqli_error($conn);
        }
    }
    $id=$_GET["id"];
    //var_dump($id);

    //query berdasarkan id
    $spl=query("SELECT * FROM supplier WHERE id=$id")[0];
    //var_dump($spl[0]["Nama"]);
    //var_dump($spl);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update data</title>
</head>
<body>
    <h1>Update Data Supplier</h1>
    <form action="" method="post" >
        <li>
            <input type="hidden" name="id" value="<?= $spl["id"] ?>">
        </li>
        <ul>
            <li>
                <label for="Namatoko">Nama Toko :</label>
                <input type="text" name="Namatoko" id="Namatoko" value="<?= $spl["Namatoko"]; ?>" >
            </li>
            <li>
                <label for="Jenis">Jenis Barang :</label>
                <input type="text" name="Jenis" id="Jenis" required value="<?= $spl["Jenis"]; ?>" >
            </li>
            <li>
                <label for="Telepon">Telepon :</label>
                <input type="text" name="Telepon" id="Telepon" required value="<?= $spl["Telepon"]; ?>" >
            </li>
            <li>
                <label for="Alamat">Alamat :</label>
                <input type="text" name="Alamat" id="Alamat" required value="<?= $spl["Alamat"]; ?>" >
            </li>
            <li>
                <label for="Gambar">Gambar :</label>
                <input type="file" name="Gambar" id="Gambar" required value="<?= $spl["Gambar"]; ?>" >
            </li>
            <li>
                <button type="submit" name="submit"> Update </button>
            </li>
        </ul>
    </form>    
</body>
</html>