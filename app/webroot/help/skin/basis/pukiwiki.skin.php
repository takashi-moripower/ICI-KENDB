<?php
// basis ver 1.0.6 for PukiWiki1.4.5〜
// Copyright(c) 2005 cat-walk

//ユーザ設定

//IMAGE_DIR下の画像ファイル
//空欄の場合はテキストで表示
$skin_logo = 'pukiwiki.png';

//配色
//styleディレクトリ下のcssのファイル名(拡張子無し)を指定する。
//デフォルトではgray, natural, rainy_blue, cherry, colorfulの5色から選べる。
$skin_style = 'gray';

//ユーザ設定 終了

$link = & $_LINK;

// Output HTTP headers
pkwk_common_headers();
header('Cache-control: no-cache');
header('Pragma: no-cache');
header('Content-Type: text/html; charset=' . CONTENT_CHARSET);

// Output HTML DTD, <html>, and receive content-type
if (isset($pkwk_dtd)) {
	$meta_content_type = pkwk_output_dtd($pkwk_dtd);
} else {
	$meta_content_type = pkwk_output_dtd();
}

?>
<head>
<?php echo $meta_content_type ?>
<meta http-equiv="content-style-type" content="text/css" />
<?php if (! $is_read)  { ?> <meta name="robots" content="NOINDEX,NOFOLLOW" /><?php } ?>
<?php if (PKWK_ALLOW_JAVASCRIPT && isset($javascript)) { ?><meta http-equiv="Content-Script-Type" content="text/javascript" /><?php } ?>

<title><?php echo $page_title ?> - <?php echo $title ?></title>
<link rel="stylesheet" href="<?php echo SKIN_DIR ?>base.css.php?charset=<?php echo $css_charset ?>" type="text/css" media="screen"/>
<link rel="stylesheet" href="<?php echo SKIN_DIR ?>styles/<?php echo $skin_style ?>.css" type="text/css" media="screen"/>
<link rel="stylesheet" href="skin/print.css" type="text/css" media="print"/>
<link rel="alternate" type="application/rss+xml" title="RSS" href="<?php echo $link['rss'] ?>" /><?php // RSS auto-discovery ?>

<?php if (PKWK_ALLOW_JAVASCRIPT && $trackback_javascript) { ?><script type="text/javascript" src="skin/trackback.js"></script><?php } ?>

<?php echo $head_tag ?>
<style type="text/css">
div.head {
border-top : 5px solid #004579;
border-bottom : 5px solid #004579;
padding: 0px 10px;
}
</style>
</head>
<body>

<div class="container">

<div class="head">
<?php if ($skin_logo != '') { ?>
<a href="<?php echo "$script" ?>"><img src="<?php echo IMAGE_DIR ?><?php echo $skin_logo ?>" alt="<?php echo $page_title ?>" /></a>
<?php } else { ?>
<a href="<?php echo "$script" ?>"><span class="logo_text"><?php echo $page_title ?></span></a>
<?php } ?>
</div>

<div class="logo">
<h1><?php echo $title ?></h1>
<?php if ($lastmodified != '') { ?>
<p style="text-align:right">
last-modified: <?php echo $lastmodified ?>
[<a href="<?php echo $link_diff ?>" title="このページの変更箇所を表示(差分表示)">変更箇所</a>]
</p>
<?php } ?>

<?php if ($trackback || $referer) { ?>
<div class="page_funcbar">
<?php
  if ($trackback) {
    $tb_id = tb_get_id($_page);
?>
<a href="<?php echo "$script?plugin=tb&amp;__mode=view&amp;tb_id=$tb_id" ?>" onClick="OpenTrackback(this.href); return false">TrackBack(<?php echo tb_count($_page) ?>)</a>
<?php } ?>
<?php if ($referer) { ?>
 <a href="<?php echo $script ?>?plugin=referer&amp;page=<?php echo $r_page ?>" title="リンク元一覧を表示">リンク元</a>
<?php } ?>
</div>
<?php } ?>
</div><?php // End of logo?>

<?php //ナビゲータ ?>
<div class="navigationbar">
<?php if ($title != $defaultpage) { ?>
<div class="topicpath">
<?php require_once(PLUGIN_DIR . 'topicpath.inc.php'); echo plugin_topicpath_inline(); ?>
</div>
<?php } ?>
<div class="navigator">
<a href="<?php echo $link_list ?>" id="navigator" name="navigator" title="ページの一覧を表示します。"><img src="<?php echo IMAGE_DIR ?>list.png" alt="list" width="20" height="20" />ページ一覧</a>
</div>
<br style="clear:both;" />
</div><?php //End of Navigationbar ?>

<div class="right">
<div class="body">

<?php echo $body ?>

<?php if ($notes) { ?>
<div class="notefoot">
注釈
<p>
<?php echo $notes ?>
</p>
</div>
<?php } ?>

<?php if ($related) { ?>
<div class="related">
関連ページ
<p>
<?php echo $related ?>
</p>
</div>
<?php } ?>

</div><?php // End of body ?>
</div><?php // End of right ?>

<div class="left">
<div class="menu">

<h2>サイト内検索</h2>
<form action="<?php echo $script ?>" method="post" id="search">
<p>
<input type="hidden" name="cmd" value="search" />
<input type="text" name="word" value="" id="search_word" />
<input type="submit" value="検索" id="search_submit" />
</p>
<p>
<input type="radio" name="type" value="AND" checked="checked" id="and" />
<label for="and">and</label>
<input type="radio" name="type" value="OR" />
<label for="or">or</label>
</p>
</form>

<?php if (exist_plugin_convert('menu')) { ?>
<?php echo do_plugin_convert('menu') ?>
<?php } ?>

</div><?php // End of menu ?>
</div><?php // End of left ?>

<br style="clear:both;" />

<div class="footer">

<?php // 編集メニュー ?>
<?php if ($is_page) { ?>
<div class="editbar">
編集メニュー &gt;
<a href="<?php echo $script ?>?plugin=newpage" title="新しくページを作成します。">新規作成</a>
<a href="<?php echo $link_edit ?>" title="このページを編集します。">編集</a>
<a href="<?php echo $link_template ?>" title="このページをコピーして新しいページを作成します。">コピー</a>
<a href="<?php echo $link_rename ?>" title="ページ名を変更します。パスワードが必要です。">名前の変更</a>

<?php   if ($is_read and $function_freeze) { ?>
<?php     if ($is_freeze) { ?>
<a href="<?php echo $link_unfreeze ?>" title="このページの編集を禁止します。パスワードが必要です。">凍結解除</a>
<?php     } else { ?>
<a href="<?php echo $link_freeze ?>" title="このページの編集を許可します。パスワードが必要です。">凍結</a>
<?php     } ?>
<?php   } ?>

<?php   if ((bool)ini_get('file_uploads')) { ?>
<a href="<?php echo $link_upload ?>" title="このページにファイルをアップロードします。#ref(ファイル名)でページに貼り付けられます。">アップロード</a>
<a href="<?php echo $script ?>?plugin=attach&amp;pcmd=list&amp;refer=<?php echo $r_page ?>" title="添付ファイルの一覧を表示します。">添付ファイル一覧</a>
<?php   } ?>
<?php if ($do_backup) { ?>
<a href="<?php echo $link_backup ?>" title="このページのバックアップを表示します。">バックアップ</a>
<?php } ?>

</div><?php //End of editbar?>
<?php } ?>
<p>
<a href="<?php echo $modifierlink ?>"><?php echo $page_title; ?></a><br />
</p>
</div>
</div><?php //End of container?>

</body>
</html>
