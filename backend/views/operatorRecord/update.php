<?php
$this->breadcrumbs=array(
	'Operator Records'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List OperatorRecord','url'=>array('index')),
	array('label'=>'Create OperatorRecord','url'=>array('create')),
	array('label'=>'View OperatorRecord','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage OperatorRecord','url'=>array('admin')),
	);
	?>

	<h1>Update OperatorRecord <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>