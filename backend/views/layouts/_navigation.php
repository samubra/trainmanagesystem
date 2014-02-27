<?php
/**
 * Top menu definition.
 *
 * @var BackendController $this
 */
if(!Yii::app()->user->isGuest):
$this->widget(
    'bootstrap.widgets.TbNavbar',
    array(
        'type' => 'inverse',
        'brand' => Yii::app()->name,
        'brandUrl' => Yii::app()->request->baseUrl,
        'collapse' => true,
        'items' => array(
            array(
                'class' => 'bootstrap.widgets.TbMenu',
                'items' => array(
                    array('label' => '首页', 'url' => array('#')),
                		array(
                				'label' => '特种作业培训',
                				'url' => array('/'),
                				'items' => array(
                						array('label' => '报名管理', 'url' => '/apply/index'),
                						array('label' => '班级管理', 'url' => '#'),
                				)
                		),
                		array(
                				'label' => '安全资格/合格证培训',
                				'url' => array('/'),
                				'items' => array(
                						array('label' => '报名管理', 'url' => '#'),
                						array('label' => '班级管理', 'url' => '#'),
                				)
                		),
                		array(
                				'label' => '微企培训',
                				'url' => array('/'),
                		),
                		array('label' => '分类数据','url' => array('/lookup/default/index')),
                		array(
                				'label' => '注销登陆 (' . Yii::app()->user->name . ')',
                				'url' => array('/site/logout'),
                				'visible' => !Yii::app()->user->isGuest
                		),
                ),
            ),
        ),
    )
);

endif;