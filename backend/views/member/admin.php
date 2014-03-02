<?php
$this->breadcrumbs = array (
		'Operator Members' => array (
				'index' 
		),
		'Manage' 
);

$this->menu = array (
		array (
				'label' => 'List OperatorMember',
				'url' => array (
						'index' 
				) 
		),
		array (
				'label' => 'Create OperatorMember',
				'url' => array (
						'create' 
				) 
		) 
);

Yii::app ()->clientScript->registerScript ( 'search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('operator-member-grid', {
data: $(this).serialize()
});
return false;
});
" );
?>

<h1>Manage Operator Members</h1>

<p>
	You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>,
	<b>&gt;</b>, <b>&gt;=</b>, <b> &lt;&gt;</b> or <b>=</b>) at the
	beginning of each of your search values to specify how the comparison
	should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display: none">
	<?php
	
$this->renderPartial ( '_search', array (
			'model' => $model 
	) );
	?>
</div>
<!-- search-form -->

<?php

$this->widget ( 'bootstrap.widgets.TbGridView', array (
		'id' => 'operator-member-grid',
'type'=>'condensed',
		'dataProvider' => $model->search (),
		'filter' => $model,
		'columns' => array (
				'id',
				'name',
				array('name'=>'ctype','value'=>'Lookup::item(Lookup::PASSPORT_CARD_TYPE,$data->ctype)'),
				'cnum',
				'mphome',
				'fphone',
				'createUser.username',
				'updateUser.username',
		/*
		'gender',
		'edu',
		'birthday',
		'address',
		'create_id',
		'create_time',
		'update_id',
		'update_time',
		'remark',
		*/
array (
						'class' => 'bootstrap.widgets.TbButtonColumn' 
				) 
		) 
) );
?>
