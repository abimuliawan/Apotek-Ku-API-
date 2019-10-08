<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        require_once 'Koneksi.php';

        $key = isset($_POST['key']) ? $_POST['key'] : 'empty';

        $kode_obat = isset($_POST['ID_OBAT']) ? $_POST['ID_OBAT'] : 'empty';
        $nama_obat = isset($_POST['NAMA_OBAT']) ? $_POST['NAMA_OBAT'] : 'empty';
        $merk_obat = isset($_POST['MERK_OBAT']) ? $_POST['MERK_OBAT'] : 'empty';
        $keterangan = isset($_POST['KETERANGAN']) ? $_POST['KETERANGAN'] : 'empty';
        $hargabeli_obat = isset($_POST['HARGABELI_OBAT']) ? $_POST['HARGABELI_OBAT'] : 'empty';
        $hargajual_obat = isset($_POST['HARGAJUAL_OBAT']) ? $_POST['HARGAJUAL_OBAT'] : 'empty';
        $stok_obat = isset($_POST['STOK_OBAT']) ? $_POST['STOK_OBAT'] : 'empty';
        $gambar_obat = isset($_POST['GAMBAR_OBAT']) ? $_POST['GAMBAR_OBAT'] : 'empty';
        $kadaluarsa = isset($_POST['KADALUARSA']) ? $_POST['KADALUARSA'] : 'empty';

        $ImagePath = "obat_image/$nama_obat.jpeg";
        $ServerURL = "/Apotek_API/$ImagePath";

        $query = "INSERT INTO tbl_obat(ID_OBAT, NAMA_OBAT, MERK_OBAT, KETERANGAN,
                                        HARGABELI_OBAT, HARGAJUAL_OBAT, STOK_OBAT,
                                        GAMBAR_OBAT, KADALUARSA)
                  VALUES('','$nama_obat', '$merk_obat', '$keterangan', '$hargabeli_obat',
                        $hargajual_obat, $stok_obat, '$ServerURL', '$kadaluarsa')";

        if(mysqli_query($conn, $query)){
    
            file_put_contents($ImagePath,base64_decode($gambar_obat));
            $response["value"] = "true";
            echo json_encode($response);
        }
    
        mysqli_close($conn);
    }
    else
    {
        echo "Please Try Again";
    }

        

    

?>
