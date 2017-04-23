<!doctype html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sea's 控制台</title>
    <link rel="stylesheet" type="text/css" href="css/admin.css" />
</head>
<body>
    <header>
        <a href="../index.php" id="header-left">Sea's blog</a>
        <a href="" id="header-right">
            <span>您好 , Sea</span>
            <img src="images/heads/head.jpg" alt="sea" width="20" height="20"/>
        </a>
    </header>
    <aside id="aside">
        <ul id="list">
            <li id="plus" class="list"><i class="side-icon"></i><a href="#">写文章</a></li>
            <li id="empty"></li>
            <li id="js"><i class="side-icon"></i><a href="#">Javascript</a></li>
            <li id="php"><i class="side-icon"></i><a href="#">PHP</a></li>
            <li id="nodejs"><i class="side-icon"></i><a href="#">NodeJS</a></li>
            <li id="css"><i class="side-icon"></i><a href="#">CSS3</a></li>
            <li id="h5"><i class="side-icon"></i><a href="#">H5</a></li>
            <li id="threejs"><i class="side-icon"></i><a href="#">ThreeJS</a></li>
        </ul>
    </aside>
    <div id="main">
        <h1>撰写新文章</h1>
        <div id="form">
            <div id="main-right">
                <div id="submitdiv">
                    <div class="sub-top">
                        <span>发布</span>
                        <h5 class="linear-gradient">
                    </div>
                    <div class="sub-btm">
                        <a href="javascript:void 0;" id="draft">保存草稿</a>
                        <a href="javascript:void 0;" id="preview">预览</a>
                        <a href="javascript:void 0;" id="submit">发布</a>
                    </div>
                </div>
                <div id="setupdiv">
                    <div id="setup-time">
                        <div class="sub-top">
                            <span>时间</span>
                            <h5 class="linear-gradient">
                        </div>
                        <div class="sub-btm">
                            <div id="time-top">
                                <input type="text" name="set-year" value="" id="set-year" maxlength="4" />年
                                <input type="text" name="set-month" value="" id="set-month" maxlength="4" />月
                                <input type="text" name="set-date" value="" id="set-date" maxlength="4" />日
                            </div>
                            <div id="time-btm">
                                <input type="text" name="set-hour" value="" id="set-hour" maxlength="4" />时
                                <input type="text" name="set-min" value="" id="set-min" maxlength="4" />分
                                <input type="text" name="set-sec" value="" id="set-sec" maxlength="4" />秒
                            </div>
                        </div>
                    </div>
                    <div id="setup-category">
                        <div class="sub-top">
                            <span>分类</span>
                            <h5 class="linear-gradient">
                        </div>
                        <div class="sub-btm">
                            <div id="cate">
                                <div class="checkbox">
                                    <input type="checkbox" name="set-category" value="js" id="set-js" class="none" />
                                    <span class="smallbox"></span>
                                    <label for="set-js" class="option">Javascript</label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" name="set-category" value="php" id="set-php" class="none" />
                                    <span class="smallbox"></span>
                                    <label for="set-php" class="option">PHP</label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" name="set-category" value="nodejs" id="set-nodejs" class="none" />
                                    <span class="smallbox"></span>
                                    <label for="set-nodejs" class="option">NodeJS</label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" name="set-category" value="css" id="set-css" class="none" />
                                    <span class="smallbox"></span>
                                    <label for="set-css" class="option">CSS3</label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" name="set-category" value="h5" id="set-h5" class="none" />
                                    <span class="smallbox"></span>
                                    <label for="set-h5" class="option">H5</label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" name="set-category" value="threejs" id="set-threejs" class="none" />
                                    <span class="smallbox"></span>
                                    <label for="set-threejs" class="option">ThreeJS</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="main-left">
                <div id="title">
                    <input type="text" name="title" value="" placeholder="在此输入标题" />
                </div>
                <div id="textarea">
                    <div id="toolbar_blank">
                        <div id="toolbar">
                            <div class="toolbar-block"><button class="toolbar" id="qt-b" title="粗体"></button></div>
                            <div class="toolbar-block"><button class="toolbar" id="qt-i" title="斜体"></button></div>
                            <div class="toolbar-block"><button class="toolbar" id="qt-u" title="下划线"></button></div>
                            <div class="toolbar-block"><button class="toolbar" id="qt-del" title="删除线"></button></div>
                            <div class="toolbar-block"><button class="toolbar" id="qt-h" title="标题"></button></div>
                            <div class="toolbar-block"><button class="toolbar" id="qt-bquote" title="引用"></button></div>
                            <div class="toolbar-block"><button class="toolbar" id="qt-pre" title="插入代码"></button></div>
                            <div class="toolbar-block"><button class="toolbar" id="qt-ul" title="无序列表"></button></div>
                            <div class="toolbar-block"><button class="toolbar" id="qt-ol" title="有序列表"></button></div>
                            <div class="toolbar-block"><button class="toolbar" id="qt-link" title="加入链接"></button></div>
                            <div class="toolbar-block"><button class="toolbar" id="qt-img" title="插入图片"></button></div>
                            <div class="toolbar-block" id="toolbar-cf"><button class="toolbar" id="qt-cf" title="清除格式"></button></div>
                        </div>
                    </div>
                    <div contenteditable="true" id="entry"></div>
                </div>
            </div>
        </div>
    </div>











<script src="../js/event.js"></script>
<script src="js/admin.js"></script>
<script src="js/xeditor.js"></script>
</body>
</html>