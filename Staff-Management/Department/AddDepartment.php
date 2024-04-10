<?php
include("DepartmentDb.php");
$Name = "";


if(isset($_POST['submit'])){
    $Name = $_POST['Name'];

    $validate = mysqli_query($con, "select * from department where Department_Name='$Name'");   
    if(mysqli_num_rows($validate) > 0){
        echo "<script>alert('This Department is already exist')</script>";
    }
    else{
    mysqli_query($con, "INSERT INTO department (Department_Name) values('$Name')") or die("error occured");
    header("location:../Department/Department.php");
    mysqli_query($con, "INSERT INTO staff_leaves_status(Staff_Fullname,Staff_Contact,Staff_Date_Requested,Staff_Requested_Date,Staff_Reason,Status) SELECT Staff_Fullname,Staff_Contact,Staff_Date_Requested,Staff_Requested_Date,Staff_Reason,Status FROM staff_leaves");

    }
}   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="AddDepartment.css">
    <title>Add Department</title>
</head>
<body>
    <header>
        <div class="leftsection"><h2>Add Department</h2></div>

        <div class="rightsection"><button id="backbutton"><img src="../BG/close_FILL0_wght400_GRAD0_opsz24.svg"></button></div>

    </header>
<form method="post">
    <div class="container">

    <div class="fullnamelabel"><label for="FullName">Department</label></div>
    <div class="row1"><input type="text" placeholder="Department..." id="Department" name="Name" value="<?php echo $Name; ?>" required></div>

    <div class="addbutton"><input type="submit" value="Add Department" id="submit" name="submit"></div>
    </div>
</form>
<script src="../Department/AddDepartment.js"></script>
</body>
</html>