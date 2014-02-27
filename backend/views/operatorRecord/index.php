<?php
$this->breadcrumbs=array(
	'Operator Records',
);

$this->menu=array(
array('label'=>'Create OperatorRecord','url'=>array('create')),
array('label'=>'Manage OperatorRecord','url'=>array('admin')),
);
?>

<h1>Operator Records</h1>

<?php 
var_dump(Lookup::item('passport_card_type','1'));
$this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
