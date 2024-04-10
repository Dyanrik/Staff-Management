<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="Staff.css">

    <title>Staff</title>
</head>
<?php
    if(isset($_GET['page-nr'])){
        $PageId = $_GET['page-nr'];
    }else{
        $PageId = 1;
    }
?>
<body id="<?php echo $PageId ?>">
        <div class="container">
        <header>
            <div class="leftsection"><h2>Manage Staffs</h2></div>

            <div class="middlesection">
                <form action="Staff.php" >
                    <input class="searchinput" type="search" placeholder="Search Staff..." name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search'];} ?>">
                </form>
            </div>

            <div class="rightsection"><button id="addbutton"><img src="../BG/close_FILL0_wght400_GRAD0_opsz24.svg"></button></div>

        </header>
        <div class="outer-table-container">
            <div class="table-container">
                <table id="table">
                <?php
                require_once("StaffDb.php");
                if(isset($_GET['search'])){

                    if(empty($_GET['search'])){
                        header("location:../Staff/Staff.php");
                    }

                    else{
                        
                    $Filter = $_GET['search'];
                    $query = "SELECT * FROM staffs WHERE CONCAT(Idnumber,Department,Staff_Fullname, Staff_Gender, Staff_Birthdate, Staff_Contact, Staff_Address) LIKE '%$Filter%'";
                    $query_run = mysqli_query($con, $query);

                    if(mysqli_num_rows($query_run) > 0){
                        ?>
                        <tr>
                        <th>#</th>
                        <th>DEPARTMENT</th>
                        <th>FULL NAME</th>
                        <th>GENDER</th>
                        <th>BIRTHDATE</th>
                        <th>CONTACT</th>
                        <th>ADDRESS</th>
                        <th></th>
                    </tr>
                        <?php
                        foreach($query_run as $row){
                            
                            ?>
                            
                            <tr>
                                <td><?php echo $row['Idnumber']?></td>
                                <td><?php echo $row['Department']?></td>
                                <td><?php echo $row['Staff_Fullname']?></td>
                                <td><?php echo $row['Staff_Gender']?></td>
                                <td><?php echo $row['Staff_Birthdate']?></td>
                                <td><?php echo $row['Staff_Contact']?></td>
                                <td><?php echo $row['Staff_Address']?></td>
                                <td class="action">
                                    <a href="EditStaff.php?Idnumber=<?php echo $row['Idnumber']?>"><img src="../BG/person_edit_FILL0_wght400_GRAD0_opsz24.svg"></a>
                                    <a href="DeleteStaff.php?Idnumber=<?php echo $row['Idnumber']?>" onclick='return checkdelete()' ><img src="../BG/delete_forever_FILL0_wght400_GRAD0_opsz24.svg"></a>
                                </td>
                            </tr>
                            <?php
                        }

                    }
                    else{
                        ?>
                        <?php
                            echo "<script>alert('No Staff found')</script>";
                        ?>
                        <?php
                    }
                }
                }

                ?>
                <?php
                $onset = 0;
                $rows_per_page = 10;
                $records = $con->query("SELECT * FROM staffs");
                $num_of_rows = $records->num_rows;
                $pages = ceil($num_of_rows / $rows_per_page);
                if(isset($_GET['page-nr'])){
                    $page = $_GET['page-nr'] - 1;
                    $onset = $page * $rows_per_page;
                }

                
                require_once("StaffDb.php");
                $query = "SELECT * FROM staffs ORDER BY `Idnumber` DESC LIMIT $onset, $rows_per_page ";
                $result = mysqli_query($con,$query);
                ?>
                    <tr>
                        <th>#</th>
                        <th>DEPARTMENT</th>
                        <th>FULL NAME</th>
                        <th>GENDER</th>
                        <th>BIRTHDATE</th>
                        <th>CONTACT</th>
                        <th>ADDRESS</th>
                        <th></th>
                    </tr>
                    <tr>
                    <?php
                        while($row = mysqli_fetch_assoc($result))
                        {
                            ?>
                        <tr>
                            <td><?php echo $row['Idnumber']?></td>
                            <td><?php echo $row['Department']?></td>
                            <td><?php echo $row['Staff_Fullname']?></td>
                            <td><?php echo $row['Staff_Gender']?></td>
                            <td><?php echo $row['Staff_Birthdate']?></td>
                            <td><?php echo $row['Staff_Contact']?></td>
                            <td><?php echo $row['Staff_Address']?></td>
                            <td class="action">
                                <a class="action" href="EditStaff.php?Idnumber=<?php echo $row['Idnumber']?>"><img src="../BG/person_edit_FILL0_wght400_GRAD0_opsz24.svg"></a>
                                <a class="action" href="DeleteStaff.php?Idnumber=<?php echo $row['Idnumber']?>" onclick='return checkdelete()' ><img src="../BG/delete_forever_FILL0_wght400_GRAD0_opsz24.svg"></a>
                            </td>
                        </tr>
                            <?php
                        }
                    ?>
                </table>
            </div>
                    <div class="pagination-container">
                    <div class="rightsectionn"><button id="addbuttonn"><img src="../BG/add_FILL0_wght400_GRAD0_opsz24.svg"></button></div>
                        <div class="page-info">
                            <?php
                                if(!isset($_GET['page-nr'])){
                                    $page = 1;
                                }else{
                                    $page = $_GET['page-nr'];
                                }
                            ?>
                            <?php echo $page ?> of <?php echo $pages ?>
                        </div>
                        <div class="pagination">
                            <a href="?page-nr=1"><img src="../BG/first_page_FILL0_wght400_GRAD0_opsz24.svg"></a>

                            <?php
                                if(isset($_GET['page-nr']) && $_GET['page-nr'] > 1){
                                    ?>
                                        <a href="?page-nr=<?php echo $_GET['page-nr'] - 1 ?> "><img src="../BG/navigate_before_FILL0_wght400_GRAD0_opsz24.svg"></a>
                                    <?php
                                }else{
                                    ?>
                                        <a><img src="../BG/navigate_before_FILL0_wght400_GRAD0_opsz24.svg"></a>
                                    <?php
                                }
                            ?>
                            
                                <div class="page-number">
                                    <?php
                                        for($counter = 1; $counter <= $pages; $counter++){
                                            ?>
                                                <a class="counter" href="?page-nr=<?php echo $counter ?>"><?php echo $counter ?></a>
                                            <?php
                                        }
                                    ?>

                                </div>

                                <?php
                                if(!isset($_GET['page-nr'])){
                                    ?>
                                        <a href="?page-nr=2"><img src="../BG/navigate_next_FILL0_wght400_GRAD0_opsz24.svg"></a>
                                    <?php
                                }else{
                                    if($_GET['page-nr'] >= $pages){
                                        ?>
                                            <a><img src="../BG/navigate_next_FILL0_wght400_GRAD0_opsz24.svg"></a>
                                        <?php
                                    }else{
                                        ?>
                                            <a href="?page-nr=<?php echo $_GET['page-nr'] + 1 ?> "><img src="../BG/navigate_next_FILL0_wght400_GRAD0_opsz24.svg"></a>
                                        <?php
                                    }
                                }
                            ?>

                            <a href="?page-nr=<?php echo $pages ?>"><img src="../BG/last_page_FILL0_wght400_GRAD0_opsz24.svg"></a>
                        </div>
                    </div>
            </div>
        </div>
    

<footer>
   <p> &#169; jhonric eugenio gorillo</p>
</footer>

   <script src="../Staff/Staff.js"></script>



</body>
</html>