var backbutton = document.getElementById('backbutton');
function backPage(){
    window.location.assign('../Staff/Staff.php');
}
backbutton.addEventListener('click', backPage)