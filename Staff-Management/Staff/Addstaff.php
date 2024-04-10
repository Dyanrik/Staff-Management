<?php
include("StaffDb.php");
$Name = "";
$Gender = "";
$Birthdate = "";
$Contact = "";
$Address = "";

if(isset($_POST['submit'])){
    $Department = $_POST['Department'];
    $Name = $_POST['Name'];
    $Gender = $_POST['Gender'];
    $Birthdate = $_POST['Birthdate'];
    $Contact = $_POST['Contact'];
    $Address = $_POST['Address'];

    $validate = mysqli_query($con, "select * from staffs where Staff_Fullname='$Name'");   
    if(mysqli_num_rows($validate) > 0){
        echo "<script>alert('This is Staff already exist')</script>";
    }
    else{
    mysqli_query($con, "INSERT INTO staffs(Department,Staff_Fullname,Staff_Gender,Staff_Birthdate,Staff_Contact,Staff_Address) values('$Department','$Name', '$Gender', '$Birthdate', '$Contact', '$Address')") or die("error occured");
    header("location:../Staff/Staff.php");
    }
}   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Addstaff.css">
    <title>Document</title>
</head>
<body>
    <header>
        <div class="leftsection"><h2>Add Staffs</h2></div>

        <div class="rightsection"><button id="backbutton"><img src="../BG/close_FILL0_wght400_GRAD0_opsz24.svg"></button></div>

    </header>
<form method="post">
    <div class="container">

    <div class="fullnamelabel"><label for="FullName">Fullname</label></div>
    <div class="row1"><input type="text" placeholder="Fullname..." id="FullName" name="Name" value="<?php echo $Name; ?>" autofocus required></div>

    <div class="gblabel">
        <div class="genderlabel"><label for="FullName">Gender</label></div>
        <div class="bdatelabel"><label for="FullName">Date of Birth</label></div></div>
    <div class="row2">
        <div class="gender-container">
            <select name="Gender" id="Gender" value="<?php echo $Gender; ?>" >
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            </select>
        </div>
        <div class="date-container"><input type="date" placeholder="Birthdate" id="Birthdate" name="Birthdate" value="<?php echo $Birthdate; ?>" required></div>
    </div>

    <div class="row5">
        <div class="department-container">
            <div class="genderlabel"><label for="FullName">Department</label></div>
            <select name="Department" id="Department" value="<?php echo $Department; ?>" >
                <?php
                    include("StaffDb.php");
                    $deps = mysqli_query($con, "SELECT * FROM department");
                    while($dep = mysqli_fetch_array($deps)){
                        ?>
                        <option value="<?php echo $dep['Department_Name'] ?>"><?php echo $dep['Department_Name'] ?></option>
                    <?php } ?>
                ?>
            </select>
        </div>
    </div>
    
    <div class="contactlabel"><label for="FullName">Contact</label></div>
    <div class="row3"><input type="number" placeholder="Contact..." id="Contact" name="Contact" value="<?php echo $Contact; ?>" maxlength="11" required></div>

    <div class="addresslabel"><label for="FullName">Address</label><label class="exp">bldg. No. / Street / Brgy. / Municipality|City / Province / Zip code</label></div>
    <div class="row4"><input type="text" placeholder="Address..." id="Address" name="Address" value="<?php echo $Address; ?>" ></div>

    <div class="addbutton"><input type="submit" value="Add Staffs" id="submit" name="submit"></div>
    </div>
</form>
<script src="../Staff/Addstaff.js"></script>
</body>
</html>