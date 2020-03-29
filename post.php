<?php
	header("Content-Type:application/json");
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
	if($smethod == 'POST'){
		// tangkap input
		$id_channel = $_POST['id_channel'];
		$id_iklan = $_POST['id_iklan'];
		$judul_video = $_POST['judul_video'];
		$jenis_video = $_POST['jenis_video'];
		$jumlah_viewers = $_POST['jumlah_viewers'];
		$deskripsi = $_POST['deskripsi'];
		$publish = $_POST['publish'];

		// insert data
		$sql = "INSERT INTO video (
					id_channel,
					id_iklan,
					judul_video,
					jenis_video,
					jumlah_viewers,
					deskripsi,
					publish)
				VALUES (
					'$id_channel',
					'$id_iklan',
					'$judul_video',
					'$jenis_video',
					'$jumlah_viewers',
					'$deskripsi',
					'$publish')";
		$conn->query($sql);

		$result['status']['code'] = 200;
		$result['status']['description'] = "1 data inserted";
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