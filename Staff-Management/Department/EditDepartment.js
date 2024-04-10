var back = document.getElementById('backbutton');

function backPage(){
    window.location.assign('../Department/Department.php');
}
back.addEventListener('click', backPage)