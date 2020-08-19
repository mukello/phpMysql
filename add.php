<html>
<head>
    <title>Add Karyawan</title>
</head>

<body>
    <a href="index.php">Go to Home</a>
    <br/><br/>

    <form action="add.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr> 
                <td>Nama Lengkap</td>
                <td><input type="text" name="name"></td>
            </tr>
            <tr> 
                <td>Tanggal Lahir</td>
                <td><input type="date" name="tgl_lahir"></td>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>

    <?php

    if(isset($_POST['Submit'])) {
        include_once("config.php");

        $name = $_POST['name'];
        $tgl_lahir = date('Y-m-d', strtotime($_POST['tgl_lahir']));
        $hari = substr($tgl_lahir, 8);
        $bulan = substr($tgl_lahir, 5, 2);
        $tahun = substr($tgl_lahir, 0, 4);

        $today = new DateTime('today');
        $y = $today->diff($tgl_lahir)->y;

        if(($bulan==1 && $hari>=20)||($bulan==2 && $hari<19)){
        $zodiak = "Aquarius";
        }
        if(($bulan==2 && $hari>=19 )||($bulan==3 && $hari<21)){
        $zodiak = "Pisces";
        }
        if(($bulan==3 && $hari>=21)||($bulan==4 && $hari<20)){
        $zodiak = "Aries";
        }
        if(($bulan==4 && $hari>=20)||($bulan==5 && $hari<21)){
        $zodiak = "Taurus";
        }
        if(($bulan==5 && $hari>=21)||($bulan==6 && $hari<22)){
        $zodiak = "Gemini";
        }
        if(($bulan==6 && $hari>=21)||($bulan==7 && $hari<23)){
        $zodiak = "Cancer";
        }
        if(($bulan==7 && $hari>=23)||($bulan==8 && $hari<23)){
        $zodiak = "Leo";
        }
        if(($bulan==8 && $hari>=23)||($bulan==9 && $hari<23)){
        $zodiak = "Virgo";
        }
        if(($bulan==9 && $hari>=23)||($bulan==10 && $hari<24)){
        $zodiak = "Libra";
        }
        if(($bulan==10 && $hari>=24)||($bulan==11 && $hari<23)){
        $zodiak = "Scorpio";
        }
        if(($bulan==11 && $hari>=23)||($bulan==12 && $hari<22)){
        $zodiak = "Sagittarius";
        }
        if(($bulan==12 && $hari>=22)||($bulan==1 && $hari<20)){
        $zodiak = "Capricorn";
        }


        $result = mysqli_query($mysqli, "INSERT INTO karyawan(nama,hari,bulan,tahun,zodiak,usia) VALUES('$name','$hari','$bulan','$tahun', '$zodiak', '$y')");

        echo "Karyawan added successfully. <a href='index.php'>View Karyawan</a>";
    }
    ?>
</body>
</html>