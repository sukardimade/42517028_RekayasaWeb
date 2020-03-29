<?php
	// header harus json
	header("Content-Type:application/json");

	// conf koneksi db
	$servername = "localhost";
    $username = "root";
    $password = "abc123";
    $dbname = "youtube";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

	// tangkap method request
	$smethod = $_SERVER['REQUEST_METHOD'];

	// inisialisasi variable hasil
	$result = array();

	// kondisi metode
	parse_str(file_get_contents('php://input'),$_PUT);
	if($smethod == 'PUT'){
		// tangkap input
		$id_channel = $_PUT['id_channel'];
		$id_iklan = $_PUT['id_iklan'];
		$judul_video = $_PUT['judul_video'];
		$jenis_video = $_PUT['jenis_video'];
		$jumlah_viewers = $_PUT['jumlah_viewers'];
		$deskripsi = $_PUT['deskripsi'];
		$publish = $_PUT['publish'];


		// insert data
		$sql = "UPDATE video SET
					id_channel = '$id_channel',
					id_iklan = '$id_iklan',
					judul_video = '$judul_video',
					jenis_video = '$jenis_video',
					jumlah_viewers = '$jumlah_viewers',
					deskripsi = '$deskripsi',
					publish = '$publish'
				WHERE id_channel = '$id_channel'";
		$conn->query($sql);

		$result['status']['code'] = 200;
		$result['status']['description'] = "1 data updated";
		$result['result'] = array(
			"id_channel"=>$id_channel,
			"id_iklan"=>$id_iklan,
			"judul_video"=>$judul_video,
			"jenis_video"=>$jenis_video,
			"jumlah_viewers"=>$jumlah_viewers,
			"deskripsi"=>$deskripsi,
			"publish"=>$publish);

	}else{
		$result['status']['code'] = 400;
	}

	// parse ke format json
	echo json_encode($result);
?>
