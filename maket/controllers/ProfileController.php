<?php

namespace app\controllers;

use Yii;
use app\models\Wishlist;
use app\models\WishlistSearch;
use app\models\Comparison;
use app\models\ComparisonSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * WishlistController implements the CRUD actions for Wishlist model.
 */
class ProfileController extends Controller
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
     * Список избранного
     */
    public function actionWishlist()
    {
        $searchModel = new WishlistSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('wishlist', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Список сравнения
     */
    public function actionComparison()
    {
        $searchModel = new ComparisonSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        

        $comparison = Comparison::find()->where(['user_id' => Yii::$app->user->identity->id])->all();
        $compares = [];
        foreach($compares as $compare)
        {
            array_push($compare, Watch::findOne(['id' => $compare->watch_id]));
        }

        return $this->render('comparison', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'compares' => $compares,
        ]);
    }

    /**
     * Удаляет из сравнения
     */
    public function actionDeleteFromComparison($id)
    {
        $this->findCompareModel($id)->delete();

        return $this->redirect(['comparison']);
    }



    /**
     * Удаляет из избранного
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['wishlist']);
    }

    /**
     * Finds the Wishlist model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Wishlist the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Wishlist::findOne($id, ['user_id' => Yii::$app->user->identity->id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function findCompareModel($id)
    {
        if (($model = Comparison::findOne($id, ['user_id' => Yii::$app->user->identity->id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
