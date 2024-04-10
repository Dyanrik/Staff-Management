var backbutton = document.getElementById('addbutton');
function back(){
    window.location.assign('../Dashboard/Dashboard.php');
}
backbutton.addEventListener('click', back);