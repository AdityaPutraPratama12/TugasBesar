<?php

    $conn=mysqli_connect("localhost","root","","rakagigih");

    if(!$conn){
        die('Koneksi Error : '.mysqli_connect_errno()
        .' - '.mysqli_connect_error());
    }

    $result=mysqli_query($conn,"SELECT * FROM supplier");


    function query($query_kedua)
    {
        
        global $conn;
        $result=mysqli_query($conn,$query_kedua);

        $rows = [];
        while ( $row = mysqli_fetch_assoc($result)){
            $rows[]=$row;
        }
        return $rows;
    }

    function tambah ($data)
    {
        global $conn;

        $namatoko=htmlspecialchars($data["Namatoko"]);
        $jenis=htmlspecialchars($data["Jenis"]);
        $telepon=htmlspecialchars($data["Telepon"]);
        $alamat=htmlspecialchars($data["Alamat"]);

        $gambar=upload();
        if(!$gambar)
        {
            return false;
        }
        $query= " INSERT INTO supplier
                    VALUES
                    ('','$namatoko','$jenis','$telepon','$alamat','$gambar')";
        mysqli_query($conn,$query);

        return mysqli_affected_rows($conn);

    }

    function upload()
    {
        $nama_file      = $_FILES['Gambar']['name'];
        $ukuran_file    = $_FILES['Gambar']['size'];
        $error          = $_FILES['Gambar']['error'];
        $tmpfile        = $_FILES['Gambar']['tmp_name'];

        if($error===4)
        {

            echo "
                <script>
                    alert('Tidak ada gambar yang diupload');
                </script>
            ";
            return false;
        }
        
        $jenis_gambar=['jpg','jpeg','gif'];
        $pecah_gambar=explode('.',$nama_file);
        $pecah_gambar=strtolower(end($pecah_gambar));
        if(!in_array($pecah_gambar,$jenis_gambar))
        {
            echo "
               <script>
                    alert('Yang anda upload bukan file gambar');
                </script> 
                ";
                return false;
        }

        if($ukuran_file > 10000000)
        {
            echo "
                <script>
                    alert('Ukuran Gambar Terlalu Besar');
                </script>
            ";
            return false;
        }
        $namafilebaru=uniqid();
        $namafilebaru .= '.';
        $namafilebaru .=$pecah_gambar;
        move_uploaded_file($tmpfile, 'image/'.$namafilebaru);
        return $namafilebaru;
    }

    function hapus ($id){
        global $conn;
        mysqli_query($conn,"DELETE FROM supplier WHERE id=$id ");
        return mysqli_affected_rows($conn);
    }
    function edit ($data)
    {
        global $conn;
        $id=$data["id"];
        $namatoko=htmlspecialchars($data["Namatoko"]);
        $jenis=htmlspecialchars($data["Jenis"]);
        $telepon=htmlspecialchars($data["Telepon"]);
        $alamat=htmlspecialchars($data["Alamat"]);
        $gambar=htmlspecialchars($data["GambarLama"]);

        if($_FILES['Gambar'][error]===4)
        {
            $gambar=$GambarLama;
        }else
        {
            $gambar=upload();
        }

        $query= "UPDATE supplier SET
                    Namatoko= '$namatoko',
                    Jenis= '$jenis',
                    Telepon= '$telepon',
                    Alamat= '$alamat',
                    Gambar= '$gambar'
                    WHERE id= $id ";
        mysqli_query($conn,$query);

        return mysqli_affected_rows($conn);

    }
    function cari($keyword)
    {
        $sql="SELECT * from supplier
            WHERE
            Namatoko LIKE '%$keyword%' OR
            Jenis LIKE '%$keyword%' OR
            Telepon LIKE '%$keyword%' OR
            Alamat LIKE '%$keyword%'
            ";

        return query($sql);
    }

    function registrasi($data)
    {
        global $conn;

        $username=strtolower(stripcslashes($data['username']));
        $password=mysqli_real_escape_string($conn,$data['password']);
        $password2=mysqli_real_escape_string($conn,$data['password2']);

        $result=mysqli_query($conn,"SELECT username FROM user where username='$username'");

        if(mysqli_fetch_assoc($result))
        {
            echo "
                <script>
                    alert('username sudah ada');
                </script>
            ";
            return false;
        }
        if($password!==$password2)
        {
            echo"
            <script>
                alert('password anda tidak sama');
            </script>
            ";
            return false;
        }
        $password=md5($password);
        $password=password_hash($password,PASSWORD_DEFAULT);
        var_dump($password);
        mysqli_query($conn,"INSERT INTO user values('','$username','$password')");

        return mysqli_affected_rows($conn);
    }
?>