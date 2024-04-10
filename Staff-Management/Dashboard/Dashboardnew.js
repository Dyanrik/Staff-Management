document.querySelector("#change").addEventListener("click", function(){
    document.querySelector(".popup").style.display = "block";
});
document.querySelector("#closepopup").addEventListener("click", function(){
    document.querySelector(".popup").style.display = "none";
});

let imagefile = document.getElementById("photo");
let inputfile = document.getElementById("image");
inputfile.onchange = function(){
    imagefile.src = URL.createObjectURL(inputfile.files[0]);
    return true;
}

var logout = document.getElementById("logout-button");
function Logout(){
    var a = confirm("Are you sure want to Log Out?")
    if(a==true){
    window.location.assign("../Login-page/Login.php");
    }
    
}
logout.addEventListener('click', Logout)

var logoutt = document.getElementById("logout-buttonn");
function Logoutt(){
    var a = confirm("Are you sure want to Log Out?")
    if(a==true){
    window.location.assign("../Login-page/Login.php");
    }
    
}
logoutt.addEventListener('click', Logoutt)

var morebtn = document.getElementById("leave-more-button");
function leavePage(){
    window.location.assign("../Leaves/LeaveAction.php")
}
morebtn.addEventListener('click', leavePage)

var dmb = document.getElementById("department-more-button");
function DMB(){
    window.location.assign("../Department/DepartmentView.php");
}
dmb.addEventListener('click', DMB)

var smb = document.getElementById("staff-more-button");
function SMB(){
    window.location.assign("../Staff/StaffView.php");
}
smb.addEventListener('click', SMB)