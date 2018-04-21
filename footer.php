<?php
/*
 * @Author: 折影轻梦 (https://i.chainwon.com/) 
 * @Date: 2017-12-22 22:34:22 
 * @Last Modified by: 折影轻梦 (https://i.chainwon.com/)
 * @Last Modified time: 2017-12-22 23:02:12
 */
?>
<?php 
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->footer(); 
?>

<script data-no-instant src="//cdn.bootcss.com/highlight.js/9.9.0/highlight.min.js"></script>
<script>$('pre code').each(function(i, block) {hljs.highlightBlock(block);});</script>
<script data-no-instant src="//cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script data-no-instant src="//cdn.bootcss.com/mdui/0.4.0/js/mdui.min.js"></script>
<?php $this->options->tongji(); ?>

<script data-no-instant src="https://cdn.bootcss.com/instantclick/3.0.1/instantclick.js"></script>
<script data-no-instant>InstantClick.init();</script>
<script data-no-instant src="<?php $this->options->themeUrl('js/main.js'); ?>"></script>