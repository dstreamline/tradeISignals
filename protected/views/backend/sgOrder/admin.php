<?php
/* @var $this SgOrderController */
/* @var $model SgOrder */

$this->breadcrumbs=array(
	'Sg Orders'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Добавить ордер', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#sg-order-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>




<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'sg-order-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
    'itemsCssClass'=>'table table-striped table-bordered',
    'rowCssClassExpression' => '( $data->getOrderClass())
    ',
	'columns'=>array(
		'id',
		'tool',
		'date_enter',
		'order_type',
		'enter_price',
		'comment',
        'result',
		/*
		'closed_date',
		'closed_price',
		'result',
		*/
		array(
			'class'=>'CButtonColumn',
            'template'=>'{update}{delete}'
		),
	),
)); ?>
