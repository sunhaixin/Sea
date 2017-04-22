<?php
function openSQLOnSave(){
    $db = new mysqli("localhost","savearticle","savearticle123");
    if(mysqli_connect_errno()){
        echo "保存失败";
        exit;
    }
    return $db;
}

function openSQLOnUser(){
    $db = new mysqli("localhost","adduser","adduser123");
    if(mysqli_connect_errno()){
        echo "添加失败";
        exit;
    }
    return $db;
}

class Insert{
    public $title;
    public $time;
    public $category;
    function toInsert(){
        $db = openSQLOnSave();
        $db->select_db("article");
        $query = "insert into article values(null,'".$this->artId."','".$this->title."','".$this->time."','".$this->category."','".$this->entry."')";
        $result = $db->query($query);
        $db->close();
    }
}

class AllSelect{
    private $query;

    function __construct($cate,$n,$p){
        switch($cate){
            case "all":$this->query = "select artId,title,time,text,category from article where id>((select count(id) from article)-$n*$p) && id<=((select count(id) from article)-($n-1)*$p)"." order by id desc";
                break;
            default:$this->query = "select artId,title,time,text,category from article where category='".$cate."' order by id desc "."limit "."$n".",".$p;
        }
        $this->toSelect();
    }

    function toSelect(){
        $db = openSQLOnSave();
        $db->select_db("article");
        $result = $db->query($this->query);
        $num_rows = $result->num_rows;
        for($i=0;$i<$num_rows;$i++){
            $rows = $result->fetch_assoc();
            $artId = $rows["artId"];
            $title = $rows["title"];
            $time = explode(" ",$rows["time"])[0];
            $category = $rows["category"];
            $summary = trim(substr(strip_tags($rows["text"]),0,327))."...";
            $this->showtext($artId,$title,$time,$category,$summary);
        }
        $result->free();
        $db->close();
    }

    function showtext($artId,$title,$time,$category,$summary){
        $str = '<div class="p-block">';
        $str .= '<h4><a class="p-title" href="/Sea/category/article.php?id='.$artId.'">'.$title.'</a></h4>';
        $str .= '<div class="p-info">';
        $str .= '<span class="p-date">日期：'.$time.'</span>';
        $str .= '<span class="p-sign">'.$category.'</span>';
        $str .= '</div>';
        $str .= '<p class="summary">'.$summary.'</p>';
        $str .= '</div>';
        echo $str;
    }
}

class TextSelect{
    function TextSelect($artId){
        $db = openSQLOnSave();
        $db->select_db("article");
        $query = "select title,time,category,text from article where artId='".$artId."'";
        $result = $db->query($query);
        $rows = $result->fetch_assoc();
        $title = $rows["title"];
        $time = "日期：".explode(" ",$rows["time"])[0];
        $category = $rows["category"];
        $text = $rows["text"];
        $this->showtext($title,$time,$category,$text);

        $result->free();
        $db->close();
    }

    function showtext($title,$time,$category,$text){
        $str = '<h3>'.$title.'</h3>';
        $str .= '<div class="s-info">';
        $str .= '<span class="s-date">'.$time.'</span>';
        $str .= '<span class="s-category">'.$category.'</span>';
        $str .= '</div>';
        $str .= '<div class="s-content">'.$text.'</div>';
        echo $str;
    }
}

class Pageset{
    private $pagenum;
    function getcount($cate){
        $db = openSQLOnSave();
        $db->select_db("article");
        $query = "select count($cate) as total from article";
        $result = $db->query($query);
        $rows = $result->fetch_assoc();
        $this->pagenum = $rows["total"];
        $result->free();
        $db->close();
    }

    function showpage($cate,$url,$n,$p){
        $this->getcount($cate);
        if(strpos($url,"?")>-1){
            if(strpos($url,"page=")>-1){
                $url = preg_replace("/page=\\w/","",$url);
            }else{
                $url = $url . "&";
            }
        }else{
            $url = $url . "?";
        }
        $maxpage = 10;
        $page_sum = ceil($this->pagenum/$p);
        if($page_sum>$maxpage){
            $page_sum = $maxpage;
        }
        //前面
        $home = "<a href='".$url."page=1'>&#60;&#60;首页</a>";
        $pre = "<a href='".$url."page=".($n-1)."'>&#60;上一页</a>";
        if($n == 1){
            $home = "";
            $pre = "";
        }
        //数字页
        $list = "";
        for($i=1;$i<$page_sum+1;$i++){
            if($i != $n){
                $list .= "<a href='".$url."page=".$i."'>".$i."</a>";
            }else{
                $list .= "<span>".$i."</span>";
            }
        }
        //...
        $omit = "<span>...</span>";
        if($n == $p || $page_sum < $maxpage){
            $omit = "";
        }
        //后面
        $next = "<a href='".$url."page=".($n+1)."'>下一页&#62;</a>";
        $end = "<a href='".$url."page=".$page_sum."'>尾页&#62;&#62;</a>";
        if($n == $p){
            $next = "";
            $end = "";
        }


        $str = $home . $pre . $list . $omit . $next . $end;
        echo $str;
    }
}

class addUser{
    function __construct($u,$p){
        $u5 = md5($u);
        $p5 = md5($p);
        $db = openSQLOnUser();
        $db->select_db("article");
        $query = "insert into username values (null,'".$u."','".$p."','".$u5."','".$p5."')";
        $result = $db->query($query);echo $result;
        $db->close();
    }
}

class validate{
    function __construct($u,$p){
        $db = openSQLOnUser();
        $db->select_db("article");
        $query = "select username from username where username='".$u."'";
        $result = $db->query($query);
        $num_rows = $result->num_rows;
        if($num_rows<1){
            $result->free();
            $db->close();
            echo 1; //账号不存在或错误
        }else{
            $this->validatePassword($u,$p);
        }
    }

    function validatePassword($u,$p){
        $db = openSQLOnUser();
        $db->select_db("article");
        $query = "select password,usernameMD5,passwordMD5 from username where username='".$u."'";
        $result = $db->query($query);
        $rows = $result->fetch_assoc();
        if($rows["password"] == $p){
            $arr = json_encode(array($rows["usernameMD5"],$rows["passwordMD5"]));
            echo $arr; //正确
        }else{
            echo 3; //密码错误
        }
        $result->free();
        $db->close();
    }
}

class validateMD5{
    function __construct($u,$p){
        $db = openSQLOnUser();
        $db->select_db("article");
        $query = "select username from username where usernameMD5='".$u."'";
        $result = $db->query($query);
        if($result->num_rows<1){
            $result->free();
            echo 0;
        }else{
            $this->validatePasswordMD5($u,$p);
        }
    }

    function validatePasswordMD5($u,$p){
        $db = openSQLOnUser();
        $db->select_db("article");
        $query = "select passwordMD5 from username where usernameMD5='".$u."'";
        $result = $db->query($query);
        $rows = $result->fetch_assoc();
        if($rows["passwordMD5"] == $p){
            echo 1; //正确
        }else{
            echo 0; //密码错误
        }
        $result->free();
        $db->close();
    }
}
?>