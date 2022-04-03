<?php

//header hasil beebentuk json
header("Content-Type:application/json");

//tangkap metode akses
$method = $_SERVER['REQUEST_METHOD'];

//variabel hasil
$result = array();

if($method=='POST'){
    if(isset($_POST['umur']) AND isset($_POST['nama']) AND isset($_POST['alamat'])){


        //tangkap parameter
        $umur = $_POST['umur'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];

         //jika parameter  valid
            $result['status'] = [
                "code" => 200,
                "description" => "1 data inserted"
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
            $sql="INSERT INTO tbl_data (umur,nama,alamat)
                            VALUES('$umur','$nama', '$alamat')";


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