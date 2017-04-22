<!doctype html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sea's Blog</title>
    <!--lato Light9ba4915556814-->
    <link href='http://cdn.webfont.youziku.com/webfonts/nomal/26644/47547/58da6659f629d8096094e1f3.css' rel='stylesheet' type='text/css' />
    <!--sea-->
    <link href='http://cdn.webfont.youziku.com/webfonts/nomal/26644/46818/57833fd4f629da07c4c1b25a.css' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" type="text/css" href="css/index.css" />
</head>
<body>
    <nav id="nav">
        <a href="#" id="logo">Sea</a>
        <span id="log">
            <span id="personal-front">
                <a href="" id="head-front" class="none"><img src="admin/images/heads/head.jpg" width="80" height="80" /></a>
                <a href="javascript:void 0;" id="head-login">login</a>
            </span>
        </span>
        <ul>
            <li><a href="#">首页</a></li>
            <li id="file">
                <a href="#">归档</a>
                <ul id="list">
                    <li><a href="category/category.php?category=javascript">Javascript</a></li>
                    <li><a href="category/category.php?category=php">PHP</a></li>
                    <li><a href="category/category.php?category=nodejs">NodeJS</a></li>
                    <li><a href="category/category.php?category=css3">CSS3</a></li>
                    <li><a href="category/category.php?category=h5">H5</a></li>
                    <li><a href="category/category.php?category=threejs">ThreeJS</a></li>
                </ul>
            </li>
            <li><a href="#">邻居</a></li>
            <li><a href="#">关于我</a></li>
        </ul>
    </nav>
    <header>
        <a href="" id="head"><img src="images/kide.jpg" alt="head" /></a>
        <h1>谦和之中见卓越</h1>
        <input value="" placeholder="突如其来的装逼 , 让我无法呼吸" id="search" />
    </header>
    <section>
        <?php
            $page = $_GET["page"];
            if(empty($page)){
                $page = 1;
            }
            include_once("admin/func/tosql.php");
            $select = new AllSelect("all",$page,12);
        ?>
    </section>
    <div id="page-list">
        <?php
            $pagelist = new Pageset();
            $pagelist->showpage("id","/Sea/index.php",$page,12);
        ?>
    </div>

    <footer>
        Copyright © Sea All Rights Reserved
    </footer>

<script src="js/event.js"></script>
<script src="js/index.js"></script>
</body>
</html>