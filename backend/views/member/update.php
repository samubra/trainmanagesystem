<?php
$this->breadcrumbs=array(
	'Operator Members'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List OperatorMember','url'=>array('index')),
	array('label'=>'Create OperatorMember','url'=>array('create')),
	array('label'=>'View OperatorMember','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage OperatorMember','url'=>array('admin')),
	);
	?>

	<h1>Update OperatorMember <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>