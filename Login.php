<?php  

if ($_SERVER['REQUEST_METHOD']=='POST') {

    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    require_once 'Koneksi.php';
    
    $select=mysqli_query($conn, "SELECT * FROM tbl_pegawai WHERE 
    username='$username' && password='$password' ");

    $data = mysqli_fetch_assoc($select);
    $num_rows = mysqli_num_rows($select);

    if($num_rows==1)
    {
        $data_username = $data['username'];
        $status= 'true' ;
        echo json_encode(array("response"=>$status,"username"=>$data_username));
    }
    else
    {
        $status = 'false' ;
        echo json_encode(array("response"=>$status));
    }

}

?>