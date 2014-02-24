<?php
/* @var $this SgOrderController */
/* @var $model SgOrder */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sg-order-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'tool'); ?>
		<?php echo $form->textField($model,'tool',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'tool'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_enter'); ?>

		<?php $this->widget('CJuiDateTimePicker',array(
        'model'=>$model, //Model object
        'attribute'=>'date_enter', //attribute name
        'mode'=>'datetime', //use "time","date" or "datetime" (default)
            'options'=>array('dateFormat'=>'yy-mm-dd ',) // jquery plugin options
        ));?>
		<?php echo $form->error($model,'date_enter'); ?>

	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'order_type');
        echo $form->dropDownList($model,'order_type',
            array('buy' => 'buy',
                'sell' => 'sell',
                'buy_limit' => 'buy_limit',
             'sell_limit' => 'sell_limit'));?>
		<?php echo $form->error($model,'order_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'enter_price'); ?>
		<?php echo $form->textField($model,'enter_price',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'enter_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'comment'); ?>
		<?php echo $form->textField($model,'comment',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'comment'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'closed_date'); ?>
        <?php $this->widget('CJuiDateTimePicker',array(
            'model'=>$model, //Model object
            'attribute'=>'closed_date', //attribute name
            'mode'=>'datetime', //use "time","date" or "datetime" (default)
            'options'=>array('dateFormat'=>'yy-mm-dd ',) // jquery plugin options
        ));?>

		<?php echo $form->error($model,'closed_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'closed_price'); ?>
		<?php echo $form->textField($model,'closed_price',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'closed_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'result'); ?>
		<?php echo $form->textField($model,'result'); ?>
		<?php echo $form->error($model,'result'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->