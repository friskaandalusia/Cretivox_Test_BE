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

        //tangkap foto
        $foto_tmp = $_FILES['profil_pict']['tmp_name'];
        $nama_foto = $_FILES['profil_pict']['name'];

        //tangkap dokumen
        $dokumen_tmp = $_FILES['dokumen']['tmp_name'];
        $nama_dokumen = $_FILES['dokumen']['name'];

        //pindahkan tmp ke lokasi permanen
        move_uploaded_file($foto_tmp,'foto/'.$nama_foto);
        move_uploaded_file($dokumen_tmp,'doc/'.$nama_dokumen);

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
            $sql="INSERT INTO tbl_data (umur,nama,alamat,profil_pict,dokumen)
                            VALUES('$umur','$nama', '$alamat','$nama_foto','$nama_dokumen')";


            //eksekusi query
            $conn->query($sql);

            //masukkan ke array result
            $result['results'] = [
                "umur" =>  $umur,
                "nama" => $nama,
                "alamat" => $alamat,
                "profil_pict" => $nama_foto,
                "dokumen" => $nama_dokumen
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