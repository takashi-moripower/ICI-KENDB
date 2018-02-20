<?php
if(!empty($crumbList)){
    echo '<div id="breadcrumbs">';
    $html->_crumbs=array();
	foreach($crumbList as $crumbs){
		$html->addCrumb($crumbs[0],$crumbs[1],$crumbs[2]);
	}
	echo $html->getCrumbs(' &raquo; ',false);
    echo "</div>";
}
?>
