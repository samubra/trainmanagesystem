<?php
$this->breadcrumbs=array(
	'Operator Members'=>array('index'),
	$model->name,
);

$this->menu=array(
array('label'=>'List OperatorMember','url'=>array('index')),
array('label'=>'Create OperatorMember','url'=>array('create')),
array('label'=>'Update OperatorMember','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete OperatorMember','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage OperatorMember','url'=>array('admin')),
);
?>

<h1>View OperatorMember #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'name',
		'ctype',
		'cnum',
		'mphome',
		'fphone',
		'gender',
		'edu',
		'birthday',
		'address',
		'create_id',
		'create_time',
		'update_id',
		'update_time',
		'remark',
),
)); ?>
