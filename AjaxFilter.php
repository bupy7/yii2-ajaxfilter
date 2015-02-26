<?php

namespace bupy7/ajaxfilter;

use Yii;
use yii\base\Behavior;
use yii\web\Controller;
use yii\web\MethodNotAllowedHttpException;

/*
 * Filter deny or allow access to actions of controllers.
 *
 * public function behaviors()
 * {
 *      return [
 *		    'ajax' => [
 *				'class' => AjaxFilter::className(),
 *				'actions' => [
 *					'actionName' => ['ajax'],
 *				],
 *			],
 *		];
 * }
 * @author Vasilij Belosludcev http://mihaly4.ru
 * @version 0.1.0
 */
class AjaxFilter extends Behavior
{
    
    public $actions;

    public function events()
    {
        return [Controller::EVENT_BEFORE_ACTION => 'beforeAction'];
    }

    public function beforeAction($event)
    {
        if (isset($this->actions[$event->action->id])) {
            if (!Yii::$app->request->isAjax) {
                throw new MethodNotAllowedHttpException('Method Not Allowed. This url can only request via Ajax.');
            }
        }

    }
} 
