var backbutton = document.getElementById('addbutton');
function backPage(){
    window.location.assign('../Salary/Salary.php');
}
backbutton.addEventListener('click', backPage)


function validateForm() {
    var startatinput = document.forms["myForm"]["startat"].value;
    var workdaysinput = document.forms["myForm"]["workdays"].value;
    if (startatinput == "" || workdaysinput == "") {
      return false;
    }
    else{
        window.location.assign("Payslip.php");
    }
  }