<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();

    public function beforeAction($action)
    {
        if (parent::beforeAction($action)) {
            /* @var $cs CClientScript */
            $baseUrl = Yii::app()->baseUrl;
            $cs = Yii::app()->getClientScript();

            /* @var $baseUrl$theme CTheme */
            $theme = Yii::app()->theme;
            $cs->registerCssFile($baseUrl . '/themes/bootstrap/css/bootstrap.css');
            $cs->registerCssFile($baseUrl . '/themes/bootstrap/css/bootstrap-theme.css');
            $cs->registerScriptFile($baseUrl . '/themes/bootstrap/js/jquery.js');
            $cs->registerScriptFile($baseUrl . '/themes/bootstrap/js/bootstrap-transition.js');
            $cs->registerScriptFile($baseUrl . '/themes/bootstrap/js/bootstrap-modal.js');
            $cs->registerScriptFile($baseUrl . '/themes/bootstrap/js/bootstrap.js');
            return true;
        }
        return false;
    }
}