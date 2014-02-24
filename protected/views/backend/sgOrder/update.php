<?php
/* @var $this SgOrderController */
/* @var $model SgOrder */

$this->breadcrumbs=array(
	'Sg Orders'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Create SgOrder', 'url'=>array('create')),
	array('label'=>'Manage SgOrder', 'url'=>array('admin')),
);
?>

<h1>Обновить ордер <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>