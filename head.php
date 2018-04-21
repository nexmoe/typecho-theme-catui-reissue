<?php
/*
 * @Author: 折影轻梦 (https://i.chainwon.com/) 
 * @Date: 2017-12-22 22:34:22 
 * @Last Modified by: 折影轻梦 (https://i.chainwon.com/)
 * @Last Modified time: 2017-12-22 23:06:32
 */
?>
<!DOCTYPE html>
<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<html>
    <head>
        <title><?php $this->archiveTitle(array( 'category' => _t('分类 %s 下的文章'), 'search' => _t('包含关键字 %s 的文章'), 'tag' => _t('标签 %s 下的文章'), 'author' => _t('%s 发布的文章') ), '', ' - '); ?><?php $this->options->title(); ?><?php if($this->is('index')): ?> - <?php $this->options->description() ?><?php endif; ?></title>
        <meta charset="<?php $this->options->charset(); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
        <meta name="renderer" content="webkit">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <link rel="shortcut icon" href="/favicon.ico">
        <link rel="apple-touch-icon" href="<?php $this->options->logoUrl();?>">
        <link rel="stylesheet" href="//cdn.bootcss.com/mdui/0.4.0/css/mdui.min.css">
        <link rel="stylesheet" href="//cdn.bootcss.com/highlight.js/9.8.0/styles/monokai-sublime.min.css">
        <link rel="stylesheet" href="//cdn.bootcss.com/simple-line-icons/2.4.1/css/simple-line-icons.css">
        <link rel="stylesheet" href="<?php $this->options->themeUrl('main.css?v=0109-1'); ?>">
        <?php $this->header('generator=&template=&pingback=&xmlrpc=&wlw=&commentReply=&rss1=&rss2=&atom='); ?>
    </head>
