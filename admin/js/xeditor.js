/**
 * Created by 孙海欣 on 2017/4/19.
 */
function bold(){
    document.execCommand("bold");
}

function italic(){
    document.execCommand("italic");
}

function underline(){
    document.execCommand("underline");
}

function strikeThrough(){
    document.execCommand("strikeThrough");
}

//光标所在位置不是包含在指定标签则创建，是则替换为 div
//endDom 为编辑框 DOM，tagName 为指定标签
function formatBlock(endDom,tagName){
    //
    var anchorNode = window.getSelection().anchorNode,
        tagDom = isOffspring(endDom,anchorNode,tagName);
    if(tagDom){ console.log("是")
        var index = getIndex(tagDom),
            dom = document.createElement("div"),
            tagParent = tagDom.parentNode;
        dom.innerHTML = tagDom.innerHTML;
        tagParent.removeChild(tagDom)
        if(!index){
            tagParent.appendChild(dom);
        }else{
            tagParent.insertBefore(dom,getChildren(tagParent)[index+1])
        }
    }else{ console.log("否")
        document.execCommand("formatBlock",false,"<" + tagName + ">");
    }
}

function bquote(){
    //
    document.execCommand("formatBlock",false,"<blockquote>");
}

function pre(){
    //
    document.execCommand("formatBlock",false,"<pre>");
}

function ul(){
    document.execCommand("insertUnorderedList");
}

function ol(){
    document.execCommand("insertOrderedList");
}

function link(){
    document.execCommand("createLink");
}

function insertImage(){
    document.execCommand("insertImage");
}

function removeFormat(){
    document.execCommand("removeFormat");
}


//selection‘s operation
function selection(){

}

function getCursorStart(){
    return window.getSelection().anchorOffset;
}

function getCursorEnd(){
    return window.getSelection().focusOffset;
}


//获取子元素节点
function getChildren(parent){
    var arr = [], childNodes = parent.childNodes;
    for(var i = 0, j = childNodes.length; i < j; i++){
        childNodes[i].nodeType == 1 && arr.push(childNodes[i]);
    }
    return arr;
}

//获取元素在兄弟元素中的索引
function getIndex(dom){
    var parent = dom.parentNode,
        arr = getChildren(parent);
    for(var i = 0,j = arr.length; i < j; i++){
        if(arr[i].isEqualNode(dom)){
            return i;
        }
    }
}

//判断元素是否为某 DOM 后代节点
function isOffspring(endDom,startDom,tagName){
    var p = startDom.parentNode;
    if(p.tagName == tagName){
        return p;
    }else{
        if(p.isEqualNode(endDom)){
            return false;
        }else{
            return arguments.callee(endDom,p);
        }
    }
}













