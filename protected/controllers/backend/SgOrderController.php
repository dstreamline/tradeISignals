<?php

class SgOrderController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

//    public function beforeAction(){
//        Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
//    }

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			//'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','addloss','addprofit'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{

		$model=new SgOrder;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['SgOrder']))
		{
            $model->attributes=$_POST['SgOrder'];
			if($model->save()){
                if(isset($_POST['stoploss']) && $_POST['stoploss']!=""){
                    $loss=new SgLossOrder;
                    $loss->order_id=$model->id;
                    $loss->price=$_POST['stoploss'];
                    $loss->create_date=new CDbExpression('NOW()');
                    $loss->insert();
                }
                if(isset($_POST['takeprofit']) && $_POST['takeprofit']!=""){
                    $loss=new SgProfitOrder();
                    $loss->order_id=$model->id;
                    $loss->price=$_POST['takeprofit'];
                    $loss->create_date=new CDbExpression('NOW()');
                    $loss->insert();
                }
                $this->redirect(array('admin'));
            }

		}




		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['SgOrder']))
		{
			$model->attributes=$_POST['SgOrder'];
			if($model->save())
				$this->redirect(array('admin'));
		}

        $loss=new SgLossOrder();
        $profit=new SgProfitOrder();
		$this->render('update',array(
			'model'=>$model,'loss'=>$loss, 'profit'=>$profit
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{

		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('SgOrder');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new SgOrder('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['SgOrder']))
			$model->attributes=$_GET['SgOrder'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return SgOrder the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=SgOrder::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param SgOrder $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='sg-order-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    public function actionAddloss(){
        $loss=new SgLossOrder;
        $loss->attributes=$_POST['SgLossOrder'];
        $loss->create_date=new CDbExpression('NOW()');
        $loss->insert();
        $this->redirect(array('admin'));
    }
    public function actionAddprofit(){
        $loss=new SgProfitOrder();
        $loss->attributes=$_POST['SgProfitOrder'];

        $loss->create_date=new CDbExpression('NOW()');
        $loss->insert();
        $this->redirect(array('admin'));
    }




}
