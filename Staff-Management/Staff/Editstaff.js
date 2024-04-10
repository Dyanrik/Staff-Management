var back = document.getElementById('backbutton');

function backPage(){
    window.location.assign('../Staff/Staff.php');
}
back.addEventListener('click', backPage)