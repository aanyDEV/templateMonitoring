<?php
// Koneksi ke Database
include('configuration/conn.php');

?>
<?php 
    $query = mysqli_query($conn, "SELECT * FROM data ORDER BY id DESC LIMIT 1 ");
	while($row = mysqli_fetch_assoc($query)){
        $pressure1   = $row['pressure1'];
        $pressure2   = $row['pressure2'];
        $pressure3   = $row['pressure3'];
        $temp1   = $row['temp1'];
        $temp2   = $row['temp2'];
        $temp3   = $row['temp3'];
        $data = array(
            'pressure1' => $pressure1,
            'pressure2' => $pressure2,
            'pressure3' => $pressure3,
            'temp1' => $temp1,
            'temp2' => $temp2,
            'temp3' => $temp3,
        );
        echo json_encode($data);
    }
?>