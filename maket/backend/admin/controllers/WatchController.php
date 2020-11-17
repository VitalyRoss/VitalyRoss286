<?php

namespace app\backend\admin\controllers;

use Yii;
use app\models\Watch;
use app\models\WatchSearch;
use app\models\UploadImage;
use yii\web\UploadedFile;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * WatchController implements the CRUD actions for Watch model.
 */
class WatchController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Watch models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new WatchSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Watch model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Watch model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Watch();
        $uploadImg = new UploadImage();

        if(Yii::$app->request->isPost)
        {
            $uploadImg->img = UploadedFile::getInstance($uploadImg, 'img');
            $uploadImg->upload();
            // сохраняем картинку
            $model->img = $uploadImg->img->baseName.'.'.$uploadImg->img->extension;
        }

        if($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'uploadImg' => $uploadImg
        ]);
    }

    /**
     * Updates an existing Watch model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $uploadImg = new UploadImage();

        if($uploadImg->img != null)
        {
            $uploadImg->img = UploadedFile::getInstance($uploadImg, 'img');
            $uploadImg->upload();
            // сохраняем картинку
            $model->img = $uploadImg->img->baseName.'.'.$uploadImg->img->extension;
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'uploadImg' => $uploadImg
        ]);
    }

    /**
     * Загрузка изображения
     */
    public function actionUpload()
    {
        $model = new UploadImage();
        if(Yii::$app->request->isPost)
        {
            $model->img = UploadedFile::getInstance($model, 'img');
            $model->upload();
            return;
        }
        return $this->render('upload', ['model' => $model]);
    }

    /**
     * Deletes an existing Watch model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Watch model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
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
}
