
<?php
// Koneksi ke Database
include('configuration/conn.php');

?>
<?php
$data_p1 = "";
$data_p2 = "";
$data_p3 = "";
$data_w = "";

$query = mysqli_query($conn, " (SELECT * FROM data ORDER BY id DESC LIMIT 10) ORDER BY id ASC ");
while ($row = mysqli_fetch_assoc($query)) {

    $data_w .= $row['waktu'] . ",";
    $data_p1 .= $row['pressure1'] . ",";
    $data_p2 .= $row['pressure2'] . ",";
    $data_p3 .= $row['pressure3'] . ",";
}
echo json_encode(array(
    'waktu' => substr($data_w, 0, -1),
    'pressure1' => substr($data_p1, 0, -1),
    'pressure2' => substr($data_p2, 0, -1),
    'pressure3' => substr($data_p3, 0, -1)
));
?>

    
    
