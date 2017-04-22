//检查是否登陆
var checkLogin = function(cb){
    var arr = sessionStorage.getItem("login"), data;
    if(!arr){
        arr = localStorage.getItem("login");
    }
    if(arr){
        arr = JSON.parse(arr);
    }else{
        showInfo(0);
        cb && cb(0);
        return false;
    }
    data = {
        username:arr[0],
        password:arr[1]
    };
    ajax("post","/Sea/admin/func/validate.php",data,true,function(a){
        showInfo(a.responseText);
        cb && cb(a.responseText);
    });
};

//登陆则显示头像
var showInfo = function(a){
    var head_front = document.getElementById("head-front"),
        head_login = document.getElementById("head-login");
    if(a){
        head_front.classList.remove("none");
        head_front.setAttribute("href","/Sea/admin/index.php");
        head_login.innerHTML = "logout";
    }else{
        head_front.classList.add("none");
        head_login.innerHTML = "login";
        if(location.href.indexOf("login.php")<-1){
            location.href = "/Sea/category/login.php";
        }
    }
};

//进入页面检查是否登陆
checkLogin();

//登陆或退出登陆
var head_login = document.getElementById("head-login");
var login = function(){
    location.href = "/Sea/category/login.php";
};
var logout = function(){
    sessionStorage.removeItem("login");
    localStorage.removeItem("login");
    checkLogin(showInfo);
    location.href = "/Sea/category/login.php";
};
head_login.addEventListener("click",function(){
    var text = this.innerHTML;
    switch(text){
        case "login":login();
            break;
        case "logout":logout();
    }
},false);















