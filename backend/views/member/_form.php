<?php
/* @var $this OperatorMemberController */
/* @var $model OperatorMember */
/* @var $form CActiveForm */
?>

<?php /** @var TbActiveForm $form */
$form = $this->beginWidget(
    'bootstrap.widgets.TbActiveForm',
    array(
       'id'=>'operator-member-form',
        'type' => 'horizontal',
    )
); ?>
		<?php echo $form->textFieldRow($model,'name',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->textFieldRow($model,'cnum',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->textFieldRow($model,'mphome'); ?>
		<?php echo $form->textFieldRow($model,'fphone'); ?>
		<?php echo $form->textFieldRow($model,'gender',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->textFieldRow($model,'edu'); ?>
		<?php echo $form->textFieldRow($model,'birthday'); ?>
		<?php echo $form->textFieldRow($model,'address',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->textFieldRow($model,'remark',array('size'=>60,'maxlength'=>200)); ?>
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