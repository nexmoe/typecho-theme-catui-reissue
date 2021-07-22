<?php 
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->footer(); 
?>

<script data-no-instant src="//cdn.bootcss.com/highlight.js/9.9.0/highlight.min.js"></script>
<script>$('pre code').each(function(i, block) {hljs.highlightBlock(block);});</script>
<script data-no-instant src="//cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script data-no-instant src="//cdn.bootcss.com/mdui/0.4.0/js/mdui.min.js"></script>
<?php $this->options->tongji(); ?>

<script data-no-instant src="//cdn.bootcss.com/instantclick/3.0.1/instantclick.js"></script>
<script data-no-instant>InstantClick.init();</script>
<script data-no-instant src="<?php $this->options->themeUrl('main.js'); ?>"></script>