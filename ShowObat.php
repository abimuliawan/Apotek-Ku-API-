<?php
    if($_SERVER['REQUEST_METHOD'] == 'GET')
    {

       require_once 'Koneksi.php';
    
       $result=mysqli_query($conn, "SELECT * FROM tbl_obat");
       $response = array();

       while( $row = mysqli_fetch_assoc($result) ){

        array_push($response, 
        array(
                'ID_OBAT'           =>$row['ID_OBAT'], 
                'NAMA_OBAT'         =>$row['NAMA_OBAT'], 
                'MERK_OBAT'         =>$row['MERK_OBAT'],
                'KETERANGAN'        =>$row['KETERANGAN'],
                'HARGABELI_OBAT'    =>$row['HARGABELI_OBAT'],
                'HARGAJUAL_OBAT'    =>$row['HARGAJUAL_OBAT'],
                'STOK_OBAT'         =>$row['STOK_OBAT'],
                'GAMBAR_OBAT'       =>$row['GAMBAR_OBAT'],
                'KADALUARSA'        =>$row['KADALUARSA']) 
            );
        }
    
        echo json_encode($response);
    }
?>