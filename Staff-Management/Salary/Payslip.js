const printPayslip = document.getElementById("print");
function PrintDoc(){
        window.print();
}
printPayslip.addEventListener('click', PrintDoc)

const backPayslip = document.getElementById("back");
function backDoc(){
    window.location.assign("../Salary/Salary.php");
}
backPayslip.addEventListener('click', backDoc)