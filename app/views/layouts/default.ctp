<?php
/**
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.libs.view.templates.layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php echo $this->Html->charset(); ?>
<title><?php __('Titech KenDB'); ?> | <?php echo __($title_for_layout, true); ?></title>
<?php
echo $this->Html->meta('icon');
echo "\n";
echo $this->Html->css('kendb_common');
echo "\n";
echo $this->Html->css('kendb_menu_style');
echo "\n";
echo $this->Html->css("txtdef");
echo "\n";
echo $this->Html->css("txtbig");
echo "\n";
echo $this->Html->css('flexigrid/flexigrid');
echo "\n";
echo $this->Html->css('datePicker');
echo "\n";
echo $this->Html->css('jquery.autocomplete');
echo "\n";
echo $this->Html->css('smoothness/jquery-ui-1.8.6.custom');
echo "\n";
echo $this->Html->css('smoothness/jquery.ui.core');
echo "\n";
echo $this->Html->css('smoothness/jquery.ui.theme');
echo "\n";
echo $this->Html->css('smoothness/jquery.ui.tabs');
echo "\n";
echo $javascript->link('jquery');
echo "\n";
echo $javascript->link('jquery.formtips.1.2.2');
echo "\n";
// ログイン画面ではEnterキーによる操作を有効にし、それ以外の画面は無効にする
if (!($this->name === "Users" && $this->action === "login")) {
	echo $javascript->link('common');
	echo "\n";
}
echo $javascript->link('date');
echo "\n";
echo $javascript->link('jquery.datePicker');
echo "\n";
echo $javascript->link('jquery.autocomplete');
echo "\n";
echo $javascript->link('jquery-ui-1.8.6.custom.min');
echo "\n";
echo $javascript->link('jquery.cookie');
echo "\n";
echo $javascript->link('cake.datePicker');
echo "\n";
echo $javascript->link('flexigrid');
echo "\n";
echo $javascript->link('styleswitcher');
echo $scripts_for_layout;
echo "\n";
?>
<link rel="alternate stylesheet" type="text/css" href="<?php echo $html->url("/"); ?>css/txtdef.css" title="deft" />
<link rel="alternate styleshee" type="text/css" href="<?php echo $html->url("/"); ?>css/txtbig.css" title="bigt" />
</head>
<body>
<div id="wrapper">
    <div id="container">
        <div id="header">
            <h1><?php echo $this->Html->link('研究力DB', $html->url('/')); ?></h1>
            <div id="userinfo">
                <div id="userinfoTxt">
                    <span style="color:#000000;"><?php echo $this->Kendb->print_today(); ?></span>&nbsp;&nbsp;
                    <?php if (isset($user_option)) { ?>
                    <span style="color:#000000;"><?php echo $user_option["department"]; ?></span>&nbsp;
                    <span style="color:#000000; font-weight:bold;"><?php echo $user_option["displayname"]; ?>さん</span>
                    <?php if ($access->check('admin_index')) { ?>
                    <span style="color:#000000;">&nbsp;(<?php echo __('Administrator'); ?>)</span>
                    <?php } ?>
                    &nbsp;<span style="color:#000000;"><?php echo $this->Html->link(__("Settings", true), '/users/edit/'.$login_user['id'], array('escape' => false)); ?></span>
                    <?php if ($access->check('admin_index')) { ?>
                    &nbsp;<span style="color:#000000;">&nbsp;<?php echo $this->Html->link(__('Manage', true), '/admin/users/index'); ?></span>
                    <?php } ?>
                    <span style="color:#000000;" class="logout">&nbsp;<?php echo $this->Html->link(__('Logout', true), '/users/logout'); ?></span>
                    <?php } ?>
                    <span><a href="#" onclick="setActiveStyleSheet('deft'); return false;">文字標準</a></span>
                    <span><a href="#" onclick="setActiveStyleSheet('bigt'); return false;">文字拡大</a></span>
                </div>
            </div>
        </div>
        <div id="content">
<?php if (isset($user_option)) { ?>
        <!--div class="menu"-->
            <ul id="globalnavi">
                <!-- 0. ホーム -->
                <li><a href="<?php echo $html->url("/"); ?>"><img src="/img/navi01.gif" alt="ホーム" width="90" height="42" border="0" onmouseover="this.src='/img/navi01_on.gif'" onmouseout="this.src='/img/navi01.gif'" /></a></li>

                <!-- 1.科研費(文科・学振) -->
                <?php if($can_adoptions_index): ?>
                <li><a href="<?php echo $html->url('/adoptions/index'); ?><?php echo $this->Kendb->nendo(); ?>"><img src="/img/navi02.gif" alt="科研費(文科・学振)" width="107" height="42" border="0" onmouseover="this.src='/img/navi02_on.gif'" onmouseout="this.src='/img/navi02.gif'" /></a>
                    <ul>
                        <li><a href="<?php echo $html->url('/adoptions/index'); ?><?php echo $this->Kendb->nendo(); ?>">一覧</a></li>
                        <?php if($can_adoptions_add): ?>
                        <li><a href="<?php echo $html->url('/adoptions/add'); ?>">追加</a></li>
                        <?php endif; ?>
                        <?php if($can_adoptions_upload): ?>
                        <li><a href="<?php echo $html->url('/adoptions/upload'); ?>">一括アップロード</a></li>
                        <?php endif; ?>
                        <?php if($can_adoptions_delete_all): ?>
                        <li><a href="<?php echo $html->url('/adoptions/delete_all'); ?>">一括削除</a></li>
                        <?php endif; ?>
                        <?php if($can_adoptions_update_researcher): ?>
                        <li><a href="<?php echo $html->url('/adoptions/update_researcher'); ?>">研究者情報一括更新</a></li>
                        <?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>

                <!-- 2.科研費分担金(文科・学振) -->
                <?php if($can_assessedcontributions_index): ?>
                <li><a href="<?php echo $html->url('/assessed_contributions/index'); ?><?php echo $this->Kendb->nendo(); ?>"><img src="/img/navi05.gif" alt="科研費分担金(文科・学振)" width="106" height="42" border="0" onmouseover="this.src='/img/navi05_on.gif'" onmouseout="this.src='/img/navi05.gif'" /></a>
                    <ul>
                        <li><a href="<?php echo $html->url('/assessed_contributions/index'); ?><?php echo $this->Kendb->nendo(); ?>">一覧</a></li>
                        <?php if($can_assessedcontributions_add): ?>
                        <li><a href="<?php echo $html->url('/assessed_contributions/add'); ?>">追加</a></li>
                        <?php endif; ?>
                        <?php if($can_assessedcontributions_upload): ?>
                        <li><a href="<?php echo $html->url('/assessed_contributions/upload'); ?>">一括アップロード</a></li>
                        <?php endif; ?>
                        <?php if($can_assessedcontributions_delete_all): ?>
                        <li><a href="<?php echo $html->url('/assessed_contributions/delete_all'); ?>">一括削除</a></li>
                        <?php endif; ?>
                        <?php if($can_assessedcontributions_update_researcher): ?>
                        <li><a href="<?php echo $html->url('/assessed_contributions/update_researcher'); ?>">研究者情報一括更新</a></li>
                        <?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>

                <!-- 3.科研費(特別研究員奨励費) -->
                <?php if($can_encourages_index): ?>
                <li><a href="<?php echo $html->url('/encourages/index'); ?><?php echo $this->Kendb->nendo(); ?>"><img src="/img/navi04.gif" alt="科研費(特別研究員奨励費)" width="106" height="42" border="0" onmouseover="this.src='/img/navi04_on.gif'" onmouseout="this.src='/img/navi04.gif'" /></a>
                    <ul>
                        <li><a href="<?php echo $html->url('/encourages/index'); ?><?php echo $this->Kendb->nendo(); ?>">一覧</a></li>
                        <?php if($can_encourages_add): ?>
                        <li><a href="<?php echo $html->url('/encourages/add'); ?>">追加</a></li>
                        <?php endif; ?>
                        <?php if($can_encourages_upload): ?>
                        <li><a href="<?php echo $html->url('/encourages/upload'); ?>">一括アップロード</a></li>
                        <?php endif; ?>
                        <?php if($can_encourages_delete_all): ?>
                        <li><a href="<?php echo $html->url('/encourages/delete_all'); ?>">一括削除</a></li>
                        <?php endif; ?>
                        <?php if($can_encourages_update_researcher): ?>
                        <li><a href="<?php echo $html->url('/encourages/update_researcher'); ?>">研究者情報一括更新</a></li>
                        <?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>

                <!-- 4.科研費(厚生労働) -->
                <?php if($can_mhlwresearchgrants_index): ?>
                <li><a href="<?php echo $html->url('/mhlw_research_grants/index'); ?><?php echo $this->Kendb->nendo(); ?>"><img src="/img/navi11.gif" alt="科研費(厚生労働)" width="106" height="42" border="0" onmouseover="this.src='/img/navi11_on.gif'" onmouseout="this.src='/img/navi11.gif'" /></a>
                    <ul>
                        <li><a href="<?php echo $html->url('/mhlw_research_grants/index'); ?><?php echo $this->Kendb->nendo(); ?>">一覧</a></li>
                        <?php if($can_mhlwresearchgrants_add): ?>
                        <li><a href="<?php echo $html->url('/mhlw_research_grants/add'); ?>">追加</a></li>
                        <?php endif; ?>
                        <?php if($can_mhlwresearchgrants_upload): ?>
                        <li><a href="<?php echo $html->url('/mhlw_research_grants/upload'); ?>">一括アップロード</a></li>
                        <?php endif; ?>
                        <?php if($can_mhlwresearchgrants_delete_all): ?>
                        <li><a href="<?php echo $html->url('/mhlw_research_grants/delete_all'); ?>">一括削除</a></li>
                        <?php endif; ?>
                        <?php if($can_mhlwresearchgrants_update_researcher): ?>
                        <li><a href="<?php echo $html->url('/mhlw_research_grants/update_researcher'); ?>">研究者情報一括更新</a></li>
                        <?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>

                <!-- 5.研究補助金(環境・その他) -->
                <?php if($can_otherresearchgrants_index): ?>
                <li><a href="<?php echo $html->url('/other_research_grants/index'); ?><?php echo $this->Kendb->nendo(); ?>"><img src="/img/navi03.gif" alt="科研費(環境・その他)" width="105" height="42" border="0" onmouseover="this.src='/img/navi03_on.gif'" onmouseout="this.src='/img/navi03.gif'" /></a>
                    <ul>
                        <li><a href="<?php echo $html->url('/other_research_grants/index'); ?><?php echo $this->Kendb->nendo(); ?>">一覧</a></li>
                        <?php if($can_otherresearchgrants_add): ?>
                        <li><a href="<?php echo $html->url('/other_research_grants/add'); ?>">追加</a></li>
                        <?php endif; ?>
                        <?php if($can_otherresearchgrants_upload): ?>
                        <li><a href="<?php echo $html->url('/other_research_grants/upload'); ?>">一括アップロード</a></li>
                        <?php endif; ?>
                        <?php if($can_otherresearchgrants_delete_all): ?>
                        <li><a href="<?php echo $html->url('/other_research_grants/delete_all'); ?>">一括削除</a></li>
                        <?php endif; ?>
                        <?php if($can_otherresearchgrants_update_researcher): ?>
                        <li><a href="<?php echo $html->url('/other_research_grants/update_researcher'); ?>">研究者情報一括更新</a></li>
                        <?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>

                <!-- 6.受託研究（政府系） -->
                <?php if($can_nedojstothers_index): ?>
                <li><a href="<?php echo $html->url('/nedo_jst_others/index'); ?><?php echo $this->Kendb->nendo(); ?>"><img src="/img/navi08.gif" alt="NEDO/JST/その他 研究資金" width="105" height="42" border="0" onmouseover="this.src='/img/navi08_on.gif'" onmouseout="this.src='/img/navi08.gif'" /></a>
                    <ul>
                        <li><a href="<?php echo $html->url('/nedo_jst_others/index'); ?><?php echo $this->Kendb->nendo(); ?>">一覧</a></li>
                        <?php if($can_nedojstothers_add): ?>
                        <li><a href="<?php echo $html->url('/nedo_jst_others/add'); ?>">追加</a></li>
                        <?php endif; ?>
                        <?php if($can_nedojstothers_upload): ?>
                        <li><a href="<?php echo $html->url('/nedo_jst_others/upload'); ?>">一括アップロード</a></li>
                        <?php endif; ?>
                        <?php if($can_nedojstothers_delete_all): ?>
                        <li><a href="<?php echo $html->url('/nedo_jst_others/delete_all'); ?>">一括削除</a></li>
                        <?php endif; ?>
                        <?php if($can_nedojstothers_update_researcher): ?>
                        <li><a href="<?php echo $html->url('/nedo_jst_others/update_researcher'); ?>">研究者情報一括更新</a></li>
                        <?php endif; ?>
                        <?php if($can_nedojstothers_manage): ?>
                        <li><a href="<?php echo $html->url('/nedo_jst_others/manage'); ?>">マスタ管理</a></li>
                        <?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>


                <!-- 7.受託事業研究資金 -->
                <?php if($can_contracts_index): ?>
                <li><a href="<?php echo $html->url("/contracts/index"); ?><?php echo $this->Kendb->nendo(); ?>"><img src="/img/navi09.gif" alt="受託事業 研究資金" width="106" height="42" border="0" onmouseover="this.src='/img/navi09_on.gif'" onmouseout="this.src='/img/navi09.gif'" /></a>
                    <ul>
                        <li><a href="<?php echo $html->url('/contracts/index'); ?><?php echo $this->Kendb->nendo(); ?>">一覧</a></li>
                        <?php if($can_contracts_add): ?>
                        <li><a href="<?php echo $html->url('/contracts/add'); ?>">追加</a></li>
                        <?php endif;?>
                        <?php if($can_contracts_upload): ?>
                        <li><a href="<?php echo $html->url('/contracts/upload'); ?>">一括アップロード</a></li>
                        <?php endif; ?>
                        <?php if($can_contracts_delete_all): ?>
                        <li><a href="<?php echo $html->url('/contracts/delete_all'); ?>">一括削除</a></li>
                        <?php endif; ?>
                        <?php if($can_contracts_update_researcher): ?>
                        <li><a href="<?php echo $html->url('/contracts/update_researcher'); ?>">研究者情報一括更新</a></li>
                        <?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>


                <!-- 8.その他補助金 -->
                <?php if($can_grants_index): ?>
                <li><a href="<?php echo $html->url("/grants/index"); ?><?php echo $this->Kendb->nendo(); ?>"><img src="/img/navi10.gif" alt="その他 補助金" width="106" height="42" border="0" onmouseover="this.src='/img/navi10_on.gif'" onmouseout="this.src='/img/navi10.gif'" /></a>
                    <ul>
                        <li><a href="<?php echo $html->url('/grants/index'); ?><?php echo $this->Kendb->nendo(); ?>">一覧</a></li>
                        <?php if($can_grants_add): ?>
                        <li><a href="<?php echo $html->url('/grants/add'); ?>">追加</a></li>
                        <?php endif; ?>
                        <?php if($can_grants_upload): ?>
                        <li><a href="<?php echo $html->url('/grants/upload'); ?>">一括アップロード</a></li>
                        <?php endif; ?>
                        <?php if($can_grants_delete_all): ?>
                        <li><a href="<?php echo $html->url('/grants/delete_all'); ?>">一括削除</a></li>
                        <?php endif; ?>
                        <?php if($can_grants_update_researcher): ?>
                        <li><a href="<?php echo $html->url('/grants/update_researcher'); ?>">研究者情報一括更新</a></li>
                        <?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>

                <!-- 9.共同研究・受託研究資金(民間企業等) -->
                <?php if($can_entrusts_index): ?>
                <li><a href="<?php echo $html->url('/entrusts/index'); ?><?php echo $this->Kendb->nendo(); ?>"><img src="/img/navi06.gif" alt="共同研究・受託研究資金(民間企業等)" width="106" height="42" border="0" onmouseover="this.src='/img/navi06_on.gif'" onmouseout="this.src='/img/navi06.gif'" /></a>
                    <ul>
                        <li><a href="<?php echo $html->url('/entrusts/index'); ?><?php echo $this->Kendb->nendo(); ?>">一覧</a></li>
                        <?php if($can_entrusts_add): ?>
                        <li><a href="<?php echo $html->url('/entrusts/add'); ?>">追加</a></li>
                        <?php endif; ?>
                        <?php if($can_entrusts_upload): ?>
                        <li><a href="<?php echo $html->url('/entrusts/upload'); ?>">一括アップロード</a></li>
                        <?php endif; ?>
                        <?php if($can_entrusts_delete_all): ?>
                        <li><a href="<?php echo $html->url('/entrusts/delete_all'); ?>">一括削除</a></li>
                        <?php endif; ?>
                        <?php if($can_entrusts_update_researcher): ?>
                        <li><a href="<?php echo $html->url('/entrusts/update_researcher'); ?>">研究者情報一括更新</a></li>
                        <?php endif; ?>
                        <?php if($can_entrusts_manage): ?>
                        <li><a href="<?php echo $html->url('/entrusts/manage'); ?>">マスタ管理</a></li>
                        <?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>

                <!-- 10.奨学寄附金 -->
                <?php if($can_donations_index): ?>
                <li><a href="<?php echo $html->url('/donations/index'); ?><?php echo $this->Kendb->nendo(); ?>"><img src="/img/navi07.gif" alt="奨学 寄附金" width="107" height="42" border="0" onmouseover="this.src='/img/navi07_on.gif'" onmouseout="this.src='/img/navi07.gif'" /></a>
                    <ul>
                        <li><a href="<?php echo $html->url('/donations/index'); ?><?php echo $this->Kendb->nendo(); ?>">一覧</a></li>
                        <?php if($can_donations_add): ?>
                        <li><a href="<?php echo $html->url('/donations/add'); ?>">追加</a></li>
                        <?php endif; ?>
                        <?php if($can_donations_upload): ?>
                        <li><a href="<?php echo $html->url('/donations/upload'); ?>">一括アップロード</a></li>
                        <?php endif; ?>
                        <?php if($can_donations_delete_all): ?>
                        <li><a href="<?php echo $html->url('/donations/delete_all'); ?>">一括削除</a></li>
                        <?php endif; ?>
                        <?php if($can_donations_update_researcher): ?>
                        <li><a href="<?php echo $html->url('/donations/update_researcher'); ?>">研究者情報一括更新</a></li>
                        <?php endif; ?>
                        <?php if($can_donations_manage): ?>
                        <li><a href="<?php echo $html->url('/donations/manage'); ?>">マスタ管理</a></li>
                        <?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>

                <?php if($can_researchers_index): ?>
                <li><a href="<?php echo $html->url('/researchers/index'); ?>"><img src="/img/navi90.gif" alt="研究者情報" width="106" height="42" border="0" onmouseover="this.src='/img/navi90_on.gif'" onmouseout="this.src='/img/navi90.gif'" /></a>
                    <ul>
                        <li><a href="<?php echo $html->url('/researchers/index'); ?>">一覧</a></li>
                        <?php if($can_researchers_upload): ?>
                        <li><a href="<?php echo $html->url('/researchers/upload'); ?>">一括アップロード</a></li>
                        <?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>
            </ul>
        <!--/div-->
<?php } ?>


<?php if($this->Session->check('Message')) { ?>
<div id="messagebox">
<?php echo $this->Session->flash(); ?>
<?php echo $this->Session->flash('auth'); ?>
</div>
<?php } ?>

<br clear="all" />

<?php echo $content_for_layout; ?>

<?php

$p = $this->name;
$u = "/help/index.php";
switch($p) {
    case "Adoptions":
        $u .= "?データ/科研費(文科・学振)";
        break;
    case "OtherResearchGrants":
        $u .= "?データ/研究補助金(環境・その他)";
        break;
    case "MhlwResearchGrants":
        $u .= "?データ/科研費(厚生労働)";
        break;
    case "Encourages":
        $u .= "?データ/科研費(特別研究員奨励費)";
        break;
    case "AssessedContributions":
        $u .= "?データ/科研費分担金(文科・学振)";
        break;
    case "Entrusts":
        $u .= "?データ/共同研究・受託研究(民間企業等)";
        break;
    case "Donations":
        $u .= "?データ/奨学寄附金";
        break;
    case "NedoJstOthers":
        $u .= "?データ/受託研究(政府系)";
        break;
    case "Contracts":
        $u .= "?データ/受託事業";
        break;
    case "Researchers":
        $u .= "?データ/研究者情報マスタ";
        break;
    case "Grants":
        $u .= "?データ/その他補助金";
        break;
}

?>

            <br clear="all" />
            <div>
            <ul id="othLink">
<?php if(isset($user_option)): ?>
            <li><a href="<?php echo $html->url($u); ?>" target="_blank">操作マニュアル</a></li>
            <li><a href="/app/webroot/help/index.php?よくある質問" target="_blank">よくある質問</a></li>
<?php endif; ?>
<li><a href="#" onclick="javascript:window.open('/app/webroot/contact.html', '', 'width=300,height=300');">連絡先</a></li>
<?php if(isset($user_option)): ?>
            <li><a href="/app/webroot/files/kanri_120208.pdf" target="_blank">運用・管理要領</a></li>
            <li><a href="/app/webroot/files/shishin_120208.pdf" target="_blank">利用指針</a></li>
<?php endif; ?>
            </ul>
            <div class="fright"><img src="/img/logo.gif" alt="TOKYO TECH" width="127" height="48" /></div>
            </div>


        </div>
        <div id="footer">
        Copyright (c) <?php echo date('Y'); ?> <a href="http://www.titech.ac.jp/">Tokyo Institute of Technology</a>. All right reserved.
        </div>
    </div>
</div>
<?php echo $this->element('sql_dump'); ?>
</body>
</html>
