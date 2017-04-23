/* back-end */
var i,j,inp,arr=[];

//aside hover列表
var list = document.getElementById("list");
list.addEventListener("mouseenter",function(e){
    var target = e.target, tagname = target.tagName, el;
    switch(tagname){
        case "A":el = target.parentNode;
            break;
        case "LI":el = target;
            break;
    }
    el && (el.id != "empty") && el.classList.add("hoverSub");
},true);

list.addEventListener("mouseleave",function(e){
    var target = e.target, tagname = target.tagName, el;
    switch(tagname){
        case "A":el = target.parentNode;
            break;
        case "LI":el = target;
            break;
    }
    el && (el.id != "empty") && el.classList.remove("hoverSub");
},true);


//ajax 发送
var submit = document.getElementById("submit"),
    entry = document.getElementById("entry");
submit.addEventListener("click",function(){
    var form = document.getElementById("form"), data={}, name;
    arr = [];
    inp = form.getElementsByTagName("input");
    j = inp.length;
    for(i=0;i<j;i++){
        name = inp[i].name;
        switch(name){
            case "set-category":
                inp[i].checked && (arr.push(inp[i].value));
                break;
            default:
                data[name] = inp[i].value;
        }
    }
    data["set-category"] = arr;
    data["entry"] = entry.innerHTML;console.log(data)
    //ajax("post","func/save.php",data,true,function(a){console.log(a)},function(a){console.log(a)});
},false);

//编辑事件
var toolbar = document.getElementById("toolbar");
toolbar.addEventListener("click",function(e){
    var target = e.target, id;
    if(hasClass(target,"toolbar-block")){
        id = target.getElementsByTagName("button")[0].id;
    }else if(hasClass(target,"toolbar")){
        id = target.id;
    }
    id && runCmd(id)
},true);

function runCmd(eve){
    switch(eve){
        case "qt-b":bold();
            break;
        case "qt-i":italic();
            break;
        case "qt-u":underline();
            break;
        case "qt-del":strikeThrough();
            break;
        case "qt-h":formatBlock(entry,"H4");
            break;
        case "qt-bquote":formatBlock();
            break;
        case "qt-pre":formatBlock();
            break;
        case "qt-ul":ul();
            break;
        case "qt-ol":ol();
            break;
        case "qt-link":link();
            break;
        case "qt-img":insertImage();
            break;
        case "qt-cf":removeFormat();
            break;
    }
}


//scrollTop > 145，toolbar固定
document.addEventListener("scroll",function(){
    var top = document.body.scrollTop;
    if(top >= 170){
        toolbar.style.position = "absolute";
        toolbar.style.top = top - 145 - 32 + "px";
        toolbar.style.backgroundColor = "#fff";
    }else{
        toolbar.style.position = "";
        toolbar.style.top = "0";
        toolbar.style.backgroundColor = "";
    }
},false);









