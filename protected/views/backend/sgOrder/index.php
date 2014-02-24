<?php
/* @var $this SgOrderController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Sg Orders',
);

$this->menu=array(
	array('label'=>'Create SgOrder', 'url'=>array('create')),
	array('label'=>'Manage SgOrder', 'url'=>array('admin')),
);
?>

<h1>Sg Orders</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
