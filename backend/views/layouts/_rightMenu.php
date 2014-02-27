<?php
$menu=CMap::mergeArray(
		array(array(
								'label' => '其他操作',
								'itemOptions' => array('class' => 'nav-header')
						)),
		$this->menu
);
$this->widget(
		'bootstrap.widgets.TbMenu',
		array(
				'type' => 'tabs',
				'stacked'=>true,
				'items' => $menu
		)
);