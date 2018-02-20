<?php
$fixed_cols = isset($fixed_cols) ? $fixed_cols : 2;
if (@$user_option['grid_type'] == 0) {
	echo $this->element("supertable_js", array("fixed_cols" => $fixed_cols));
} else { 
	echo $this->element("table_style");
}
?>
