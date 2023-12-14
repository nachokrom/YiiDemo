<?php

namespace app\controllers;

use Yii;
use app\models\Regform;
use app\models\User;
use app\models\Zaya;
use app\models\Status;
use app\models\ZayaCreateForm;
use app\models\ZayaSearch;
use app\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * LkController implements the CRUD actions for User model.
 */
class LkController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    public function beforeAction($action) {
        if (Yii::$app->user->isGuest) {

            $this->redirect(['/site/login']);
            return false;

        }

        return true;
    }

    /**
     * Lists all User models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ZayaSearch();
        $dataProvider = $searchModel->searchForUser($this->request->queryParams, Yii::$app->user->identity->id);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Zaya the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Zaya::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionCreate()
    {
        $model = new ZayaCreateForm();

        if ($this->request->isPost) {
            if ($model->load(Yii::$app->request->post())) {
                $model->user_id = Yii::$app->user->identity->id;
                $model->save(false);
                return $this->redirect(['/lk']);
            }
        }

        $statuses = Status::find()->all();
        $statuses = ArrayHelper::getColumn($statuses, 'name');
        return $this->render('create', [
            'model' => $model,
            'statuses' => $statuses,
        ]);
    }
}
