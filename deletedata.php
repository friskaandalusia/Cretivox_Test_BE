<?php

//header hasil beebentuk json
header("Content-Type:application/json");

//tangkap metode akses
$method = $_SERVER['REQUEST_METHOD'];

//variabel hasil
$result = array();

if($method=='DELETE'){

    parse_str(file_get_contents("php://input"), $_DELETE);
    //echo $_PUT['nama'];

//pengecekan parameter
    if(isset($_DELETE['id'])){


        //tangkap parameter
        $id = $_DELETE['id'];
        

         //jika parameter  valid
            $result['status'] = [
                "code" => 200,
                "description" => "1 data Deleted"
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
            $sql="DELETE FROM tbl_data WHERE id='$id'";


            //eksekusi query
            $conn->query($sql);

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