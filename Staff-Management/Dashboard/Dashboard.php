<?php
    include ("ProfilePicturesDb.php");
    $get = "SELECT * FROM staff_leaves";
    $total = mysqli_query($con, $get);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="Dashboard.css">

    <title>Dashboard</title>
</head>
<body>
    <div class="popup" id="popup">
        <div class="popupconatainer">

<form method="post" enctype="multipart/form-data">

<?php 
    include ("ProfilePicturesDb.php");
    if(isset($_POST['setphoto'])){

        $profilepic = $_FILES['image']['name'];
        $target = '../Dashboard/Profile_Images/' . $profilepic;

        $Filename = $_FILES['image']['name'];
        $Filetmp = $_FILES['image']['tmp_name'];
        $sql = "update `profile_photo` set Image='$Filename'";
        if($Filename == ""){
            echo "<script>
                    alert('Select Photo')
                    document.querySelector('.popup').style.display = 'block';
                </script>";
        }
        else{
            $result = mysqli_query($con, $sql);
            move_uploaded_file($_FILES['image']['tmp_name'], $target);
        }
    }
?>
            <div class="closebtn">
                <a href="#" id="closepopup" name="closepopup"><img src="../BG/close_FILL0_wght400_GRAD0_opsz24.svg"></a>
            </div>
            <?php
            $result = mysqli_query($con, "select * from profile_photo");
            while($row = mysqli_fetch_assoc($result)){
            ?>
            <label for="image">
            <img src="../Dashboard/Profile_Images/<?php echo $row['Image'] ?>" id="photo" />
            </label>
            <?php } ?>

            <input type="file" name="image" accept="image/jpeg, image/png, image/jpg" id="image" class="form-control">

            <div class="sumbitbtn">
                <label for="setphoto">Set Photo</label>
                <input type="submit" id="setphoto" name="setphoto">
            </div>
</form>

        </div>
    </div>

    <input type="checkbox" id="checkbox">

    <div class="container">
        <nav>
            <label class="logo">STAFF MANAGEMENT</label>
            <button class="logout-buttonn" id="logout-buttonn" name="logout-logout-buttonn"><img src="../BG/logout_FILL0_wght400_GRAD0_opsz24.svg"></button>
            <button class="logout-button" id="logout-button" name="logout-button">Log Out</button>
        </nav>

        
        <div class="sidebar">
            <div class="sidebar-header">
                <label for="checkbox">
                    <span class="material-symbols-outlined">
                        <img src="../BG/menu_FILL0_wght400_GRAD0_opsz24.svg">
                        </span>
                </label>


                <div class="profile">

                    <?php
                        $result = mysqli_query($con, "select * from profile_photo");
                        while($row = mysqli_fetch_assoc($result)){
                        ?>
                        <label for="image">
                        <img src="../Dashboard/Profile_Images/<?php echo $row['Image'] ?>" id="profile-picture"/>
                        </label>
                    <?php } ?>

                    <div class="change-picture"><a href="#" id="change" name="change" ><img src="../BG/edit_FILL0_wght400_GRAD0_opsz24.svg" alt=""></a></div>
                    <div class="online-badge"></div>
                </div>
                <div class="user-name">
                    <?php
                    session_start();
                    echo $_SESSION['Username'];
                    ?>
                </div>
                
            </div>

            <ul>
                <li class="dashboard-button"><a href="#">Dashboard</a></li>
                <li class="department"><a href="../Department/Department.php">Department</a></li>
                <li class="staff"><a href="../Staff/Staff.php">Staff</a></li>
                <li class="leave"><a href="../Leaves/Leave.php">Leave</a></li>
                <li class="salary"><a href="../Salary/Salary.php">Salary</a></li>
            </ul>
        </div>

            <div class="content1">
                <div class="departmentt">
                    <div class="departmentt-header">
                    <div class="notifcount">1</div>
                    <h3>DEPARTMENT</h3></div>
                    <div class="departmentt-icon"><img src="../BG/domain_FILL0_wght400_GRAD0_opsz24.svg"></div>
                    <div class="department-more-button"><button class="more-button" id="department-more-button">More Info</button></div>
                </div>
            </div>
            <div class="content2">
                <div class="staff">
                    <div class="departmentt-header">
                    <div class="notifcount">1</div>
                    <h3>STAFF</h3></div>
                    <div class="departmentt-icon"><img src="../BG/groups_FILL0_wght400_GRAD0_opsz24.svg"></div>
                    <div class="department-more-button"><button class="more-button" id="staff-more-button">More Info</button></div>
                </div>
            </div>
            <div class="content3">
                <div class="leave">
                    <div class="departmentt-header">
                    <div class="notifcount" id="notifcount">
                        <?php 

                        if($ttl = mysqli_num_rows($total)){
                            echo $ttl;
                        }
                        else{
                            echo "<script>document.getElementById('notifcount').style.visibility = 'Hidden';</script>";
                        }
                        
                        ?>
                    </div>
                    <h3>LEAVE</h3></div>
                    <div class="departmentt-icon"><img src="../BG/move_item_FILL0_wght400_GRAD0_opsz24.svg"></div>
                    <div class="department-more-button">
                        <button class="more-button" id="leave-more-button">More Info</button>
                    </div>
                </div>
            </div>
            <div class="content4">
                <div class="salary">
                    <div class="departmentt-header">
                    <div class="notifcount">1</div>
                    <h3>SALARY</h3></div>
                    <div class="departmentt-icon"><img src="../BG/payments_FILL0_wght400_GRAD0_opsz24.svg"></div>
                    <div class="department-more-button"><button class="more-button" id="more-button">More Info</button></div>
                </div>
            </div>
            
        
            <footer>
                <p> &#169; jhonric eugenio gorillo</p>
            </footer>
    </div>
 <script src="Dashboardnew.js"></script>
</body>
</html>