<?php 
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('head.php'); 
?>
<body class="post">
    <div id="catui-content">
        <div class="catui-container">
            <?php $this->need('header.php'); ?>
            <div class="catui-body">
                <div class="catui-body-block">
                    <a class="catui-body-cover mdui-ripple" href="<?php $this->permalink() ?>">
                        <?php Cover($this->cid,$this->fields->Cover); ?>
                    </a><!-- .catui-body-cover -->
                    <div class="catui-body-meta">
                        <a><?php $this->date('Y年n月d日');?></a>
                        <a><?php art_count($this->cid);?> 汉字</a>
                        <a><?php post_view($this);?> 围观</a>
                        <a><?php $this->commentsNum('%d'); ?> 评论</a>
                    </div><!-- .catui-body-meta -->
                    <article class="catui-body-content">
                    <?php
                        $str = preg_replace('#<a href="(.*?)">(.*?)</a>#','<a href="$1" target="_blank" >$2</a>',$this->content);
                        $str = preg_replace('#\@\((.*?)\)#','<img src="//i.chainwon.com/usr/themes/catui/newpaopao/$1.png" class="biaoqing">',$str);
                        echo $str;
                    ?>
                    </article><!-- .catui-body-content -->
                    <div id="comments" class="catui-item">
                        <?php $this->need('comments.php'); ?>
                    </div><!-- #comments -->
                </div><!-- .catui-body-block -->
            </div><!-- .catui-body -->
        </div><!-- .catui-container -->
    </div>
    
    <div id="catui-footer">
        <?php $this->need('footer.php'); ?>
    </div>
</body>
</html>