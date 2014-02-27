<?php
/**
 * @var BackendController $this
 * @var BackendLoginForm $model
 */

$this->pageTitle = Yii::app()->name . ' - Login';
$this->breadcrumbs = ['Login'];
?>
<style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        /**background-color: #f5f5f5;**/
      }

      .form-signin {
        max-width: 320px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }
      </style>


<!-- Login Form BEGIN -->
<div class="form-signin">

<?php
/** @var TbActiveForm $form */
$form = $this->beginWidget(
	'bootstrap.widgets.TbActiveForm',
	array(
		'id' => 'login-form',
		'type'=>'inline',
		'enableClientValidation' => true,
		'htmlOptions' => ['class' => 'well'],
		'clientOptions' => array(
			'validateOnSubmit'=>true,
		),
	)
);

echo CHtml::errorSummary($model, null, null, array('class' => 'alert alert-error'));
?>
<h2 class="form-signin-heading">登入系统</h2>
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?= $form->textFieldRow($model, 'username', array('class'=>'span3','placeholder'=>'用户名'));?>
	<?= $form->passwordFieldRow($model, 'password', array('class'=>'span3','placeholder'=>'密码'));?>
	<?= $form->checkBoxRow($model, 'rememberMe');?>

	<?php if ($model->isCaptchaRequired()): ?>
		<?php $this->widget('CCaptcha'); ?>
		<?= $form->textField($model, 'verifyCode'); ?>
	<?php endif; ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit','type'=>'primary','label'=>'Submit', 'icon'=>'ok'));?>
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset','label'=>'Reset'));?>
	</div>

<?php $this->endWidget(); ?>

</div>
<!-- Login Form END -->
