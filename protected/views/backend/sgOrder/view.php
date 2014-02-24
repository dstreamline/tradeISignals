<?php
/* @var $this SgOrderController */
/* @var $model SgOrder */

$this->breadcrumbs=array(
	'Sg Orders'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List SgOrder', 'url'=>array('index')),
	array('label'=>'Create SgOrder', 'url'=>array('create')),
	array('label'=>'Update SgOrder', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SgOrder', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SgOrder', 'url'=>array('admin')),
);
?>

<h1>View SgOrder #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'tool',
		'date_enter',
		'order_type',
		'enter_price',
		'comment',
		'closed_date',
		'closed_price',
		'result',
	),
)); ?>
