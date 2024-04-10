<?php

include("SalaryDb.php");


$rslt = "select * from `payslip` order by Payslip_Code desc";
$resul = mysqli_query($con,$rslt);
$row = mysqli_fetch_assoc($resul);

$Payslip_Code = $row['Payslip_Code'];
$PeriodStartDate = $row['PeriodStartDate'];
$WorkDays = $row['WorkDays'];
$BasePay = $row['BasePay'];
$IncentivePay = $row['IncentivePay'];
$StaffName = $row['StaffName'];
$Department = $row['Department'];
$GovernmentTax = $row['GovernmentTax'];

//Operations//
$totalearning = $WorkDays * $BasePay + $IncentivePay;
$netpay = $totalearning - $GovernmentTax;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Payslip.css">
    <title>Payslip</title>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <header class="paysliptitle">
                <p>
                    <span>PAYSLIP</span> <br>
                    <span>JEGKSS Inc.</span> <br>
                    <span>Denissa Bldg, Banzon St, </span> <br>
                    <span>Balanga, Bataan</span>
                </p>
            </header>
            <form action="" method="post" required>
                <div class="details">

                    <div class="payrollcode">
                        <label for="payrollcode">Pay roll Code:</label>
                            <input type="number" name="payrollcode" placeholder="Code" id="payrollcode" value="<?php echo $Payslip_Code; ?>" readonly>
                    </div>

                    <div class="startat">
                        <label for="startat">Start at:</label>
                            <input type="date" name="startat" id="startat" value="<?php echo $PeriodStartDate; ?>" readonly>
                    </div>

                    <div class="workdays">
                        <label for="workdays">Work days:</label>
                            <input type="number" name="workdays" placeholder="Days" id="workdays" value="<?php echo $WorkDays; ?>" readonly>
                    </div>

                    <div class="staffname">
                        <label for="staffname">Staff name:</label>
                            <input type="text" name="staffname" placeholder="Fullname" id="staffname" value="<?php echo $StaffName; ?>" readonly>
                    </div>

                    <div class="department">
                        <label for="department">Department:</label>
                            <input type="text" name="department" placeholder="Deparment" id="department" value="<?php echo $Department; ?>" readonly>
                    </div>

                    <div class="hide"></div>

                    <div class="payslipdetail">
                        <table>
                            <tr>
                                <th>Earnings</th>
                                <th>Amount</th>
                                <th>Deductions</th>
                                <th>Amount</th>
                            </tr>
                            <tr>
                                <td>Basic pay</td>
                                <td><?php echo $BasePay?></td>
                                <td>Government tax</td>
                                <td><?php echo $GovernmentTax ?></td>
                            </tr>
                            <tr>
                                <td>Incentive pay</td>
                                <td><?php echo $IncentivePay ?></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr class="totals">
                                <td class="td">Total Earnings</td>
                                <td class="td2"><?php echo $totalearning?></td>
                                <td class="td3">Total Deductions</td>
                                <td class="td4"><?php echo $GovernmentTax?></td>
                            </tr>
                            <tr class="totals">
                                <td></td>
                                <td></td>
                                <td>Net Pay</td>
                                <td class="td4"><?php echo $netpay ?></td>
                            </tr>
                        </table>
                    </div>

                    <div class="totalsalry">
                        <h1><?php echo $netpay ?></h1>
                    </div>

                </div>
            </form>
            <div class="buttons">
                    <input type="submit" name="print" id="print" value="Print">
                    <input type="hidden" name="send" id="send" value="Send">
                    <input type="submit" name="back" id="back" value="Back">
                </div>
             </div>
        </div>
    </div>

<script src="../Salary/Payslip.js"></script>
</body>
</html>