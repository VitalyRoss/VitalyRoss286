<?php

namespace app\backend\moderator;
use Yii;
use yii\filters\AccessControl;
use app\controllers\SiteController;
use yii\web\HttpException;

/**
 * moderator module definition class
 */
class Module extends \yii\base\Module
{
    public $layout = '/moderator';

    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\backend\moderator\controllers';

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access'    =>  [
                'class' =>  AccessControl::className(),
                'denyCallback'  =>  function($rule, $action)
                {
                    throw new HttpException(403 ,'Вам сюда нельзя. Авторизуйтесь как модератор.');
                },
                'rules' =>  [
                    [
                        'allow' =>  true,
                        'matchCallback' =>  function($rule, $action)
                        {   
                            if(Yii::$app->user->isGuest) {
                                return !Yii::$app->user->isGuest;
                            } else {
                                return Yii::$app->user->identity->role->isModerator;
                            }
                        }
                    ]
                ]
            ]
        ];
    }


    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
