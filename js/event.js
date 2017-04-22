/*js 库
* */
var i=0, j=0, arr=[];
function DOM(a){
    this.Element = a;
}

DOM.prototype.id = function(a){
    if(typeof a == "string"){
        a = a.slice(1);
        this.Element = document.getElementById(a);
    }else{
        this.Element = null;
    }
    return this;
};
DOM.prototype.mini = function(a,b){
    if(typeof a == "string"){
        a = a.slice(1);
        this.Element = (b || document).getElementsByClassName(a);
    }else{
        this.Element = null;
    }
    return this;
};
DOM.prototype.tag = function(a,b){
    if(typeof a == "string"){
        a = a.slice(1);
        this.Element = (b || document).getElementsByTagName(a);
    }else{
        this.Element = null;
    }
    return this;
};
DOM.prototype.this = function(a){
    this.Element = a || null;
    return this;
};
DOM.prototype.find = function(a){
    if(typeof a == "string"){
        if(a.indexOf(".") == 0){
            this.Element = this.Element.getElementsByClassName(a);
        }else{
            this.Element = this.Element.getElementsByTagName(a);
        }
    }else{
        this.Element = null;
    }
    return this;
};
DOM.prototype.eq = function(a){
    a = parseInt(a) || 0;
    this.Element = this.Element[a];
    return this;
};
DOM.prototype.attr = function(a,b){
    j=this.Element.length,arr=[];
    if(j){
        for(i=0;i<j;i++){
            arr.push(this.Element[i].getAttribute(a));
            b && this.Element[i].setAttribute(a,b);
        }
        this.attr = arr;
    }else{
        this.attr = this.Element[0].getAttribute(a);
        b && this.Element[0].setAttribute(a,b);
    }
    return this;
};
DOM.prototype.addEventListener = function(a,b,c){
    c = c || false;
    j = this.Element.length;
    if(j){
        for(i=0;i<j;i++){
            this.Element[i].addEventListener(a,b,c);
        }
    }else{
        this.Element.addEventListener(a,b,c);
    }

};


window.dom = new DOM();

//获取兄弟元素
function siblings(elem){
    var nodes=[];
    var _elem=elem;
    while(elem=elem.previousSibling){
        if(elem.nodeType==1){
            nodes.push(elem);
        }
    }
    elem=_elem;
    while(elem=elem.nextSibling){
        if(elem.nodeType){
            nodes.push(elem);
        }
    }
    return nodes;
}

//ajax
function ajax(a,b,c,d,e,f){
    a = (a == "get" || a == "post")?a:"get";
    var xhr = new XMLHttpRequest();
    xhr.onload = function(){
        if(xhr.status >=200 && xhr.status<300 || xhr.status == 304){
            console.log("成功");
            e && e(xhr);
        }else{
            console.log("失败:",xhr);
            f && f(xhr);
        }
    };

    c = serialize(c);
    if(a == "get"){
        xhr.open(a,b+"?"+c,d);
        xhr.send(null);
    }else{
        xhr.open(a,b,d);
        !(c instanceof FormData) && xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        xhr.send(c);
    }
}

//get 方法序列化字符串
function serialize(a){
    var b = "";
    for(i in a){
        b += (encodeURIComponent(i) + "=" + encodeURIComponent(a[i]) + "&");
    }
    b = b.slice(0,-1);
    return b;
}

//判断是否包含某class
function hasClass(a,b){
    a = a.className.split(" ");
    return a.indexOf(b)>-1;
}















