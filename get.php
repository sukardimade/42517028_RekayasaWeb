<?php
header('Content-Type: application/json');
$servername = "localhost";
$username = "root";
$password = "abc123";
$dbname = "youtube";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT id_video, judul_video, jenis_video, jumlah_viewers, deskripsi, publish FROM video";
$result = $conn->query($sql);
$json = [];
$i = 1;
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
$json[$i] = [
'id_video' => $row["id_video"],
'judul_video' => $row["judul_video"],
'jenis_video' => $row["jenis_video"],
'jumlah_viewers' => $row["jumlah_viewers"],
'deskripsi' => $row["deskripsi"],
'publish' => $row["publish"]
];
$i = $i + 1;
}
} else {
echo "0 results";
}
$conn->close();
$data = ['data' => $json];
$tes  = json_encode($data,true);
print_r($tes)
?>