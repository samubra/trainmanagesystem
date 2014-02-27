<?php
$this->breadcrumbs=array(
	'Operator Records'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List OperatorRecord','url'=>array('index')),
array('label'=>'Create OperatorRecord','url'=>array('create')),
array('label'=>'Update OperatorRecord','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete OperatorRecord','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage OperatorRecord','url'=>array('admin')),
);
?>

<h1>View OperatorRecord #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'cid',
		'mid',
		'classid',
		'review_time',
		'next_time',
		'ischange',
		'isnew',
		'charge',
		'remark',
		'create_id',
		'create_time',
		'update_id',
		'update_time',
),
)); ?>
