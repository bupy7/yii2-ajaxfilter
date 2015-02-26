<?php

namespace bupy7/ajaxfilter;

use Yii;
use yii\base\Behavior;
use yii\web\Controller;
use yii\web\HttpException;

/*
 * Filter deny or allow access to actions of controllers.
 *
 * public function behaviors()
 * {
 *   return [
 *       'ajax' => [
 *           'class' => AjaxFilter::className(),
 *           'actions' => ['actionName', 'actionName2'],
 *       ],
 *   ];
 * }
 * @author Vasilij Belosludcev http://mihaly4.ru
 * @version 0.1.0
 */
class AjaxFilter extends Behavior
{
    
    /**
     * @var array Actions of controller which will be apply this filter.
     */ 
    public $actions;

    public function events()
    {
        return [Controller::EVENT_BEFORE_ACTION => 'beforeAction'];
    }

    public function beforeAction($event)
    {
        if (in_array($event->action->id, $this->actions)) {
            if (!Yii::$app->request->isAjax) {
                throw new HttpException(400, 'This URL can call only via Ajax.');
            }
        }
    }
} 
