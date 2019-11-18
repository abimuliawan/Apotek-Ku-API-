<?php
    if($_SERVER['REQUEST_METHOD'] == 'GET')
    {

       require_once 'Koneksi.php';
    
       $result=mysqli_query($conn, "SELECT * FROM tbl_obat");
       $response = array();
        
       while( $row = mysqli_fetch_assoc($result) ){

        array_push($response, 
        array(
                'ID_OBAT'           =>$row['id_obat'], 
                'NAMA_OBAT'         =>$row['nama_obat'], 
                'MERK_OBAT'         =>$row['merk_obat'],
                'KETERANGAN'        =>$row['keterangan'],
                'HARGABELI_OBAT'    =>$row['hargabeli_obat'],
                'HARGAJUAL_OBAT'    =>$row['hargajual_obat'],
                'STOK_OBAT'         =>$row['stok_obat'],
                'GAMBAR_OBAT'       =>$row['gambar_obat'],
                'KADALUARSA'        =>$row['kadaluarsa']) 
            );
        }
    
        echo json_encode($response);
    }
?>