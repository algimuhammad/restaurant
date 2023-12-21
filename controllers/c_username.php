<?php 

include "c_koneksi.php";

class c_username{
    public $nama,
    $email,
    $password;

    public function read($id) {
        $conn = new c_koneksi();
        $query = "SELECT * FROM user WHERE id = $id";
        $data = mysqli_query($conn->conn(), $query);
        while($row = mysqli_fetch_object($data)) {
            $rows[] = $row;
        }
        return $rows;
    }
}




?>