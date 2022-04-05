<?php

namespace app\modules\admin\controllers;

use app\models\Cars;
use app\modules\admin\models\CarsSearch;
use yii\db\Expression;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * CarsController implements the CRUD actions for Cars model.
 */
class CarsController extends Controller
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

    /**
     * Lists all Cars models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CarsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Cars model.
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
     * Creates a new Cars model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Cars();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $namefile = date("U");
                $model->photo = UploadedFile::getInstance($model, 'photo');
                if ($model->photo) {
                    $namefile = $model->photo->baseName . '_' . $namefile . '.' . $model->photo->extension;
                    $model->photo->saveAs('images/' . $namefile);
                    $model->photo = $namefile;
                }
                $model->created_at = (new Expression('Now()'));
                $model->created_by = \Yii::$app->user->id;
                if ($model->save()) {
                    \Yii::$app->session->setFlash('success', 'Успешно добавлен.');
                } else {
                    \Yii::$app->session->setFlash('warning', 'Не удалось сохранить.');
                }
                return $this->redirect(['index']);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Cars model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post())) {
            $namefile = date("U");
            $model->photo = UploadedFile::getInstance($model, 'photo');
            if ($model->photo) {
                $namefile = $model->photo->baseName . '_' . $namefile . '.' . $model->photo->extension;
                $model->photo->saveAs('images/' . $namefile);
                $model->photo = $namefile;
            }
            $model->created_at = (new Expression('Now()'));
            $model->created_by = \Yii::$app->user->id;
            if ($model->save()) {
                \Yii::$app->session->setFlash('success', 'Успешно добавлен.');
            } else {
                \Yii::$app->session->setFlash('warning', 'Не удалось сохранить.');
            }
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Cars model.
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
     * Finds the Cars model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Cars the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Cars::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
