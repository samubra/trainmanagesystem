<?php
$this->breadcrumbs=array(
	'Operator Records'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List OperatorRecord','url'=>array('index')),
array('label'=>'Manage OperatorRecord','url'=>array('admin')),
);
?>

<h1>Create OperatorRecord</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>