<?php
$this->breadcrumbs=array(
	'Operator Members',
);

$this->menu=array(
array('label'=>'Create OperatorMember','url'=>array('create')),
array('label'=>'Manage OperatorMember','url'=>array('admin')),
);
?>

<h1>Operator Members</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
