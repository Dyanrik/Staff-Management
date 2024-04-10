<?php
    include "LeaveDb.php";
    if(isset($_GET['Leave_Id'])){
        
        $Leave_Id = $_GET['Leave_Id'];
        $query = "UPDATE staff_leaves_status SET Status = 'deny.svg' WHERE Leave2_Id = '$Leave_Id'";
        $result = mysqli_query($con, $query);
        $Leave_Id = $_GET['Leave_Id'];
        $query = "delete from  `staff_leaves` where Leave_Id=$Leave_Id";
        $con->query($query);
        
        echo "<script>alert('Leave Request has been Approved')</script>";
        header("location:../Leaves/LeaveAction.php");
    }
?>