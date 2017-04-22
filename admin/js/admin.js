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
var submit = document.getElementById("submit");
submit.addEventListener("click",function(){
    var form = document.getElementById("form"), data={}, name, entry = document.getElementById("entry");
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
    data["entry"] = entry.innerHTML;
    ajax("post","func/save.php",data,true,function(a){console.log(a)},function(a){console.log(a)});
},false);
















