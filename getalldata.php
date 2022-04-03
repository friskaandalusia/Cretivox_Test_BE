<?php

//header hasil beebentuk json
header("Content-Type:application/json");

//tangkap metode akses
$method = $_SERVER['REQUEST_METHOD'];

//variabel hasil
$result = array();

if($method=='GET'){
    //jika method valid
    $result['status'] = [
        "code" => 200,
        "description" => "Metode akses valid"
    ];

    //start koneksi DB
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cretivox_test";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    //End dari koneksi DB

    //buat query
    $sql="SELECT * FROM tbl_data";


    //eksekusi query
    $hasil_query=$conn->query($sql);

    //masukkan ke array result
    $result['results'] = $hasil_query->fetch_all(MYSQLI_ASSOC);

}else{
     //jika method tidak valid
     $result['status'] = [
        "code" => 400,
        "description" => "Metode akses tidak valid"
    ];

}

echo json_encode($result);

?>