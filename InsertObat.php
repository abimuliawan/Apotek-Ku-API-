<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        require_once 'Koneksi.php';

        $key = isset($_POST['key']) ? $_POST['key'] : 'empty';

        $kode_obat = isset($_POST['id_obat']) ? $_POST['id_obat'] : 'empty';
        $nama_obat = isset($_POST['nama_obat']) ? $_POST['nama_obat'] : 'empty';
        $merk_obat = isset($_POST['merk_obat']) ? $_POST['merk_obat'] : 'empty';
        $keterangan = isset($_POST['keterangan']) ? $_POST['keterangan'] : 'empty';
        $kode_barcode = isset($_POST['kode_barcode']) ? $_POST['kode_barcode'] : 'empty';
        $hargabeli_obat = isset($_POST['hargabeli_obat']) ? $_POST['hargabeli_obat'] : 'empty';
        $hargajual_obat = isset($_POST['hargajual_obat']) ? $_POST['hargajual_obat'] : 'empty';
        $stok_obat = isset($_POST['stok_obat']) ? $_POST['stok_obat'] : 'empty';
        $gambar_obat = isset($_POST['gambar_obat']) ? $_POST['gambar_obat'] : 'empty';
        $kadaluarsa = isset($_POST['kadaluarsa']) ? $_POST['kadaluarsa'] : 'empty';

        $ImagePath = "obat_image/$nama_obat.jpeg";
        $ServerURL = "/Apotek_API/$ImagePath";

        $query = "INSERT INTO tbl_obat(id_obat, nama_obat, merk_obat, keterangan, kode_barcode,
                                        hargabeli_obat, hargajual_obat, stok_obat,
                                        gambar_obat, kadaluarsa)
                  VALUES('','$nama_obat', '$merk_obat', '$keterangan', '$kode_barcode', '$hargabeli_obat',
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
