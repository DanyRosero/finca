<?php

namespace app\controllers;

use Yii;
use app\models\Trabajo;
use app\models\Search\TrabajoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Empleado;

/**
 * TrabajoController implements the CRUD actions for Trabajo model.
 */
class TrabajoController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Trabajo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TrabajoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Trabajo model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Trabajo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Trabajo();
        $trabajoEmpleados = Empleado::find()->all();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'trabajoEmpleados' => $trabajoEmpleados,
            ]);
        }
    }

    /**
     * Updates an existing Trabajo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $trabajoEmpleado = Empleado::find()->all();
        
        $model->empleado = \yii\helpers\ArrayHelper::getColumn(
                $model->getTrabajoEmpleado()->asArray()->all(), 'id_empleado'
        );
        
        if ($model->load(Yii::$app->request->post())) {
            if (!isset($_POST['Trabajo']['empleado'])) {
                $model->empleado = [];
            }
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
                'trabajoEmpleado' => $trabajoEmpleado
            ]);
        }
    }

    /**
     * Deletes an existing Trabajo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Trabajo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Trabajo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Trabajo::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('Este registro no existe.');
        }
    }
}
