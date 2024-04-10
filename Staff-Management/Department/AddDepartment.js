var backbutton = document.getElementById('backbutton');
function backPage(){
    window.location.assign('../Department/Department.php');
}
backbutton.addEventListener('click', backPage)