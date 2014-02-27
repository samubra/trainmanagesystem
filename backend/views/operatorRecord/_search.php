<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'id',array('class'=>'span5','maxlength'=>11)); ?>

		<?php echo $form->textFieldRow($model,'cid',array('class'=>'span5','maxlength'=>11)); ?>

		<?php echo $form->textFieldRow($model,'mid',array('class'=>'span5','maxlength'=>11)); ?>

		<?php echo $form->textFieldRow($model,'classid',array('class'=>'span5','maxlength'=>11)); ?>

		<?php echo $form->textFieldRow($model,'review_time',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'next_time',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'ischange',array('class'=>'span5','maxlength'=>1)); ?>

		<?php echo $form->textFieldRow($model,'isnew',array('class'=>'span5','maxlength'=>1)); ?>

		<?php echo $form->textFieldRow($model,'charge',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'remark',array('class'=>'span5','maxlength'=>200)); ?>

		<?php echo $form->textFieldRow($model,'create_id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'create_time',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'update_id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'update_time',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
