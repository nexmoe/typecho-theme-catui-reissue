<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
error_reporting(0);
function themeInit($archive){
    Helper::options()->commentsAntiSpam = false; 
}
function themeConfig($form){
	$logoUrl=new Typecho_Widget_Helper_Form_Element_Text('logoUrl',NULL,"https://avatar.mixcm.com/github/nexmoe",_t ('博客头像'),_t ('在这里填入一个图片URL地址, 以在网站标题前加上一个LOGO<br>可使用QQ头像链接作为LOGO http://avatar.mixcm.com/qq/（这里填QQ）'));
	$form->addInput ($logoUrl);
	$background=new Typecho_Widget_Helper_Form_Element_Text('background',NULL,"https://cdn.jsdelivr.net/gh/nexmoe/nexmoe.github.io@latest/images/cover/compress/5c3aec85a4343.jpg",_t ('博客背景'),_t ('默认封面图片'));
	$form->addInput ($background);
	$tongji=new Typecho_Widget_Helper_Form_Element_Textarea('tongji',NULL,'<script data-ad-client="ca-pub-2058306854838448" async="" src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>',_t ('统计代码'),_t ('为你的网站添加统计代码'));
	$form->addInput ($tongji);
	$Cover=new Typecho_Widget_Helper_Form_Element_Radio('Cover',array ('1'=>_t ('自定义Cover+标题'),'2'=>_t ('文章标题'),'3'=>_t ('自定义Cover')),'1',_t ('Cover模式'),_t ("文章标题：将标题设置为Cover。<br>自定义Cover：若已设置“自定义缩略图”，则将其设置为Cover，当没有图片时，会将背景设置为Cover。<br>自定义Cover+标题：若已设置“自定义缩略图”，则将其设置为Cover，当没有图片时，会将标题设置为Cover。"));
	$form->addInput ($Cover);
}

function themeFields($layout) {
    $Cover = new Typecho_Widget_Helper_Form_Element_Textarea('Cover', NULL, NULL, _t('自定义封面图'), _t('输入封面图地址'));
    $layout->addItem($Cover);
}

function Cover ($cid,$Cover){
	$options=Typecho_Widget::widget ('Widget_Options');
	$db=Typecho_Db::get ();
	$rs=$db->fetchRow ($db->select ('table.contents.text','table.contents.title')->from ('table.contents')->where ('table.contents.cid=?',$cid)->order ('table.contents.cid',Typecho_Db::SORT_ASC)->limit (1));
	
	$colorid=rand(1,8);
	switch ($colorid){
		case 1:
			$color='rgb(255, 110, 113)';
			break ;
		case 2:
			$color='rgb(255, 170, 115)';
			break ;
		case 3:
			$color='rgb(254, 212, 102)';
			break ;
		case 4:
			$color='rgb(60, 220, 130)';
			break ;
		case 5:
			$color='rgb(100, 220, 240)';
			break ;
		case 6:
			$color='rgb(100, 185, 255)';
			break ;
		case 7:
			$color='rgb(180, 180, 255)';
			break ;
		case 8:
		    $color='#f4a7b9';
			break ;
	}
	if ($options->Cover =='5'){
		if ($Cover != ""){
			echo '<img src="'.$Cover.'"><p>'.$rs['title'].'</p>';
		}else {
			echo '<img src="'.$options->background.'"><p>'.$rs['title'].'</p>';
		}
	}
	elseif ($options->Cover =='6'){
		if ($Cover != ""){
			echo '<img src="'.$Cover.'"><p>'.$rs['title'].'</p>';
		}else {
			echo '<h1 style="background:'.$color.';">'.$rs['title'].'</h1>';
		}
	}
	else {
		echo '<h1 style="background:'.$color.';">'.$rs['title'].'</h1>';
	}
}

function  art_count ($cid){
	$db=Typecho_Db::get ();
	$rs=$db->fetchRow ($db->select ('table.contents.text')->from ('table.contents')->where ('table.contents.cid=?',$cid)->order ('table.contents.cid',Typecho_Db::SORT_ASC)->limit (1));
	$text=preg_replace("/[^\x{4e00}-\x{9fa5}]/u","",$rs['text']);
	echo mb_strlen($text,'UTF-8');
}
function  post_cover ($Cover){
	$options=Typecho_Widget::widget ('Widget_Options');

	if ($options->Cover =='5'){
		if ($Cover != ""){
			echo $Cover;
		}else {
			echo $options->background;
		}
	}
	elseif ($options->Cover =='6'){
		if ($Cover != ""){
			echo $Cover;
		}else {
			echo $options->background;
		}
	}
	else {
		echo $options->background;
	}
}
function  post_view ($archive){
	$cid=$archive->cid ;
	$db=Typecho_Db::get ();
	$prefix=$db->getPrefix ();
	if (!array_key_exists('viewsNum',$db->fetchRow ($db->select ()->from ('table.contents')))){
		$db->query ('ALTER TABLE `'.$prefix.'contents` ADD `viewsNum` INT(10) DEFAULT 0;');
		echo 0;
		return ;
	}
	$row=$db->fetchRow ($db->select ('viewsNum')->from ('table.contents')->where ('cid = ?',$cid));
	if ($archive->is ('single')){
		$views=Typecho_Cookie::get ('extend_contents_viewsNum');
		if (empty($views)){
			$views=array ();
		}else {
			$views=explode(',',$views);
		}
		if (!in_array($cid,$views)){
			$db->query ($db->update ('table.contents')->rows (array ('viewsNum'=>(int )$row['viewsNum']+1))->where ('cid = ?',$cid));
			array_push($views,$cid);
			$views=implode(',',$views);
			Typecho_Cookie::set ('extend_contents_viewsNum',$views);
			//记录查看cookie
		}
	}
	echo $row['viewsNum'];
}
function comment_at($coid){
    $db   = Typecho_Db::get();
    $prow = $db->fetchRow($db->select('parent')
        ->from('table.comments')
        ->where('coid = ? AND status = ?', $coid, 'approved'));
    $parent = $prow['parent'];
    if ($parent != "0") {
        $arow = $db->fetchRow($db->select('author')
            ->from('table.comments')
            ->where('coid = ? AND status = ?', $parent, 'approved'));
        $author = $arow['author'];
        $href   = '<a class="at" href="#comment-'.$parent.'">回复 '.$author.':</a> ';
        echo $href;
    } else {
        echo '';
    }
}
function  cid_info ($cid,$biao){
	$db=Typecho_Db::get ();
	$rs=$db->fetchRow ($db->select ('table.contents.'.$biao)->from ('table.contents')->where ('table.contents.cid=?',$cid)->order ('table.contents.cid',Typecho_Db::SORT_ASC)->limit (1));
	return $rs[$biao];
}
?>