<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="EditDepartment.css">
    <title>Document</title>
</head>
<body>

<header>
        <div class="leftsection"><h2>Edit Department</h2></div>

        <div class="rightsection"><button id="backbutton"><img src="../BG/close_FILL0_wght400_GRAD0_opsz24.svg"></button></div>

    </header>
<?php
include("DepartmentDb.php");
$Department_Id = $_GET['Department_Id'];
$showdata = "select * from `department` where Department_Id=$Department_Id";
$result = mysqli_query($con,$showdata);
$row = mysqli_fetch_assoc($result);
$Name = $row['Department_Name'];



if(isset($_POST['Update'])){
    $Name = $_POST['Name'];
    $quer = "update `department` set Department_Name='$Name' where Department_Id=$Department_Id";
    $result = mysqli_query($con,$quer);
    if($result){
        header("location:../Department/Department.php");
    }
    else{
        die(mysqli_error($con));
    }
}
?>

<form method="post">
    <div class="container">
    <div class="fullnamelabel"><label for="FullName">Department</label></div>
    <div class="row1"><input type="text" placeholder="Department name" id="FullName" name="Name" value="<?php echo $Name; ?>" required></div>

    <div class="addbutton"><input type="submit" value="Update" id="Update" name="Update"></div>
    </div>
</form>

<script src="../Department/EditDepartment.js"></script>
</body>
</html>