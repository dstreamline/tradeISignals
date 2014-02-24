<?php
/* @var $this SgOrderController */
/* @var $model SgOrder */

$this->breadcrumbs=array(
	'Sg Orders'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Список ордеров', 'url'=>array('admin')),
);
?>

<h1>Добавить ордер</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>