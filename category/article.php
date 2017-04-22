<!doctype html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Javascript</title>
    <!--lato Light9ba4915556814-->
    <link href='http://cdn.webfont.youziku.com/webfonts/nomal/26644/47547/58da6659f629d8096094e1f3.css' rel='stylesheet' type='text/css' />
    <!--sea-->
    <link href='http://cdn.webfont.youziku.com/webfonts/nomal/26644/46818/57833fd4f629da07c4c1b25a.css' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" type="text/css" href="../css/index.css" />
</head>
<body>
    <nav id="nav-category">
        <a href="/Sea/index.php" id="category-logo">Sea</a>
        <ul id="nav-category-left">
            <li><a href="/Sea/category/category.php?category=javascript">Javascript</a></li>
            <li><a href="/Sea/category/category.php?category=php">PHP</a></li>
            <li><a href="/Sea/category/category.php?category=nodejs">NodeJS</a></li>
            <li><a href="/Sea/category/category.php?category=css3">CSS3</a></li>
            <li><a href="/Sea/category/category.php?category=h5">H5</a></li>
            <li><a href="/Sea/category/category.php?category=threejs">ThreeJS</a></li>
        </ul>
<!--        <a href="javascript:void 0;" id="category-log"></a>-->
        <span id="category-log">
            <span id="personal-front">
                <a href="" id="head-front" class="none"><img src="/Sea/admin/images/heads/head.jpg" width="80" height="80" /></a>
                <a href="/Sea/category/login.php" id="head-login">login</a>
            </span>
        </span>
        <ul id="nav-category-right">
            <li><a href="#">首页</a></li>
            <li><a href="#">邻居</a></li>
            <li><a href="#">关于我</a></li>
        </ul>
    </nav>
    <article class="article">
        <?php
        $id = $_GET["id"];
        include_once("../admin/func/tosql.php");
        $select = new TextSelect($id);
        ?>
    </article>

<script src="../js/index.js"></script>
</body>
</html>