<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ctype')); ?>:</b>
	<?php echo CHtml::encode($data->ctype); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cnum')); ?>:</b>
	<?php echo CHtml::encode($data->cnum); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mphome')); ?>:</b>
	<?php echo CHtml::encode($data->mphome); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fphone')); ?>:</b>
	<?php echo CHtml::encode($data->fphone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gender')); ?>:</b>
	<?php echo CHtml::encode($data->gender); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('edu')); ?>:</b>
	<?php echo CHtml::encode($data->edu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('birthday')); ?>:</b>
	<?php echo CHtml::encode($data->birthday); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('address')); ?>:</b>
	<?php echo CHtml::encode($data->address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_id')); ?>:</b>
	<?php echo CHtml::encode($data->create_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_time')); ?>:</b>
	<?php echo CHtml::encode($data->create_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('update_id')); ?>:</b>
	<?php echo CHtml::encode($data->update_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('update_time')); ?>:</b>
	<?php echo CHtml::encode($data->update_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('remark')); ?>:</b>
	<?php echo CHtml::encode($data->remark); ?>
	<br />

	*/ ?>

</div>