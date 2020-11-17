<?php

namespace app\controllers;

use Yii;
use app\models\Watch;
use app\models\Wishlist;
use app\models\WatchSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Comparison;
use app\models\CommentForm;
use app\models\Comment;

/**
 * Каталог  для фронтенда
 */
class CatalogController extends Controller
{
    /**
     * Вывод всех фитнес-трекеров
     * Рендеринг страницы index
     * Сохранение в избранное, если get-параметр id не пустой
     * Лежит именно здесь для корректной работы pjax
     * Pjax обновляет данные в режиме реального времени
     */
    public function actionIndex($id = null)
    {
        
        if(!Yii::$app->user->isGuest)
        {
            $check = Wishlist::findOne(['watch_id' => $id]);
            if($check == null)
            {
                $wish = new Wishlist;
                $wish->watch_id = $id;
                $wish->user_id = Yii::$app->user->identity->id;
                $wish->save();
            } 
        }

        $searchModel = new WatchSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize = 5; // пагинация

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Добавление к сравнению
     */
    public function actionAddToComparison($id = null)
    {
        
        if(!Yii::$app->user->isGuest)
        {
            $check = Comparison::findOne(['watch_id' => $id]);
            if($check == null)
            {
                $comparison = new Comparison;
                $comparison->watch_id = $id;
                $comparison->user_id = Yii::$app->user->identity->id;
                $comparison->save();
            } 
        }

        $searchModel = new WatchSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize = 5; // пагинация

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Вывод всех фитнес-трекеров по следующим параметрам:
     * подсчёт калорий, микрофон, измерение пульса
     * Рендеринг страницы for-running
     */
    public function actionForRunning()
    {
        
        $urlEnd = $this->urlEnd();
        $searchModel = new WatchSearch();
        $searchModel->calories = 1; // подсчёт калорий
        $searchModel->mic = 1; // микрофон, чтобы отвечать во время бега
        $searchModel->pulse = 1; // измерение пульса
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize = 5; // пагинация

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'urlEnd' => $urlEnd
        ]);
    }

     /**
     * Вывод всех фитнес-трекеров по следующим параметрам:
     * влагостойкость, подсчёт калорий, измерение пульса
     * Рендеринг страницы for-swimming
     */
    public function actionForSwimming()
    {
        
        $urlEnd = $this->urlEnd();
        $searchModel = new WatchSearch();
        $searchModel->calories = 1; // подсчёт калорий
        $searchModel->moisture = 1; // влагостойкость
        $searchModel->pulse = 1; // измерение пульса
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize = 5; // пагинация

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'urlEnd' => $urlEnd
        ]);
    }

    /**
     * Подбор для повседневного исользования
     */
    public function actionForDaily()
    {
        
        $urlEnd = $this->urlEnd();
        $searchModel = new WatchSearch();
        $searchModel->nfc = 1; // nfc
        $searchModel->sleep = 1; // фазы сна
        $searchModel->weather = 1; // погода
        $searchModel->charging_id = 1; // зарядка type-c
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize = 5; // пагинация

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'urlEnd' => $urlEnd
        ]);
    }


    /**
     * Страница отдельных часов
     * Также рендерит комментарии и форму для комментариев
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        
        $commentForm = new CommentForm();
        if($commentForm->load(\Yii::$app->request->post()))
        {
            $commentForm->save($id);
        }
        $comments = Comment::find()->where(['watch_id' => $id])->orderBy(['date' => SORT_DESC])->all();

        return $this->render('view', [
            'model' => $this->findModel($id),
            'commentForm' => $commentForm,
            'comments' => $comments
        ]);
    }

    /**
     * Ищет модель по id
     * Если не найдено, то кинет 404
     * @param integer $id
     * @return Watch the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Watch::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Функция, которая возвращает конец url адреса
     * Нужна, например, для того, чтобы при использовании алгоритма подбора (например, "для бега")
     * Выводились соответствующие подсказки пользователю на странице
     */
    public function urlEnd()
    {
        $urlEnd = explode('/', $_SERVER["REQUEST_URI"]);
        return end($urlEnd);
    }

}
