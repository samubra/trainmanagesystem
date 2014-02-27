<?php
$this->pageTitle=Yii::app()->name.' - '.Yii::t('LookupModule.ui','Lookup Names');
$this->breadcrumbs=array(
	Yii::t('LookupModule.ui','Lookup Names'),
);
Yii::app()->clientScript->registerScript('search', "
	$('.new-type-button').click(function(){
		$('.new-type-form').toggle();
		return false;
	});
");
$this->headerTitle=Yii::t('LookupModule.ui','Lookup Names');
?>

	<div class="span8">
		<?php if($adminMode!=null):?>
		<div class="well well-small" >
			<fieldset>
        <legend><?php echo $adminMode->getTypeText($adminMode->type); ?></legend>
			<?php
						$this->widget('bootstrap.widgets.TbGridView', array(
						'type'=>'striped bordered condensed',
						'id'=>'lookup-grid',
						'pagerCssClass'=>'pagination pagination-sm m-t-none m-b-none',
						'htmlOptions'=>array('calss'=>'widget-content nopadding'),
						'template'=>"{items}{pager}",
						'dataProvider'=>$adminMode->search(),
						//'enableSorting'=>false,
						'columns'=>array(
							array(
								'name'=>'code',
								//'visible'=>Yii::app()->user->canAccess(8),
								'htmlOptions'=>Array('style'=>'width:40px;')
							),
							array(
								'header'=>Yii::t('LookupModule.ui', 'Name'),
								'name'=>'name',
							),
							array(
								'header'=>Yii::t('LookupModule.ui', 'Value'),
								'name'=>'value',
								'htmlOptions'=>Array('style'=>'width:40px;')
							),
							array(
								'name'=>'position',
								//'visible'=>Yii::app()->user->canAccess(8),
								'htmlOptions'=>Array('style'=>'width:40px;')
							),
							array(
								'htmlOptions'=>array('style'=>'width:120px'),
								'class'=>'CButtonColumn',
								'header'=>'操作',
								'template'=>'{up} {down} {update} {delete}',
								'updateButtonUrl'=>'Yii::app()->controller->createUrl("/lookup/default/index",array("id"=>$data->id))',
								'deleteButtonUrl'=>'Yii::app()->controller->createUrl("/lookup/default/delete",array("id"=>$data->id))',
								'deleteConfirmation'=>Yii::t('LookupModule.ui','Are you sure to delete this item?'),
								'buttons'=>array(
									'delete'=>array(
										'visible'=>'Yii::app()->user->name=="admin"',
									),
									'up'=>array(
										'label'=>Yii::t('LookupModule.ui','Move up'),
										'url'=>'array("move","move"=>"up","id"=>$data->id)',
										'imageUrl'=>$this->getModule()->baseScriptUrl.'/images/up.png',
											
										'click'=>'function() {
											$.fn.yiiGridView.update("lookup-grid", {
												type:"POST",
												url:$(this).attr("href"),
												success:function() {
													$.fn.yiiGridView.update("lookup-grid");
												}
											});
											return false;
										}',
									'visible'=>'$data->position > 1 ? true : false',
									
								),
								'down'=>array(
									'label'=>Yii::t('LookupModule.ui','Move down'),
									'url'=>'array("move","move"=>"down","id"=>$data->id)',
									'imageUrl'=>$this->getModule()->baseScriptUrl.'/images/down.png',
									'click'=>'function() {
											$.fn.yiiGridView.update("lookup-grid", {
												type:"POST",
												url:$(this).attr("href"),
												success:function() {
													$.fn.yiiGridView.update("lookup-grid");
												}
											});
											return false;
										}',
									'visible'=>'$this->grid->dataProvider->itemCount > $data->position ? true : false',
								),
							),
							),
						),
					));
						?>
						</fieldset>
						</div>
						
		<?php endif;?>
		<?php $this->renderPartial('_indexForm',array(
						'model'=>$model,
					)); ?>
	</div>
	<div class="span4">
			<?php $this->widget('bootstrap.widgets.TbMenu', array(
					'items'=>CMap::mergeArray(
							array(
								array(
									'label' => '分类列表',
									'itemOptions' => array('class' => 'nav-header')
										)
							),
							Lookup::model()->menu
						),
					'htmlOptions'=>array('class'=>'nav nav-stacked nav-tabs'),
				)); ?>
		</div>