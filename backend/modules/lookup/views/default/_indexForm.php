
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'lookup-forms',
	'type' => 'horizontal',
	'enableClientValidation'=>true,
	'clientOptions'=> array(
		'validateOnSubmit'=>true,
		'validateOnChange'=>false,
	),
		'htmlOptions'=>array('class'=>'well well-small')
)); ?><fieldset>
 
        <legend><?php 
        	echo $model->isNewrecord?'添加新数据':'修改 '.$model->name;?>
        </legend>
        <hr/>

		<?php echo $form->textFieldRow($model,'type',array('class'=>'span5','disabled'=>(!$model->isNewrecord||isset($_GET['type'])))); ?>
		<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>256)); ?>
		<?php echo $form->textFieldRow($model,'value',array('class'=>'span5','maxlength'=>256)); ?>
		<div class="form-actions">
	        <?php $this->widget(
	            'bootstrap.widgets.TbButton',
	            array(
	                'buttonType' => 'submit',
	                'type' => 'primary',
	                'label' => '保存'
	            )
	        ); ?>
	        <?php $this->widget(
	            'bootstrap.widgets.TbButton',
	            array('buttonType' => 'reset', 'label' => '重置')
	        ); ?>
	    </div>

	
</fieldset>
<?php $this->endWidget(); ?>
