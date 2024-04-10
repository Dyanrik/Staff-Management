var addbutton = document.getElementById('addbutton');
function backPage(){
        window.location.assign('../Dashboard/Dashboard.php');
}
addbutton.addEventListener('click', backPage)

var addbuttonn = document.getElementById('addbuttonn');
function addStaff(){
            window.location.assign('../Staff/AddStaff.php');
}
addbuttonn.addEventListener('click', addStaff)

function checkdelete(){
    return confirm('Delete this Staff?');
}

let links = document.querySelectorAll('.page-number > a');
let bodyid = parseInt(document.body.id);
links[bodyid].classList.add("active");