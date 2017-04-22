//login focus
var username = document.getElementById("username");
var password = document.getElementById("password");
var addInpsColor = function(){
    var parent = this.parentNode.parentNode;
    parent.classList.add("change-border");
    parent.getElementsByTagName("label")[0].classList.add("change-color");
};
username.addEventListener("focus",addInpsColor,false);
password.addEventListener("focus",addInpsColor,false);
var removeInpsColor = function(){
    var parent = this.parentNode.parentNode;
    parent.classList.remove("change-border");
    parent.getElementsByTagName("label")[0].classList.remove("change-color");
};
username.addEventListener("blur",removeInpsColor,false);
password.addEventListener("blur",removeInpsColor,false);

//box-rememberme
var rememberme = document.getElementById("rememberme");
var box_remember_smallbox = document.getElementById("box-remember-smallbox");
box_remember_smallbox.addEventListener("click",function(){
    var checked = rememberme.checked;
    rememberme.checked = !checked;
},false);

//login ajax
var submit = document.getElementById("submit");
var message = document.getElementById("message");
var sendLogin = function(){
    var data = {};
    data["username"] = username.value;
    data["password"] = password.value;
    ajax("post","/Sea/admin/func/validate.php",data,true,function(a){
        switch(a.responseText){
            case "1":message.innerHTML = "*账号不存在";
                break;
            case "3":message.innerHTML = "*密码错误";
                break;
            default:message.innerHTML = "*登陆成功";
                saveLogin(a.responseText);
                location.href = "/Sea/admin/index.php";
        }
    },function(b){
        message.innerHTML = "* 登陆失败";
    });
};
submit.addEventListener("click",sendLogin,false);

//enter 键登陆
document.addEventListener("keyup",function(e){
    if(e.keyCode == 13){
        if(location.href.indexOf("login.php") > -1){
            submit.click();
        }
    }
});

//保存登陆结果
var saveLogin = function(a){
    sessionStorage.setItem("login",a);
    if(rememberme.checked){
        localStorage.setItem("login",a);
    }
};






