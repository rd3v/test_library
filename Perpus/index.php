<?php
require 'functions.php';
$buku =query ("SELECT * FROM buku");
?>

<html>
    <head></head>
    <body>
        <h1>Daftar Buku</h1>

        <a href="tambah.php">Tambah Data</a>
        <br><br>

        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>No.</th>
                <th>Judul</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
                <th>Harga</th>
                <th>gambar</th>
                <th>Aksi</th>
            </tr>
            <?php $i =1 ;?>
            <?php foreach($buku as $row) :?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $row["judul"];?></td>
                <td><?= $row["pengarang"];?></td>
                <td><?= $row["penerbit"];?></td>
                <td><?= $row["harga"];?></td>
                <td><img src="img/<?= $row["gambar"];?>" width="50"></td>
                <td>
                <a href="ubah.php?id=<?=$row["id"];?>">Ubah</a>
                    <a href="hapus.php?id=<?=$row["id"];?>">Hapus</a>
                </td>
            </tr>
            <?php $i++; ?>
            <?php endforeach ;?>
            </table>
    </body>
</html>