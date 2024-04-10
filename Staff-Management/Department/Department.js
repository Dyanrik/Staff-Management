var addbutton = document.getElementById('addbutton');
function backPage(){
        window.location.assign('../Dashboard/Dashboard.php');
}
addbutton.addEventListener('click', backPage)

var addbuttonn = document.getElementById('addbuttonn');
function addStaff(){
        window.location.assign('../Department/AddDepartment.php');
}
addbuttonn.addEventListener('click', addStaff)

function checkdelete(){
    return confirm('Are you?');
}
