<?php

//header hasil beebentuk json
header("Content-Type:application/json");

//tangkap metode akses
$method = $_SERVER['REQUEST_METHOD'];

//variabel hasil
$result = array();


if($method=='PUT'){

    parse_str(file_get_contents("php://input"), $_PUT);
    //echo $_PUT['nama'];

//pengecekan parameter
    if(isset($_PUT['umur']) AND isset($_PUT['nama']) AND isset($_PUT['alamat']) 
        AND isset($_PUT['id'])){


        //tangkap parameter
        $id = $_PUT['id'];
        $umur = $_PUT['umur'];
        $nama = $_PUT['nama'];
        $alamat = $_PUT['alamat'];
        

         //jika parameter  valid
            $result['status'] = [
                "code" => 200,
                "description" => "1 data Updated"
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
            $sql="UPDATE tbl_data SET umur='$umur', nama='$nama', alamat='$alamat' WHERE id='$id'";


            //eksekusi query
            $conn->query($sql);

            //masukkan ke array result
            $result['results'] = [
                "umur" =>  $umur,
                "nama" => $nama,
                "alamat" => $alamat
            ];

   
    }  

}else{
     //jika method tidak valid
     $result['status'] = [
        "code" => 400,
        "description" => "Metode akses tidak valid"
    ];
 }

echo json_encode($result);
?>