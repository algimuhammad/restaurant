<?php 
include_once "../controllers/c_barang.php";
$barang = new c_barang();

if ($_GET["aksi"] == "tambah") {
    $id = $_POST["id"];
    $nama_barang = $_POST["nama_barang"];
    $qty = $_POST["qty"];
    $harga = $_POST["harga"];

    $bwolehh = array('png', 'jpg');
    $photo = $_FILES["photo"]["name"];

    $x = explode('.', $photo);

    $ekstensi = strtolower(end($x));

    $ukuran = $_FILES["photo"]["size"];

    $tmp = $_FILES["photo"]["tmp_name"];

    if (in_array($ekstensi, $bwolehh) == true) {
        if ($ukuran <= 1044070) {
            move_uploaded_file($tmp, '../assets/img/' . $photo);
            $barang->insert($id, $nama_barang, $qty, $harga, $photo);
            if ($barang) {
                echo "<script> alert('Data berhasil di tambahkan!');
                document.location.href = '../views/barang.php';
                </script>";
            }
        } else {
            echo "<script> alert('ukuran file terlalu besar')</script>";
        }
    }else {
        echo "<script> alert('Tolong masukan file dengan ekstensi (png / jpg)')</script>";
    }

} elseif ($_GET["aksi"] == "edit") {
    $id = $_POST["id"];
    $nama_barang = $_POST["nama_barang"];
    $qty = $_POST["qty"];
    $harga = $_POST["harga"];


    $bwolehh = array('png', 'jpg');
    $photo = $_FILES["photo"]["name"];

    $x = explode('.', $photo);

    $ekstensi = strtolower(end($x));

    $ukuran = $_FILES["photo"]["size"];

    $tmp = $_FILES["photo"]["tmp_name"];

    if (in_array($ekstensi, $bwolehh) == true) {
        if ($ukuran <= 1044070) {
            move_uploaded_file($tmp, '../assets/img/' . $photo);
            $barang->update($id, $nama_barang, $qty, $harga, $photo);
            if ($barang) {
                echo "<script> alert('Data berhasil di tambahkan!');
                document.location.href = '../views/barang.php';
                </script>";
            }
        } else {
            echo "<script> alert('ukuran file terlalu besar')</script>";
        }
    }else {
        echo "<script> alert('Tolong masukan file dengan ekstensi (png / jpg)')</script>";
    }
} elseif ($_GET["aksi"] == "delete") {
    $id = $_GET["id"];
    $barang->delete($id);
} elseif ($_GET["aksi"] == "laporan") {
    $barang->laporan();
}



?>