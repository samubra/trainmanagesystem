<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'id',array('class'=>'span5','maxlength'=>11)); ?>

		<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'ctype',array('class'=>'span5','maxlength'=>11)); ?>

		<?php echo $form->textFieldRow($model,'cnum',array('class'=>'span5','maxlength'=>30)); ?>

		<?php echo $form->textFieldRow($model,'mphome',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'fphone',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'gender',array('class'=>'span5','maxlength'=>1)); ?>

		<?php echo $form->textFieldRow($model,'edu',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'birthday',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'address',array('class'=>'span5','maxlength'=>250)); ?>

		<?php echo $form->textFieldRow($model,'create_id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'create_time',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'update_id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'update_time',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'remark',array('class'=>'span5','maxlength'=>200)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
