<?php
include_once("config.php");

$result = mysqli_query($mysqli, "SELECT * FROM karyawan ORDER BY id DESC");


$today = new DateTime('today');
$y = $today->diff($tgl_lahir)->y;
?>

<html>
<head>    
    <title>Homepage</title>
</head>

<body>
<a href="add.php">Add New Karyawan</a><br/><br/>

    <table width='80%' border=1>

    <tr>
        <th>No</th> 
        <th>Nama</th> 
        <th>Hari</th> 
        <th>Bulan</th>
        <th>Tahun</th>
        <th>Zodiak</th>
        <th>Usia</th>
    </tr>
    <?php  
    $no = 1;
    while($data = mysqli_fetch_array($result)) { 

        $tgl_lahir = date('Y-m-d', strtotime($data['tgl_lahir']));
        $hari = substr($tgl_lahir, 8);
        $bulan = substr($tgl_lahir, 5, 2);
        $tahun = substr($tgl_lahir, 0, 4);

        $today = new DateTime('today');
        $y = $today->diff($tgl_lahir)->y;

        echo "<tr>";
        echo "<td>".$no."</td>";
        echo "<td>".$hari."</td>";
        echo "<td>".$bulan."</td>";    
        echo "<td>".$tahun."</td>";    
        echo "<td>".$data['zodiak']."</td>";    
        echo "<td>".$y."</td>";    

        $no++;       
    }
    ?>
    </table>
</body>
</html>