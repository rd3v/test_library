<?php
require 'functions.php';

$id = $_GET["id"];
$row = query("SELECT * FROM buku WHERE id = $id")[0];

if( isset($_POST["submit"]) ){

    if(ubah($_POST) > 0){
        echo "
            <script>
                alert('berhasil');
                document.location.href='index.php';
            </script>
        ";
    }else{
        echo "  <script>
        alert('berhasil');
        document.location.href='index.php';
    </script>";
        echo "<br>";
        echo mysqli_error($conn);
    }
}
?>

<html>
    <head></head>
    <body>
        <h1>ubah Data</h1>
        <form action="" method="POST" enctype="multipart/form-data"> 
            <input type="hidden" name="id" value="<?=$row["id"];?>">
            <input type="hidden" name="gambarlama" value="<?=$row["gambar"];?>">
            <ul>
                <li>                    
            <label for="judul">Judul</label>
             <input type="text" name="judul" id="judul" value="<?=$row["judul"];?>">
                </li>
                <li>
             <label for="judul">pengarang</label>
             <input type="text" name="pengarang" id="pengarang" value="<?=$row["pengarang"];?>">
                </li>
                <li>
             <label for="judul">penerbit</label>
             <input type="text" name="penerbit" id="penerbit"value="<?=$row["penerbit"];?>">
             </li>
             <li>
             <label for="judul">harga</label>
             <input type="text" name="harga" id="harga" value="<?=$row["harga"];?>">
             </li>
             <li>
             <label for="gambar">gambar</label> <br>
             <img src="img/<?= $row["gambar"];?>" width="50"><br>
             <input type="file" name="gambar">
             </li>
             <li>
                 <button type="submit" name="submit">Ubah Data </button>
             </li>
            
                
            </ul>
        </form>
    </body>
</html>