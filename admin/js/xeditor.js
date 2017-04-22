/**
 * Created by 孙海欣 on 2017/4/19.
 */
//编辑事件
var toolbar = document.getElementById("toolbar");
toolbar.addEventListener("click",function(e){
    var target = e.target, id;
    if(hasClass(target,"toolbar-block")){
        id = target.getElementsByTagName("span")[0].id;
    }else if(hasClass(target,"toolbar")){
        id = target.id;
    }
    id && runCmd(id)
},true);

function runCmd(eve,is){
    var a, b = false, c = null;
    switch(eve){
        case "qt-b":a = "bold";
            break;
        case "qt-i":a = "italic";
            break;
        case "qt-u":a = "underline";
            break;
        case "qt-del":a = "";
            break;
        case "qt-h":
            break;
        case "qt-bquote":
            break;
        case "qt-pre":
            break;
        case "qt-ul":a = "insertUnorderedList";
            break;
        case "qt-ol":a = "insertOrderedList";
            break;
        case "qt-link":
            if(is){
                a = "unline";
            }else{
                a = "createLink";
                b = true;
            }
            break;
        case "qt-img":
            break;
        case "qt-cf":
            break;
    }
    document.execCommand(a,b,c);
}
