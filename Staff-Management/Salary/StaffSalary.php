<?php
include("SalaryDb.php");
$Idnumber = $_GET['Idnumber'];
$showdata = "select * from `staffs` where Idnumber=$Idnumber";
$result = mysqli_query($con,$showdata);
$row = mysqli_fetch_assoc($result);
$Staffname = $row['Staff_Fullname'];
$Departmentt = $row['Department'];


include("SalaryDb.php");
$rslt = "select Payslip_Code from `payslip`";
$resul = mysqli_query($con,$rslt);
$row = mysqli_fetch_assoc($resul);
$Payslip_Codee = $row['Payslip_Code'];

if(isset($_POST['save'])){
    $Payslip_Code = $_POST['payrollcode'];
    $PeriodStartDate = $_POST['startat'];
    $WorkDays = $_POST['workdays'];
    $BasePay = $_POST['basicpay'];
    $IncentivePay = $_POST['incentivepay'];
    $StaffName = $_POST['Staffname'];
    $Department = $_POST['department'];
    $GovernmentTax = $_POST['governmenttax'];

    mysqli_query($con, "INSERT INTO payslip(PeriodStartDate,WorkDays,BasePay,IncentivePay,StaffName,Department,GovernmentTax) values('$PeriodStartDate','$WorkDays', '$BasePay', '$IncentivePay', '$StaffName', '$Department','$GovernmentTax')") or die("error occured");
    header("location:../Salary/test.php");
}   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="StaffSalary.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
    <header class="header1">
        <div class="leftsection"><h2>Create Payslip</h2></div>
        <div class="rightsection"><button id="addbutton"><img src="../BG/close_FILL0_wght400_GRAD0_opsz24.svg"></button></div>
    </header>
        <div class="form-container">
            <form method="post" name="myForm" onsubmit="return validateForm()" required>
                <div class="payslipheader">


                    <div class="payrollcode">
                        <input type="hidden" name="payrollcode" value="<?php echo $Payslip_Codee?>" readonly>
                    </div>
                    
                    <div class="staffname">
                        <label>Staff name</label> <br>
                        <input type="text" name="Staffname" value="<?php echo $Staffname?>" readonly>
                    </div>          
                    <div class="department">
                        <label>Department</label> <br>
                        <input type="text" name="department" value="<?php echo $Departmentt?>" readonly>
                    </div> 
                    
                    <div class="startat">
                        <label>Period Start Date</label> <br>
                        <input type="date" name="startat" id="startat" autofocus required>
                    </div>
                    <div class="workdays">
                        <label>Work Days</label> <br>
                        <input type="number" required placeholder="Days" id="workdays" name="workdays" autofocus>
                    </div>
                    
                    <div class="basicpay">
                        <input type="hidden" name="basicpay" value="965" readonly>
                    </div>          
                    <div class="incentivepay">
                        <input type="hidden" name="incentivepay" value="1000" readonly>
                    </div>

                    <div class="hide"></div>     

                    <div class="governmenttax">
                        <input type="hidden" name="governmenttax" value="995" readonly>
                    </div>
            </form>
            <div class="save">
                        <input type="submit" name="save" id="save" value="Save">
                    </div>
                </div>
        </div>
    </div>

<footer>
   <p> &#169; jhonric eugenio gorillo</p>
</footer>

<script src="../Salary/StaffSalary.js"></script>
</body>
</html>