<?php
require 'functions.php';
if( isset($_POST["submit"]) ){

    if(tambah($_POST) > 0){
        echo "
            <script>
                alert('berhasil');
                document.location.href='index.php';
            </script>
        ";
    }else{
        echo "  <script>
        alert('gagal');
        document.location.href='tambah.php';
    </script>";
        echo "<br>";
        echo mysqli_error($conn);
    }
}
?>

<html>
    <head></head>
    <body>
        <h1>Tambah Data</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?=$row["id"];?>">
            <ul>
                <li>                    
            <label for="">Judul</label>
             <input type="text" name="judul" id="judul">
                </li>
                <li>
             <label for="">pengarang</label>
             <input type="text" name="pengarang" id="pengarang">
                </li>
                <li>
             <label for="">penerbit</label>
             <input type="text" name="penerbit" id="penerbit">
             </li>
             <li>
             <label for="">harga</label>
             <input type="text" name="harga" id="harga">
             </li>
             <li>
             <label for="">gambar</label>
             <input type="file" name="gambar" id="gambar">
             </li>
            <li>
                <button type="submit" name="submit">Tambah</button>
            </li>
                
            </ul>
        </form>
    </body>
</html>