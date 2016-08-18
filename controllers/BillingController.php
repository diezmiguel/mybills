<?php

namespace app\controllers;

use app\models\Category;
use Yii;
use app\models\Bills;
use yii\base\Request;
use yii\data\ActiveDataProvider;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BillingController implements the CRUD actions for Bills model.
 */
class BillingController extends Controller
{
    /**
     * @inheritdoc
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
     * Lists all Bills models.
     * @return mixed
     */
    public function actionIndex()
    {
        $request =  Yii::$app->request;
        $input = array();
        //direction to sort by
        $dir = $request->get('dir','DESC');
        $dir_view = ($dir == 'DESC')?'ASC':'DESC';
        $k = $request->post('k','');
        $class = ($dir_view == 'ASC')?'glyphicon glyphicon-sort-by-alphabet-alt':'glyphicon glyphicon-sort-by-alphabet';
        //column to sort
        $order_by_column = $request->get('col','description');
        $input['k'] = $k;
        $input['col'] = $order_by_column;
        $input['dir'] = $dir;
        $bills =  Bills::getBills($input);
        return $this->render('index', [
            'bills'     => $bills,
            'dir_view'  =>$dir_view,
            'col'       =>$order_by_column,
            'class'     =>$class
        ]);
    }

    /**
     * Displays a single Bills model.
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
     * Creates a new Bills model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Bills();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->Id]);
        } else {
            $categoryModel = Category::find()->all();
            return $this->render('create', [
                'model' => $model,
                'catModel' => $categoryModel
            ]);
        }
    }

    /**
     * Updates an existing Bills model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $categoryModel = Category::find()->all();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect('index');
        } else {
            return $this->render('update', [
                'model' => $model,
                'catModel' => $categoryModel
            ]);
        }
    }

    /**
     * Deletes an existing Bills model.
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
     * Finds the Bills model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Bills the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Bills::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
