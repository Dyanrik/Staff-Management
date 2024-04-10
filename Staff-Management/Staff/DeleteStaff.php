<?php
    include "StaffDb.php";
    if(isset($_GET['Idnumber'])){
        $Idnumber = $_GET['Idnumber'];
        $query = "delete from  `staffs` where Idnumber=$Idnumber";
        $con->query($query);
    }
    header("location:../Staff/Staff.php");
    exit;
?>