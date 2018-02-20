<?php
//
//	guiedit - PukiWiki Plugin
//
//	$Id: guiedit.inc.php,v 1.64 2009/05/28 12:00:00 garand Exp $
//
//	License:
//	  GNU General Public License Version 2 or later (GPL)
//	  http://www.gnu.org/licenses/gpl.html
//
//	Copyright (C) 2006-2009 garand
//	PukiWiki : Copyright (C) 2001-2006 PukiWiki Developers Team
//	FCKeditor : Copyright (C) 2003-2008 Frederico Caldeira Knabben
//


define('GUIEDIT_DEBUG', 0);

define('GUIEDIT_FCK_PATH', SKIN_DIR . "fckeditor/");
define('GUIEDIT_LIB_PATH', SKIN_DIR . "guiedit/");

define('PLUGIN_GUIEDIT_FREEZE_REGEX', '/^(?:#freeze(?!\w)\s*)+/im');


//	コマンド型プラグイン
function plugin_guiedit_action()
{
	global $vars, $_title_edit, $load_template_func;

	if (PKWK_READONLY) die_message('PKWK_READONLY prohibits editing');

	$page = isset($vars['page']) ? $vars['page'] : '';

	check_editable($page, true, true);
	
	global $guiedit_use_fck;
	if ($vars['text']) {
		$guiedit_use_fck = FALSE;
	}
	else {
		$guiedit_use_fck = TRUE;
	}
	
	if ($guiedit_use_fck) {
		//	PukiWiki のルートディレクトリを取得
		global $guiedit_pkwk_root;
		global $script, $script_directory_index;
		if (isset($script_directory_index) && preg_match("#(.*)" . $script_directory_index . "$#", $script, $matches)) {
			$guiedit_pkwk_root = $matches[1];
		}
		else {
			$guiedit_pkwk_root = substr($script, 0, strrpos($script, '/') + 1);
		}
		$guiedit_pkwk_root = parse_url($guiedit_pkwk_root);
		$guiedit_pkwk_root = $guiedit_pkwk_root['path'];
	}
	
	if (isset($vars['edit'])) {
		return plugin_guiedit_edit_data($page);
	} else if ($load_template_func && isset($vars['template'])) {
		return plugin_guiedit_template();
	} else if (isset($vars['preview'])) {
		return plugin_guiedit_preview();
	} else if (isset($vars['write'])) {
		return plugin_guiedit_write();
	} else if (isset($vars['cancel'])) {
		return plugin_guiedit_cancel();
	}

	$source = get_source($page);
	$postdata = $vars['original'] = join('', $source);
	
	if ($vars['text']) {
		if (! empty($vars['id'])) {
			$postdata = plugin_guiedit_parts($vars['id'], $source);
			if ($postdata === FALSE) {
				unset($vars['id']);
				$postdata = $vars['original'];
			}
		}
		if ($postdata == '') $postdata = auto_template($page);
	}

	return array('msg'=>$_title_edit, 'body'=>plugin_guiedit_edit_form($page, $postdata));
}

//	インライン型プラグイン
function plugin_guiedit_inline()
{
	static $usage = '&guiedit(pagename#anchor[[,noicon],nolabel])[{label}];';

	global $script, $vars, $fixed_heading_anchor_edit;

	if (PKWK_READONLY) return ''; // Show nothing 

	// Arguments
	$args = func_get_args();

	// {label}. Strip anchor tags only
	$s_label = strip_htmltag(array_pop($args), FALSE);

	$page    = array_shift($args);
	if ($page == NULL) $page = '';
	$_noicon = $_nolabel = $_paraedit = FALSE;
	foreach($args as $arg){
		switch(strtolower($arg)){
		case ''			: break;
		case 'paraedit'	: $_paraedit = TRUE; break;
		case 'nolabel'	: $_nolabel = TRUE;	break;
		case 'noicon'	: $_noicon = TRUE; break;
		default			: return $usage;
		}
	}

	// Separate a page-name and a fixed anchor
	list($s_page, $id, $editable) = anchor_explode($page, TRUE);

	// Default: This one
	if ($s_page == '') $s_page = isset($vars['page']) ? $vars['page'] : '';

	// $s_page fixed
	$isfreeze = is_freeze($s_page);
	$ispage   = is_page($s_page);
	
	if ($_paraedit && (!$fixed_heading_anchor_edit || !arg_check('read') || $isfreeze)) {
		return '';
	}

	// Paragraph edit enabled or not
	$short = htmlspecialchars('Edit');
	if ($fixed_heading_anchor_edit && $editable && $ispage && ! $isfreeze) {
		// Paragraph editing
		$id    = rawurlencode($id);
		$title = htmlspecialchars(sprintf('Edit %s', $page));
		$icon = '<img src="' . IMAGE_DIR . 'paraedit.png' .
			'" width="9" height="9" alt="' .
			$short . '" title="' . $title . '" /> ';
		$class = ' class="anchor_super"';
	} else {
		// Normal editing / unfreeze
		$id    = '';
		if ($isfreeze) {
			$title = 'Unfreeze %s';
			$icon  = 'unfreeze.png';
		} else {
			$title = 'Edit %s';
			$icon  = 'edit.png';
		}
		$title = htmlspecialchars(sprintf($title, $s_page));
		$icon = '<img src="' . IMAGE_DIR . $icon .
			'" width="20" height="20" alt="' .
			$short . '" title="' . $title . '" />';
		$class = '';
	}
	if ($_noicon) $icon = ''; // No more icon
	if ($_nolabel) {
		if (!$_noicon) {
			$s_label = '';     // No label with an icon
		} else {
			$s_label = $short; // Short label without an icon
		}
	} else {
		if ($s_label == '') $s_label = $title; // Rich label with an icon
	}

	// URL
	if ($isfreeze) {
		$url   = $script . '?cmd=unfreeze&amp;page=' . rawurlencode($s_page);
	} else {
		$s_id = ($id == '') ? '' : '&amp;id=' . $id;
		$url  = $script . '?cmd=guiedit&amp;page=' . rawurlencode($s_page) . $s_id;
	}
	$atag  = '<a' . $class . ' href="' . $url . '" title="' . $title . '">';
	static $atags = '</a>';

	if ($ispage) {
		// Normal edit link
		return $atag . $icon . $s_label . $atags;
	} else {
		// Dangling edit link
		return '<span class="noexists">' . $atag . $icon . $atags .
			$s_label . $atag . '?' . $atags . '</span>';
	}
}

//	XML 形式で出力
function plugin_guiedit_send_xml($postdata)
{
	//	文字コードを UTF-8 に変換
	$postdata = mb_convert_encoding($postdata, 'UTF-8', SOURCE_ENCODING);
	
	//	出力
	header('Content-Type: application/xml; charset=UTF-8');
	echo '<?xml version="1.0" encoding="UTF-8" ?>' . "\n";
	echo '<res><![CDATA[' . $postdata . ']]></res>';
	exit;
}

//	編集するデータ
function plugin_guiedit_edit_data()
{
	global $vars;

	$source = get_source($vars['page']);
	$postdata = $vars['original'] = join('', $source);
	if (! empty($vars['id'])) {
		$postdata = plugin_guiedit_parts($vars['id'], $source);
		if ($postdata === FALSE) {
			unset($vars['id']);
			$postdata = $vars['original'];
		}
	}
	if ($postdata == '') $postdata = auto_template($page);

	//	構文の変換
	require_once(GUIEDIT_LIB_PATH . "wiki2xhtml.php");
	$postdata = guiedit_convert_html($postdata);
	
	plugin_guiedit_send_xml($postdata);
}

//	テンプレート
function plugin_guiedit_template()
{
	global $vars;
	global $guiedit_use_fck;
	
	//	テンプレートを取得
	if (is_page($vars['template_page'])) {
		$vars['msg'] = join('', get_source($vars['template_page']));
		$vars['msg'] = preg_replace('/^(\*{1,3}.*)\[#[A-Za-z][\w-]+\](.*)$/m', '$1$2', $vars['msg']);
		$vars['msg'] = preg_replace(PLUGIN_GUIEDIT_FREEZE_REGEX, '', $vars['msg']);
	}
	else if ($guiedit_use_fck) {
		exit;
	}
	
	if (!$guiedit_use_fck) {
		return plugin_guiedit_preview();
	}
	
	//	構文の変換
	require_once(GUIEDIT_LIB_PATH . "wiki2xhtml.php");
	$vars['msg'] = guiedit_convert_html($vars['msg']);
	
	plugin_guiedit_send_xml($vars['msg']);
}

//	プレビュー
function plugin_guiedit_preview()
{
	global $vars;
	global $_title_preview, $_msg_preview, $_msg_preview_delete;
	global $note_hr, $foot_explain;
	global $guiedit_use_fck;
	
	if ($guiedit_use_fck) {
		//	構文の変換
		require_once(GUIEDIT_LIB_PATH . "xhtml2wiki.php");
		$source = $vars['msg'];
		$vars['msg'] = xhtml2wiki($vars['msg']);
	}
	
	$postdata = $vars['msg'];
	if ($postdata) {
		$postdata = make_str_rules($postdata);
		$postdata = explode("\n", $postdata);
		$postdata = drop_submit(convert_html($postdata));
	}
	
	//	テキスト編集の場合
	if (!$guiedit_use_fck) {
		$body = $_msg_preview . '<br />' . "\n";
		if ($postdata == '') {
			$body .= '<strong>' . $_msg_preview_delete . '</strong><br />' . "\n";
		}
		else {
			$body .= '<br />' . "\n";
			$body .= '<div id="preview">' . $postdata . '</div>' . "\n";
		}
		$body .= plugin_guiedit_edit_form($vars['page'], $vars['msg'], $vars['digest'], FALSE);

		return array('msg'=>$_title_preview, 'body'=>$body);
	}
	
	//	注釈
	ksort($foot_explain, SORT_NUMERIC);
	$postdata .= ! empty($foot_explain) ? $note_hr . join("\n", $foot_explain) : '';
	
	//	通常の編集フォーム
	if (GUIEDIT_DEBUG) {
		global $hr;
		$postdata .= $hr . edit_form($vars['page'], $vars['msg']);
	}
	
	plugin_guiedit_send_xml($postdata);
}

//	ページの更新
function plugin_guiedit_write()
{
	global $vars;
	global $guiedit_use_fck;

	if ($guiedit_use_fck) {
		//	構文の変換
		require_once(GUIEDIT_LIB_PATH . "xhtml2wiki.php");
		$vars['msg'] = xhtml2wiki($vars['msg']);
	}

	if (isset($vars['id']) && $vars['id']) {
		$source = preg_split('/([^\n]*\n)/', $vars['original'], -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
		if (plugin_guiedit_parts($vars['id'], $source, $vars['msg']) !== FALSE) {
			$vars['msg'] = join('', $source);
		}
		else {
			$vars['msg'] = rtrim($vars['original']) . "\n\n" . $vars['msg'];
		}
	}

	//	書き込み
	exist_plugin('edit');
	return plugin_edit_write();
}

//	キャンセル
function plugin_guiedit_cancel()
{
	global $vars;
	
	$location = 'Location: ' . get_script_uri() . '?' . rawurlencode($vars['page']);
	if ($vars['id'] != '') {
		$location .= '#' . $vars['id'];
	}
	
	pkwk_headers_sent();
	header($location);
	exit;
}

//	編集フォームの作成
function plugin_guiedit_edit_form($page, $postdata, $digest = FALSE, $b_template = TRUE)
{
	global $vars;
	global $load_template_func, $whatsnew;
	global $_btn_preview, $_btn_update, $_btn_cancel, $_btn_load, $_btn_template;
	global $notimeupdate;
	global $head_tags, $javascript;
	global $guiedit_pkwk_root, $guiedit_use_fck;
	
	$s_id  = isset($vars['id']) ? htmlspecialchars($vars['id']) : '';
	
	if (!$guiedit_use_fck) {
		$body = edit_form($page, $postdata, $digest, $b_template);
		
		$pattern = "/(<input\s+type=\"hidden\"\s+name=\"cmd\"\s+value=\")edit(\"\s*\/?>)/";
		$replace = "$1guiedit$2\n" . '  <input type="hidden" name="id"     value="' . $s_id . '" />'
				 . '  <input type="hidden" name="text"     value="1" />';
		$body = preg_replace($pattern, $replace, $body);
		
		return $body;
	}
	
	require_once(GUIEDIT_LIB_PATH . "guiedit.ini.php");
	
	//	フォームの値の設定
	$s_digest    = htmlspecialchars(md5(join('', get_source($page))));
	$s_page      = htmlspecialchars($page);
	$s_original  = htmlspecialchars($vars['original']);
	
	// テンプレート
	$template = '';
	if($load_template_func) {
		global $guiedit_non_list;
		$pages  = array();
		foreach(get_existpages() as $_page) {
			if ($_page == $whatsnew || check_non_list($_page))
				continue;
			foreach($guiedit_non_list as $key) {
				$pos = strpos($_page . '/', $key . '/');
				if ($pos !== FALSE && $pos == 0)
					continue 2;
			}
			$_s_page = htmlspecialchars($_page);
			$pages[$_page] = '   <option value="' . $_s_page . '">' . $_s_page . '</option>';
		}
		ksort($pages);
		$s_pages  = join("\n", $pages);
		$template = <<<EOD
  <select name="template_page" onchange="Template()">
   <option value="">-- $_btn_template --</option>
$s_pages
  </select>
  <br />
EOD;
	}
	
	// チェックボックス「タイムスタンプを変更しない」
	$add_notimestamp = '';
	if ($notimeupdate != 0) {
		global $_btn_notchangetimestamp;
		$checked_time = isset($vars['notimestamp']) ? ' checked="checked"' : '';
		if ($notimeupdate == 2) {
			$add_notimestamp = '   ' .
				'<input type="password" name="pass" size="12" />' . "\n";
		}
		$add_notimestamp = '<input type="checkbox" name="notimestamp" ' .
			'id="_edit_form_notimestamp" value="true"' . $checked_time . ' />' . "\n" .
			'   ' . '<label for="_edit_form_notimestamp"><span class="small">' .
			$_btn_notchangetimestamp . '</span></label>' . "\n" .
			$add_notimestamp .
			'&nbsp;';
	}
	
	//	フォーム
	$body = <<<EOD

<div class="edit_form">
 <form id="edit_form" action="$script" method="post" style="margin-bottom:0px;">
$template
  <input type="hidden" name="cmd"    value="guiedit" />
  <input type="hidden" name="page"   value="$s_page" />
  <input type="hidden" name="digest" value="$s_digest" />
  <input type="hidden" name="id"     value="$s_id" />
  <textarea name="msg" rows="1" cols="1" style="display:none"></textarea>
  <div style="float:left;">
   <input type="button" name="preview" value="$_btn_preview" accesskey="p" onclick="Preview()" />
   <input type="submit" name="write"   value="$_btn_update" accesskey="s" onclick="Write()" />
   $add_notimestamp
  </div>
  <textarea name="original" rows="1" cols="1" style="display:none">$s_original</textarea>
 </form>
 <form action="$script" method="post" style="margin-top:0px;">
  <input type="hidden" name="cmd"    value="guiedit" />
  <input type="hidden" name="page"   value="$s_page" />
  <input type="submit" name="cancel" value="$_btn_cancel" accesskey="c" />
 </form>
</div>
<div id="preview_indicator" style="display:none"></div>
<div id="preview_area" style="display:none"></div>

EOD;

	//	JavaScript を有効にする
	$javascript = 1;
	
	//	ヘッダの設定
	$head_tags[] = ' <link rel="stylesheet" type="text/css" href="' . GUIEDIT_LIB_PATH . 'guiedit.css" charset="UTF-8" />';
	$head_tags[] = ' <script type="text/javascript" src="' . GUIEDIT_FCK_PATH . 'fckeditor.js" charset="UTF-8"></script>';
	$head_tags[] = ' <script type="text/javascript" src="' . GUIEDIT_LIB_PATH . 'ajax.js" charset="UTF-8"></script>';
	$head_tags[] = ' <script type="text/javascript" src="' . GUIEDIT_LIB_PATH . 'guiedit.js" charset="UTF-8"></script>';
	$head_tags[] = ' <script type="text/javascript">';
	$head_tags[] = ' <!--';
	$head_tags[] = ' var SMILEY_PATH = "' . $guiedit_pkwk_root . IMAGE_DIR . "face/" . '";';
	$head_tags[] = ' var FCK_PATH = "' . $guiedit_pkwk_root . GUIEDIT_FCK_PATH . '";';
	$head_tags[] = ' var GUIEDIT_PATH = "' . $guiedit_pkwk_root . GUIEDIT_LIB_PATH . '";';
	$head_tags[] = ' //-->';
	$head_tags[] = ' </script>';
	$head_tags[] = ' <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />';
	
	return $body;
}

// ソースの一部を抽出/置換
function plugin_guiedit_parts($id, & $source, $postdata = '')
{
	$postdata = rtrim($postdata)."\n";
	$heads = preg_grep('/^\*{1,3}.+$/', $source);
	$heads[count($source)] = '';

	while (list($start, $line) = each($heads)) {
		if (preg_match("/\[#$id\]/", $line)) {
			list($end, $line) = each($heads);
			return join('', array_splice($source, $start, $end - $start, $postdata));
		}
	}
	return FALSE;
}

?>
