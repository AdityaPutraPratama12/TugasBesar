<?php

    $conn=mysqli_connect("localhost","root","","rakagigih");


    if(isset($_POST['submit']))
    {
        $namatoko=$_POST["Namatoko"];
        $jenis=$_POST["Jenis"];
        $telepon=$_POST["Telepon"];
        $alamat=$_POST["Alamat"];
        $gambar=$_POST["Gambar"];

        $query=" INSERT INTO supplier
                VALUES
                ('','$namatoko','$jenis','$telepon','$alamat','$gambar')";
        mysqli_query($conn,$query);






        if(mysqli_affected_rows($conn)>0){
            echo"data berhasil disimpan";
        }
        else{
            echo"gagal";
            echo"<br>";
            echo mysqli_error($conn);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Data</title>
</head>
<body>
    <h1>Tambah Data Supplier</h1>
    <form action="" method="post" enctype="multipart/from-data">
        <ul>
            <li>
                <label for="Namatoko">Nama Toko</label>
                <input type="text" name="Namatoko" id="Namatoko" required>
            </li>
            <li>
                <label for="Jenis">Jenis Barang</label>
                <input type="text" name="Jenis" id="Jenis" required>
            </li>
            <li>
                <label for="Telepon">No Telepon</label>
                <input type="text" name="Telepon" id="Telepon" required>
            </li>
            <li>
                <label for="Alamat">Alamat</label>
                <input type="text" name="Alamat" id="Alamat" required>
            </li>
            <li>
                <label for="Gambar">Gambar</label>
                <input type="file" name="Gambar" id="Gambar" required>
            </li>
            <li>
                <button type="submit" name="submit">Tambah</button>
            </li>
        </ul>
    </form>
</body>
</html>