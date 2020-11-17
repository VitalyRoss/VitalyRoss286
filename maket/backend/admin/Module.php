<?php

namespace app\backend\admin;
use Yii;
use yii\filters\AccessControl;
use app\controllers\SiteController;
use yii\web\HttpException;

/**
 * admin module definition class
 */
class Module extends \yii\base\Module
{
    public $layout = '/admin';

    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\backend\admin\controllers';

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
                    throw new HttpException(403 ,'Вам сюда нельзя. Авторизуйтесь как администратор.');
                },
                'rules' =>  [
                    [
                        'allow' =>  true,
                        'matchCallback' =>  function($rule, $action)
                        {   
                            if(Yii::$app->user->isGuest) {
                                return !Yii::$app->user->isGuest;
                            } else {
                                return Yii::$app->user->identity->role->isAdmin;
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
