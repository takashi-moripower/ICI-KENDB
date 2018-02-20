<?php echo $this->element("crumbs"); ?>

<div class="entrusts index">
	<h2><?php __('Donations');?></h2>

        <p>
        <ul>
            <li><a href="<?php echo $html->url('/projects/index'); ?>">プロジェクトマスタ</a></li>
            <li><a href="<?php echo $html->url('/obligations/index'); ?>">債主マスタ</a></li>
            <li><a href="<?php echo $html->url('/selectable_items/index/Donation/foreign_money_type'); ?>">外貨種別</a></li>
            <li><a href="<?php echo $html->url('/selectable_items/index/Donation/common_cost_check'); ?>">共通経費有無</a></li>
            <li><a href="<?php echo $html->url('/selectable_items/index/Donation/section_in_charge'); ?>">担当課</a></li>
        </ul>
</div>