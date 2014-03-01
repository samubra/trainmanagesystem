<?php
$this->breadcrumbs=array(
	'Operator Members'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List OperatorMember','url'=>array('index')),
array('label'=>'Manage OperatorMember','url'=>array('admin')),
);
?>

<h1>Create OperatorMember</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>