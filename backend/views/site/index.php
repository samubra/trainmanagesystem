<?php
/**
 * @var BackendSiteController $this
 */
$this->pageTitle=Yii::app()->name;
$this->menu=array(
		array(
				'label' => '首页',
				'url' => '#',
				'itemOptions' => array('class' => 'active')
		),
		array('label' => 'Library', 'url' => '#'),
		array('label' => 'Applications', 'url' => '#'),
		array(
				'label' => 'Another list header',
				'itemOptions' => array('class' => 'nav-header')
		),
		array('label' => 'Profile', 'url' => '#'),
		array('label' => 'Settings', 'url' => '#'),
		'',
		array('label' => 'Help', 'url' => '#'),
);
?>


