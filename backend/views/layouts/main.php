<?php
/**
 * Main layout file for the whole backend.
 * It is based on Twitter Bootstrap classes inside HTML5Boilerplate.
 *
 * @var BackendController $this
 * @var string $content
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?= CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
<!-- NAVIGATION BEGIN -->
<?php $this->renderPartial('//layouts/_navigation');?>
<!-- NAVIGATION END -->

<!-- CONTENT WRAPPER BEGIN -->
<div class="container">
	
</div>
<div class="container">
    <?php if (isset($this->breadcrumbs) && !Yii::app()->user->isGuest): ?>
        <?php $this->widget(
            'bootstrap.widgets.TbBreadcrumbs',
            array(
                'links' => $this->breadcrumbs,
            )
        ); ?>
    <?php endif?>

	<div class="row">
	<?php 
	// Render them all with single `TbAlert`
	$this->widget('bootstrap.widgets.TbAlert', array(
			'block' => true,
			'fade' => true,
			'closeText' => '&times;', // false equals no close link
			'events' => array(),
			'htmlOptions' => array(),
			'userComponentId' => 'user',
			'alerts' => array( // configurations per alert type
					// success, info, warning, error or danger
					'success' => array('closeText' => '&times;'),
					'info', // you don't need to specify full config
					'warning' => array('block' => false, 'closeText' => false),
					'error' => array('block' => false,)
			),
	));
	?>
			<?php if($this->menu):?>
					<div class="span8">
						<!-- CONTENT BEGIN -->
						<?= $content; ?>
				        <!-- CONTENT END -->
					</div>
					
					<div class="span4">
						<?php $this->renderPartial('//layouts/_rightMenu');?>
					</div>
				<?php else:?>
					<?= $content; ?>
					<?php endif;?>
        

    </div>

</div>
<!-- CONTENT WRAPPER END -->
</body>
</html>
