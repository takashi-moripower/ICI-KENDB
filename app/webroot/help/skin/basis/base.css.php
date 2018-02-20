<?php
// Send header
header('Content-Type: text/css');
$matches = array();
if(ini_get('zlib.output_compression') && preg_match('/\b(gzip|deflate)\b/i', $_SERVER['HTTP_ACCEPT_ENCODING'], $matches)) {
	header('Content-Encoding: ' . $matches[1]);
	header('Vary: Accept-Encoding');
}

// Default charset
$charset = isset($_GET['charset']) ? $_GET['charset']  : '';
switch ($charset) {
	case 'Shift_JIS': break; /* this @charset is for Mozilla's bug */
	default: $charset ='iso-8859-1';
}

// Media
$media   = isset($_GET['media'])   ? $_GET['media']    : '';
if ($media != 'print') $media = 'screen';

$ua    = $_SERVER['HTTP_USER_AGENT'];

// Output CSS ----
?>
@charset "<?php echo $charset ?>";

/* 共通 */
body{
	font-size:90%;
	font-family:"Arial", sans-serif;
/**	padding:0px 36px 0px 36px; **/
    padding:0px 2px 0px 0px;
	margin:0px;
	line-height:140%;
	word-break:break-all;
}

img{
	border:0px;
	max-width:100%;
}

ul{
	line-height:130%;
}

p{
	margin:0px;
	padding:0px;
}

/* コンテナ */
div.container{
	width:100%;
	margin:0px;
	padding:0px;
/**	border:solid 1px; **/
}

/* コントロールバー */
div.logo{
	width:100%;
	margin:0px;
	padding:0px;
	float:left;
}

div.logo img{
	float:left;
	width:auto;
	margin:0px 16px 0px 0px;
	padding:0px;
}

div.logo span.logo_text{
	float:left;
	width:auto;
	font-size:36px;
	padding:16px;
}

div.logo h1{
	width:auto;
	margin:0px;
	padding:8px;
	font-size:18px;
	vertical-align:middle;
}

div.logo p{
	margin:0px;
	padding:0px;
}

div.logo div.page_funcbar{
	float:right;
	padding-right:4px;
	width:auto;
}

div.navigationbar{
	clear:both;
	width:100%;
	margin:0px;
	padding:0px;
}

div.topicpath{
	width:auto;
	margin:0px;
	float:left;
}

div.navigator{
	width:auto;
	margin:0px;
	float:right;
}

div.navigator img{
	float:left;
	width:auto;
}

div.editbar{
	clear:both;
	margin:0px;
	padding:0px;
	text-align:right;
}

div.footer{
	clear:both;
	margin:0px;
	padding:0px;
	text-align:right;
}

/* メニュー */

div.left{
	float:left;
	width:25%;
	margin:8px 0px 0px 0px;
	padding:px;
}

div.menu{
	margin:0px;
	padding:16px;
}

div.menu div{
	margin-top:4px;
}

div.menu form{
	margin:4px;
}

div.menu h2{
	margin:0px;
	padding:0px;
	border-bottom:dashed 1px;
	font-family:"Arial", sans-serif;
	font-size:110%;
	font-weight:bold;
	text-align:center;
}

div.menu h3, div.menu h4, div.menu h5{
	margin:0px;
	padding:0px;
	font-size:100%;
	font-weight:bold;
	text-align:center;
}


div.menu ul{
	list-style-type:none;
	margin:16px 0px 16px 0px;
	padding:0px;
}

div.menu ul li{
	text-align:left;
	margin:0px 0px 1px 0px;
	padding:0px;
}

div.menu ul a{
	display:block;
<?php if (ereg("MSIE (5|6)", $ua)) {?>
	width:100%;
<?php }else{ ?>
	width:auto;
<?php } ?>
	margin:0px;
	padding-left:1.4em;
	border:1px solid;
	word-break:break-all;
}

div.menu #search{
	margin:0px;
	padding:0px;
}

div.menu #search p{
	margin:8px;
	padding:0px;
}

div.menu #search #search_word{
	width:60%;
}

div.menu #search #search_submit{
	width:30%;
}

div.menu div.jumpmenu{
	display:none;
}

/* 本文 */

div.right{
	float:right;
	width:75%;
	margin:0px;
	padding:0px;
}

div.body{
	margin:0px;
	padding:16px 16px 16px 0px;
}

div.body div{
	margin-left:16px;
}

div.body p{
	margin:8px;
	padding:8px;
}

div.body pre{
	width:94%;
	overflow:auto;
	font-family:Monospace;
	padding:8px;
	margin:12px;
}

div.body h2{
	font-size:100%;
	margin:0px 0px 8px 0px;
}

div.body h3, div.body h5{
	font-size:100%;
	margin:0px 0px 8px 8px;
	font-weight:normal;
}

div.body h4{
	font-size:100%;
	margin:0px 0px 8px 16px;
	font-weight:normal;
}

/* 表 */
div.body .style_table{
	font-size:100%;
	padding:0px;
	margin:16px;
	text-align:left;
	border-collapse:collapse;
}

div.body td.style_td{
	padding:2px;
	margin:1px;
	text-align:left;
}

div.body thead td.style_td{
}


/* 引用 */
div.body blockquote{
	width:94%;
	overflow:auto;
	padding:8px;
	margin:12px;
}

div.body blockquote p{
	padding:0px;
	margin:0px;
}

/* 関連ページや注釈 */
div.body div.related, div.body div.notefoot{
	margin:0px 8px 0px 8px;
	padding:8px;
	font-size:90%;
}

div.body div.related p, div.body div.notefoot p{
	margin:4px;
	padding:0px;
}

.super_index {
	font-size:60%;
	vertical-align:super;
}

a.note_super {
	font-size:60%;
	vertical-align:super;
}

/* リスト */
div.body ul li{ line-height:140%;margin:2px 0px 2px 0px; }
div.body ul.list1 { list-style-type:disc; }
div.body ul.list2 { list-style-type:circle; }
div.body ul.list3 { list-style-type:square; }
div.body ol.list1 { list-style-type:decimal; }
div.body ol.list2 { list-style-type:lower-roman; }
div.body ol.list3 { list-style-type:lower-alpha; }


/* その他 */

div.body strong{
	font-size:90%;
	font-weight:bold;
}

div.ie5 {}

div.contents{
	margin:0px;
}

span.noexists {
}

div.jumpmenu{
	text-align:right;
	float:right;
	min-width:10%;
}

/* 区切り */

hr.full_hr{
}

hr.note_hr{
	display:none;
}

/* 文字サイズ */

span.size1 {
	font-size:xx-small;
	line-height:130%;
	text-indent:0px;
	display:inline;
}
span.size2 {
	font-size:x-small;
	line-height:130%;
	text-indent:0px;
	display:inline;
}
span.size3 {
	font-size:small;
	line-height:130%;
	text-indent:0px;
	display:inline;
}
span.size4 {
	font-size:medium;
	line-height:130%;
	text-indent:0px;
	display:inline;
}
span.size5 {
	font-size:large;
	line-height:130%;
	text-indent:0px;
	display:inline;
}
span.size6 {
	font-size:x-large;
	line-height:130%;
	text-indent:0px;
	display:inline;
}
span.size7 {
	font-size:xx-large;
	line-height:130%;
	text-indent:0px;
	display:inline;
}

/* html.php/catbody() */
strong.word0 {
	background-color:#FFFF66;
	color:black;
}
strong.word1 {
	background-color:#A0FFFF;
	color:black;
}
strong.word2 {
	background-color:#99FF99;
	color:black;
}
strong.word3 {
	background-color:#FF9999;
	color:black;
}
strong.word4 {
	background-color:#FF66FF;
	color:black;
}
strong.word5 {
	background-color:#880000;
	color:white;
}
strong.word6 {
	background-color:#00AA00;
	color:white;
}
strong.word7 {
	background-color:#886800;
	color:white;
}
strong.word8 {
	background-color:#004699;
	color:white;
}
strong.word9 {
	background-color:#990099;
	color:white;
}

/* html.php/edit_form() */
.edit_form{
}

.edit_form textarea{
	font-size:90%;
}

/* aname.inc.php */
.anchor {}
.anchor_super {
	font-size:xx-small;
	vertical-align:super;
}

/* br.inc.php */
br.spacer {}

/* calendar*.inc.php */
.style_calendar {
	padding:0px;
	border:0px;
	margin:3px;
	color:inherit;
	background-color:#CCD5DD;
	text-align:center;
	word-break:keep-all;
}
.style_td_caltop {
	padding:4px;
	margin:1px;
	color:inherit;
	background-color:#EEF5FF;
	font-size:80%;
	text-align:center;
}
.style_td_today {
	padding:4px;
	margin:1px;
	color:inherit;
	background-color:#FFFFDD;
	text-align:center;
}
.style_td_sat {
	padding:4px;
	margin:1px;
	color:inherit;
	background-color:#DDE5FF;
	text-align:center;
}
.style_td_sun {
	padding:4px;
	margin:1px;
	color:inherit;
	background-color:#FFEEEE;
	text-align:center;
}
.style_td_blank {
	padding:4px;
	margin:1px;
	color:inherit;
	background-color:#EEF5FF;
	text-align:center;
}
.style_td_day {
	padding:4px;
	margin:1px;
	color:inherit;
	background-color:#EEF5FF;
	text-align:center;
}
.style_td_week {
	padding:4px;
	margin:1px;
	color:inherit;
	background-color:#DDE5EE;
	font-size:80%;
	font-weight:bold;
	text-align:center;
}

/* calendar_viewer.inc.php */
div.calendar_viewer {
	color:inherit;
	background-color:inherit;
	margin-top:20px;
	margin-bottom:10px;
	padding-bottom:10px;
}
span.calendar_viewer_left {
	color:inherit;
	background-color:inherit;
	float:left;
}
span.calendar_viewer_right {
	color:inherit;
	background-color:inherit;
	float:right;
}

/* clear.inc.php */
.clear {
	margin:0px;
	clear:both;
}

/* counter.inc.php */
div.counter { font-size:70%; }

/* diff.inc.php */
span.diff_added {
	color:blue;
	background-color:inherit;
}

span.diff_removed {
	color:red;
	background-color:inherit;
}

/* hr.inc.php */
hr.short_line {
	text-align:center;
	width:80%;
	border-style:solid;
	border-color:#333333;
	border-width:1px 0px;
}

/* include.inc.php */
h5.side_label { text-align:center; }

/* navi.inc.php */
ul.navi {
	margin:0px;
	padding:0px;
	text-align:center;
}
li.navi_none {
	display:inline;
	float:none;
}
li.navi_left {
	display:inline;
	float:left;
	text-align:left;
}
li.navi_right {
	display:inline;
	float:right;
	text-align:right;
}

/* new.inc.php */
span.comment_date { font-size:x-small; }
span.new1 {
	color:red;
	background-color:transparent;
	font-size:x-small;
}
span.new5 {
	color:green;
	background-color:transparent;
	font-size:xx-small;
}

/* popular.inc.php */
span.counter { font-size:70%; }
ul.popular_list {
<?php
/*
	padding:0px;
	margin:0px;
	word-wrap:break-word;
	word-break:break-all;
*/
?>
}

/* recent.inc.php,showrss.inc.php */
ul.recent_list {
<?php
/*
	padding:0px;
	margin:0px;
	word-wrap:break-word;
	word-break:break-all;
*/
?>
}

/* ref.inc.php */
div.img_margin {
	margin-left:32px;
	margin-right:32px;
}

/* vote.inc.php */
td.vote_label {
	color:inherit;
	background-color:#FFCCCC;
}
td.vote_td1 {
	color:inherit;
	background-color:#DDE5FF;
}
td.vote_td2 {
	color:inherit;
	background-color:#EEF5FF;
}
