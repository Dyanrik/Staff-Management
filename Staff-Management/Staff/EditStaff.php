<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="EditStaff.css">
    <title>Document</title>
</head>
<body>

<header>
        <div class="leftsection"><h2>Edit Staffs</h2></div>

        <div class="rightsection"><button id="backbutton"><img src="../BG/close_FILL0_wght400_GRAD0_opsz24.svg"></button></div>

    </header>
<?php
include("StaffDb.php");
$Idnumber = $_GET['Idnumber'];
$showdata = "select * from `staffs` where Idnumber=$Idnumber";
$result = mysqli_query($con,$showdata);
$row = mysqli_fetch_assoc($result);
$Department = $row['Department'];
$Name = $row['Staff_Fullname'];
$Gender = $row['Staff_Gender'];
$Birthdate = $row['Staff_Birthdate'];
$Contact = $row['Staff_Contact'];
$Address = $row['Staff_Address'];


if(isset($_POST['Update'])){
    $Department = $_POST['Department'];
    $Name = $_POST['Name'];
    $Gender = $_POST['Gender'];
    $Birthdate = $_POST['Birthdate'];
    $Contact = $_POST['Contact'];
    $Address = $_POST['Address'];

    $quer = "update `staffs` set Idnumber='$Idnumber', Department='$Department', Staff_Fullname='$Name', Staff_Gender='$Gender', Staff_Birthdate='$Birthdate', Staff_Contact='$Contact', Staff_Address='$Address' where Idnumber=$Idnumber";
    $result = mysqli_query($con,$quer);
    if($result){
        header("location:../Staff/Staff.php");
    }
    else{
        die(mysqli_error($con));
    }
}
?>

<form method="post">
    <div class="container">
    <div class="fullnamelabel"><label for="FullName">Fullname</label></div>
    <div class="row1"><input type="text" placeholder="Full Name" id="FullName" name="Name" value="<?php echo $Name; ?>" required></div>

    <div class="gblabel">
        <div class="genderlabel"><label for="FullName">Gender</label></div>
        <div class="bdatelabel"><label for="FullName">Date of Birth</label></div></div>
    <div class="row2">
        <div class="gender-container">
        <select name="Gender" id="Gender">
            <option> <?php echo $Gender; ?> </option?>
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
    <div class="row4"><input type="text" placeholder="Address" id="Address" name="Address" value="<?php echo $Address; ?> "></div>

    <div class="addbutton"><input type="submit" value="Update" id="Update" name="Update"></div>
    </div>
</form>

<script src="../Staff/Editstaff.js"></script>
</body>
</html>