<?php
/* @var $this SgOrderController */
/* @var $data SgOrder */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tool')); ?>:</b>
	<?php echo CHtml::encode($data->tool); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_enter')); ?>:</b>
	<?php echo CHtml::encode($data->date_enter); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('order_type')); ?>:</b>
	<?php echo CHtml::encode($data->order_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('enter_price')); ?>:</b>
	<?php echo CHtml::encode($data->enter_price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comment')); ?>:</b>
	<?php echo CHtml::encode($data->comment); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('closed_date')); ?>:</b>
	<?php echo CHtml::encode($data->closed_date); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('closed_price')); ?>:</b>
	<?php echo CHtml::encode($data->closed_price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('result')); ?>:</b>
	<?php echo CHtml::encode($data->result); ?>
	<br />

	*/ ?>

</div>