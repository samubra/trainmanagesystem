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
<?php /** @var TbActiveForm $form */
$form = $this->beginWidget(
    'bootstrap.widgets.TbActiveForm',
    array(
       'id'=>'operator-member-form',
        'type' => 'horizontal',
    )
); ?>


<?php
echo $this->renderPartial('_form', array('form'=>$form,'model'=>$model,'step'=>$step)); ?>
<div class="form-actions">
        <?php $this->widget(
            'bootstrap.widgets.TbButton',
            array(
                'buttonType' => 'submit',
                'type' => 'primary',
                'label' => 'Submit'
            )
        ); ?>
        <?php $this->widget(
            'bootstrap.widgets.TbButton',
            array('buttonType' => 'reset', 'label' => 'Reset')
        ); ?>
    </div>
<?php $this->endWidget(); ?>