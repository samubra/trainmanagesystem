<?php
/* @var $this OperatorMemberController */
/* @var $model OperatorMember */
/* @var $form CActiveForm */
?>
		<?php echo CHtml::hiddenField('step',$step);?>
		<?php if(!$model->isNewRecord){
			echo CHtml::activehiddenField($model,'id');
		}?>
		<?php echo $form->dropDownListRow($model,'ctype',Lookup::items ( Lookup::PASSPORT_CARD_TYPE ),array('disabled' => $step==2)); ?>
		<?php echo $form->textFieldRow($model,'cnum',array('size'=>30,'maxlength'=>30,'disabled' => $step==2)); ?>
		
		
		<?php if ($step==2):?>
		<?php echo $form->dropDownListRow($model,'gender', Lookup::items ( Lookup::GENDER ),array('disabled'=>true)); ?>
		<?php echo $form->textFieldRow($model,'name',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->textFieldRow($model,'mphome'); ?>
		<?php echo $form->textFieldRow($model,'fphone'); ?>
		<?php echo $form->dropDownListRow($model,'edu',Lookup::items(Lookup::OPERATOR_EDU)); ?>
		<?php echo $form->datepickerRow(
            $model,
            'birthday',
            array(
                'options' => array('format' => 'yyyy-mm-dd','language'=>'zh-CN'),
            )
        ); ?>
		<?php echo $form->textFieldRow($model,'address',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->textFieldRow($model,'remark',array('size'=>60,'maxlength'=>200)); ?>
		<?php endif;?>
	
