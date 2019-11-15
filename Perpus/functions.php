<?php
$conn = mysqli_connect("localhost","root","","coconut_web");

function query($query){
    global $conn;
    $result =mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result) ){
        $rows[] = $row; 
    }
    return $rows;
}

function tambah($data){
    global $conn;
    $judul = htmlspecialchars($data["judul"]);
    $pengarang = $data["pengarang"];
    $penerbit = $data["penerbit"];
    $harga = $data["harga"];

        $gambar = upload();
        if(!$gambar){
            return false;
        }

    $query = "INSERT INTO buku
    VALUES
    ('','$judul','$pengarang','$penerbit','$harga','$gambar')
";
mysqli_query($conn, $query);
return mysqli_affected_rows($conn);
}

function upload(){
    $namafile = $_FILES['gambar']['name'];
    $ukuranfile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpname = $_FILES['gambar']['tmp_name'];

    if($error === 4){
        echo "  <script>
        alert('pilih gambar terlebih dahulu');
    </script>";
    return false;
    }

    //cek gambar
    $ekstensigambarvalid =['jpg','jpeg','png'];
    $ekstensigambar = explode('.', $namafile);
    $ekstensigambar =strtolower(end($ekstensigambar));
    if(!in_array($ekstensigambar,$ekstensigambarvalid) ){
        echo "  <script>
        alert('Bukan Gambar');
    </script>";
    return false;
    }

    //ukuran
    if($ukuranfile >1000000){
        echo "  <script>
        alert('ukuran terlalu besar');
    </script>";
    return false;
    }

    // // cek nama
    // $namafilebaru = uniqid();
    // $namafilebaru .= '.';
    // $namafilebaru .= $ekstensigambar;

    //siap 
    move_uploaded_file($tmpname, 'img/'. $namafile);
    return $namafile;


}

function hapus($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM buku WHERE id =$id");
    return mysqli_affected_rows($conn);
}

function ubah($data){
    global $conn;

    $id = $data["id"];
    $judul = htmlspecialchars($data["judul"]);
    $pengarang = $data["pengarang"];
    $penerbit = $data["penerbit"];
    $harga = $data["harga"];
    $gambarlama = $data["gambarlama"];
    // cek
    if($_FILES['gambar']['error'] ===4){
        $gambar = $gambarlama;
    }else{
        $gambar = upload();
    }

    $gambar = $data["gambar"];

    $query = "UPDATE buku SET
            judul='$judul',
            pengarang='$pengarang',
            penerbit='$penerbit',
            harga='$harga',
            gambar='$gambar'
            WHERE id = $id
    ";
mysqli_query($conn, $query);
return mysqli_affected_rows($conn);
}

?>