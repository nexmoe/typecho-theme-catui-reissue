<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div class="catui-nav">
    <a<?php if($this->is('index')): ?> class="catui-active"<?php endif; ?> href="<?php $this->options->siteUrl(); ?>"><?php _e( '首页'); ?></a>
    <?php $this->widget('Widget_Metas_Category_List')->to($mates); ?>
    <?php while($mates->next()): ?>
        <a<?php if($this->is('category', $mates->slug) or $this->is('category', $mates->name)): ?> class="catui-active"<?php endif; ?> href="<?php $mates->permalink(); ?>" title="<?php $mates->name(); ?>"><?php $mates->name(); ?></a>
    <?php endwhile; ?>
    <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
    <?php while($pages->next()): ?>
        <a<?php if($this->is('page', $pages->slug)): ?> class="catui-active"<?php endif; ?> href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a>
    <?php endwhile; ?>
    <?php if($this->user->hasLogin()):?>
    <a href="<?php $this->options->siteUrl(); ?>admin" title="后台" target="_blank">后台</a>
    <?php endif;?>
 </div>
<div class="catui-header">
    <div class="catui-header-avatar">
        <a class="mdui-ripple" href="<?php $this->options->siteUrl(); ?>">
            <h1><?php $this->options->title() ?></h1>
            <img src="<?php $this->options->logoUrl();?>">
        </a>
    </div>
 </div>