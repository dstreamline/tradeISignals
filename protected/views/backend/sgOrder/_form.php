<?php
/* @var $this SgOrderController */
/* @var $model SgOrder */
/* @var $form CActiveForm */
?>



<div class="form">

    <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'sg-order-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    )); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <div class="row show-grid">
        <div class="col-md-12">&nbsp</div>

    </div>

    <div class="row ">
        <?php echo $form->errorSummary($model); ?>

        <div class=" col-md-3">
            <?php echo $form->labelEx($model, 'tool'); ?>
            <?php echo $form->textField($model, 'tool', array('size' => 15, 'maxlength' => 64, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'tool'); ?>
        </div>

        <div class=" col-md-3">
            <?php echo $form->labelEx($model, 'date_enter'); ?>

            <?php $this->widget('CJuiDateTimePicker', array(
                'model' => $model, //Model object
                'attribute' => 'date_enter', //attribute name
                'mode' => 'datetime', //use "time","date" or "datetime" (default)
                'options' => array('dateFormat' => 'yy-mm-dd ',) // jquery plugin options
            ));?>
            <?php echo $form->error($model, 'date_enter'); ?>

        </div>

        <div class=" col-md-3">
            <?php echo $form->labelEx($model, 'order_type');
            echo $form->dropDownList($model, 'order_type',
                array('buy' => 'buy',
                    'sell' => 'sell',
                    'buy_limit' => 'buy_limit',
                    'sell_limit' => 'sell_limit'), array('class' => 'form-control'));?>
            <?php echo $form->error($model, 'order_type'); ?>
        </div>

        <div class=" col-md-3">
            <?php echo $form->labelEx($model, 'enter_price'); ?>
            <?php echo $form->textField($model, 'enter_price', array('size' => 15, 'maxlength' => 15, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'enter_price'); ?>
        </div>
    </div>

    <!--    Лосы и профиты-->
    <div class="row ">
        <div class=" col-md-6">
            <div class="form-group has-error has-feedback">
                <?php if (Yii::app()->controller->action->id == 'create') { ?>
                    <?php echo CHtml::telField('stoploss', '', array('placeholder' => 'Добавить stop LOSS', 'class' => 'form-control')); ?>
                <?php
                } else {
                    echo CHtml::Button('Добавить stop LOSS', array(
                        'onclick' => '$("#mydialog").dialog("open"); return false;',
                        'class' => 'btn btn-primary btn-primary btn-block btn-danger'
                    ));
                }?>
            </div>
        </div>

        <div class=" col-md-6">
            <div class="form-group has-success has-feedback">
                <?php if (Yii::app()->controller->action->id == 'create') { ?>
                    <?php echo CHtml::telField('takeprofit', '', array('placeholder' => 'Добавить stop TakeProfit', 'class' => 'form-control')); ?>
                <?php
                } else {
                    echo CHtml::Button('Добавить take Profit', array(
                        'onclick' => '$("#mydialogProf").dialog("open"); return false;',
                        'class' => 'btn btn-primary btn-primary btn-block  btn-success'
                    ));
                }?>
            </div>
        </div>

        </div>

    <div class="row ">


        <div class=" col-md-6">

            <?php if(isset($loss)){
                $this->widget('zii.widgets.grid.CGridView', array(
                    'dataProvider'=>$loss->search($_GET['id']),
                    'template'=>'{items}',
                    'columns'=>array(
                        'price',
                        'create_date',
                    ),
                ));
            }?>

        </div>


        <div class=" col-md-6">

            <?php if(isset($profit)){
                $this->widget('zii.widgets.grid.CGridView', array(
                    'dataProvider'=>$profit->search($_GET['id']),
                    'template'=>'{items}',
                    'columns'=>array(
                        'price',
                        'create_date',
                    ),
                ));
            }?>

        </div>

    </div>



    <div id="simple-div"></div>

    <div class="row show-grid">

        <div class="row col-md-3">
            <?php echo $form->labelEx($model, 'lotsize'); ?>
            <?php echo $form->textField($model, 'lotsize', array('size' => 15, 'maxlength' => 5, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'lotsize'); ?>

        </div>

        <div class="row col-md-3">
            <?php echo $form->labelEx($model, 'closed_date'); ?>
            <?php $this->widget('CJuiDateTimePicker', array(
                'model' => $model, //Model object
                'attribute' => 'closed_date', //attribute name
                'mode' => 'datetime', //use "time","date" or "datetime" (default)
                'options' => array('dateFormat' => 'yy-mm-dd ',) // jquery plugin options
            ));?>

            <?php echo $form->error($model, 'closed_date'); ?>
        </div>

        <div class="row col-md-3">
            <?php echo $form->labelEx($model, 'closed_price'); ?>
            <?php echo $form->textField($model, 'closed_price', array('size' => 15, 'maxlength' => 15, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'closed_price'); ?>
        </div>

        <div class="row col-md-3">
            <?php echo $form->labelEx($model, 'result'); ?>
            <?php echo $form->textField($model, 'result', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'result'); ?>
        </div>


    </div>

    <div class="row ">
        <div class="row buttons col-md-12">
            <button type="button" class="btn btn-default btn-lg btn-block add-comments">Подробное описание</button>
        </div>
    </div>

    <div class="comment-block" style="display: none">
    <div class="row-md-12" >
        <?php echo $form->labelEx($model, 'comment'); ?>
        <?php $this->widget('application.extensions.tinymce.ETinyMce',
            array(
                'model' => $model,
                'attribute' => 'comment',
                'editorTemplate' => 'full',
                'htmlOptions' => array('rows' => 6, 'cols' => 50, 'class' => 'tinymce'),
            )); ?>
        <?php echo $form->error($model, 'comment'); ?>
    </div>
    </div>
    <div class="row ">
        <div class="row buttons col-md-12">
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-primary btn-lg btn-block')); ?>
        </div>
    </div>



</div>
<?php $this->endWidget(); ?>



<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id' => 'mydialog',
    // additional javascript options for the dialog plugin
    'options' => array(
        'title' => 'Добавить Stop/Loss',
        'autoOpen' => false,
        'modal' => true,
        'resizable' => false
    ),
));

$qForm = new SgLossOrder();
if(isset($_GET['id'])){
    $qForm->order_id=$_GET['id'];
}
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'quick-form',
    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
    'action' => array('sgOrder/addloss'),
));
?>


<?php echo $form->hiddenField($qForm,'order_id'); ?>
<?php echo $form->textField($qForm, 'price', array('size' => 15)); ?>



<?php echo CHtml::submitButton('Добавить'); ?>

<?php
$this->endWidget();
$this->endWidget('zii.widgets.jui.CJuiDialog');
?>

<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id' => 'mydialogProf',
    // additional javascript options for the dialog plugin
    'options' => array(
        'title' => 'Добавить TakeProfit',
        'autoOpen' => false,
        'modal' => true,
        'resizable' => false
    ),
));

$qForm = new SgProfitOrder();
if(isset($_GET['id'])){
    $qForm->order_id=$_GET['id'];
}
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'quick-form',
    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
    'action' => array('sgOrder/addprofit'),
));
?>


<?php echo $form->hiddenField($qForm,'order_id'); ?>
<?php echo $form->textField($qForm, 'price', array('size' => 15)); ?>



<?php echo CHtml::submitButton('Добавить'); ?>

<?php
$this->endWidget();
$this->endWidget('zii.widgets.jui.CJuiDialog');
?>



</div>
<!-- form -->

<script type="text/javascript">
    $( ".add-comments" ).click(function() {

        if($('.comment-block').css('display')=='block'){
            $('.comment-block').fadeOut();
        }
        else{
            $('.comment-block').fadeIn();
            console.log(1);
        }
    });

</script>