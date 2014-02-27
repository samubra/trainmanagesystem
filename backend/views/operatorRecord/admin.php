<?php
$this->breadcrumbs=array(
	'Operator Records'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List OperatorRecord','url'=>array('index')),
array('label'=>'Create OperatorRecord','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('operator-record-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Manage Operator Records</h1>

<p>
	You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
		&lt;&gt;</b>
	or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'operator-record-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id',
		'cid',
		'mid',
		'classid',
		'review_time',
		'next_time',
		/*
		'ischange',
		'isnew',
		'charge',
		'remark',
		'create_id',
		'create_time',
		'update_id',
		'update_time',
		*/
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
),
),
)); ?>
