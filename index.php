<?php 
    /**
     * Cat UI 情托于物。人情冷暖，世态炎凉。
     * @package Cat UI For Angel
     * @author 折影轻梦 
     * @version 1.4
     * @link https://nexmoe.com/ 
     */ 
    if (!defined('__TYPECHO_ROOT_DIR__')) exit;
    $this->need('head.php'); 
?>
<body class="home">
    <div id="catui-content">
        <div class="catui-container">
                <?php $this->need('header.php'); ?>
                <div class="catui-body">
                    <?php while($this->next()): ?>
                    <div class="catui-body-block">
                        <a class="catui-body-cover mdui-ripple" href="<?php $this->permalink() ?>">
                            <?php Cover($this->cid,$this->fields->Cover); ?>
                        </a>
                        <div class="catui-body-meta">
                            <a><?php $this->date('Y年n月d日');?></a>
                            <a><?php art_count($this->cid);?> 汉字</a>
                            <a><?php post_view($this);?> 围观</a>
                            <a><?php $this->commentsNum('%d'); ?> 评论</a>
                            <?php $this->category(','); ?>
                            <?php $this->tags(' ', true); ?>
                        </div>
                        <article class="catui-body-content">
                            <?php $this->content('- 阅读剩余部分 -'); ?>
                        </article>
                    </div>
                    <?php endwhile; ?>
                </div><!-- .catui-body -->
                <div class="catui-footer">
                    <?php $this->pageNav(); ?>
                </div><!-- .catui-footer -->
        </div><!-- .catui-container -->
    </div>
    <div id="catui-footer">
        <?php $this->need('footer.php'); ?>
    </div>
</body>
</html>