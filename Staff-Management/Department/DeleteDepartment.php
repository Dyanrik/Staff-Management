<?php
    include "DepartmentDb.php";
    if(isset($_GET['Department_Id'])){
        $Department_Id = $_GET['Department_Id'];
        $query = "delete from  `department` where Department_Id=$Department_Id";
        $con->query($query);
    }
    header("location:../Department/Department.php");
    exit;
?>