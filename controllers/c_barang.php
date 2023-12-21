<?php 
include_once "c_koneksi.php";
class c_barang {
    public function insert($id, $nama_barang, $qty, $harga, $photo) {
        $conn = new c_koneksi();
        $query = "INSERT INTO barang VALUES ('$id', '$nama_barang', '$qty', '$harga', '$photo')";
        $data = mysqli_query($conn->conn(), $query);
    }

    public function read () {
        $conn = new c_koneksi();
        $query = "SELECT * FROM barang";
        $data = mysqli_query($conn->conn(), $query);
        while ($row = mysqli_fetch_object($data)) {
            $rows[] = $row;
        }
        // hapus barisan di bawah ini (step 6)
        return $rows;
    }

    public function edit($id)
    {
        $conn = new c_koneksi();

        // perintah mengambil data dari barng berdasarkan id
        $query = "SELECT * FROM barang WHERE id = $id";
        $data = mysqli_query($conn->conn(), $query);
        while ($row = mysqli_fetch_object($data)) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function update($id, $nama_barang, $qty, $harga, $photo)
    {
        $conn = new c_koneksi();
        // perintah untuk update data dari barang 
        $query = "UPDATE barang SET nama_barang='$nama_barang', qty='$qty', harga='$harga', photo='$photo' WHERE id = $id";
        $data = mysqli_query($conn->conn(), $query);
    }

    public function delete($id)
    {
        $conn = new c_koneksi();

        // perintah untuk menghapus data dari barang berdasarkan id
        $query = "DELETE FROM barang WHERE id = $id";
        $data = mysqli_query($conn->conn(), $query);

        header("Location: ../views/barang.php");
    }

}

?>