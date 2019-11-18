<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        require_once 'Koneksi.php';

        $key = isset($_POST['key']) ? $_POST['key'] : 'empty';

        $kode_obat = isset($_POST['id_obat']) ? $_POST['id_obat'] : 'empty';
        $stok_baru = isset($_POST['jumlah_tambah']) ? $_POST['jumlah_tambah'] : 0;  

        //Ambil data stok lama
        $data_stok_lama=mysqli_query($conn, "SELECT stok_obat FROM tbl_obat WHERE id_obat=$kode_obat");
        $row_data_stok=$data_stok_lama->fetch_assoc();
        $stok_lama = (int) $row_data_stok['stok_obat'];

        $query_update = "UPDATE tbl_obat SET stok_obat=$stok_baru+$stok_lama WHERE id_obat= $kode_obat";

        if(mysqli_query($conn,$query_update)){

            $response["value"] = "true";
            echo json_encode($response);
        }
        else
        {
            $response["value"] = "false";
            echo json_encode($response);
        }
    
        mysqli_close($conn);
    }
    else
    {
        echo "Please Try Again";
    } 

?>
