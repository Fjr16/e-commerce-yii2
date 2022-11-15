<?php

namespace backend\controllers;

use Yii;
use common\models\Order;
use backend\models\search\OrderSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Product;
use common\models\OrderItem;
use backend\models\FilterModel;

/**
 * OrderController implements the CRUD actions for Order model.
 */
class OrderController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            // 'access' => [
            //     'class' => AccessControl::class,
            //     'rules' => [
            //         [
            //             'actions' => ['index', 'view', 'update',],
            //             'allow' => true,
            //             'roles' => ['@'],
            //         ],
            //     ],
            // ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                ],
            ],
        ];
    }

    /**
     * Lists all Order models.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OrderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Order model.
     *
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
     * Updates an existing Order model.
     * If update is successful, the browser will be redirected to the 'view' page.
     *
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $p = new Product();

        foreach ($model->orderItems as $items){
            $query = Product::find()
            ->alias('p')
            ->andWhere(['p.id' => $items->product_id])
            ->sum('stok');
        }

        $stokk = $query;
        $jlmpesanan = $items->quantity;
        $query = $stokk - $jlmpesanan;
        $update = Product::find()
            ->alias('p')
            ->andWhere(['p.id' => $items->product_id])
            ->one();
        $update->stok=$query;

        if (Yii::$app->request->isPost) {
            $status = Yii::$app->request->post('Order')['status'];
            $model->status = $status;
            if (!in_array($status, [Order::STATUS_COMPLETED, Order::STATUS_PAID, Order::STATUS_SEND, Order::STATUS_DRAFT])) {
                $model->addError('status', 'Invalid Status');
            } 
            else if ($model->save()) {
                if(in_array($status, [Order::STATUS_PAID])){
                    $update->save();
                    return $this->redirect(['view', 'id' => $model->id]);
                }
                return $this->redirect(['view', 'id' => $model->id]);
                
            }
        }
        // echo '<pre>';
                // print_r($update->stok);
                // die();
        return $this->render('update', [
            'model' => $model,
            // 'query' => $query,
        ]);
    }

    public function actionDelete($id){
        $model = $this->findModel($id)->delete();
        return $this->redirect(['index']);

    }

    /**
     * Finds the Order model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param integer $id
     * @return Order the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (( $model = Order::findOne($id) ) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    //cetak laporan transaksi
    public function actionExportPdf()
    {
        if(Yii::$app->user->identity->level == 'Karyawan'){
            $searchModel = new OrderSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            $html = $this->renderPartial('laporan_transaksi',['dataProvider'=>$dataProvider]);
            $mpdf=new \mPDF('c','A4','','' , 0 , 0 , 0 , 0 , 0 , 0);
            $mpdf->SetDisplayMode('fullpage');
            $mpdf->list_indent_first_level = 0; 
            $mpdf->WriteHTML($html);
            $mpdf->Output();
            exit;
            
            return $this->render(['model' => $model]);

        }else if(Yii::$app->user->identity->level == 'Owner'){
            $model = new FilterModel();
            $searchModel = new OrderSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            $post = Yii::$app->request->post();
            if($model->load($post)){
                $html = $this->renderPartial('laporan_transaksi',['dataProvider'=>$dataProvider,'post' => $post]);
                $mpdf=new \mPDF('c','A4','','' , 0 , 0 , 0 , 0 , 0 , 0);
                $mpdf->SetDisplayMode('fullpage');
                $mpdf->list_indent_first_level = 0; // 1 or 0 - whether to indent the first level of a list
                // $mpdf->showImageErrors = true;
                $mpdf->WriteHTML($html);
                $mpdf->Output();
                exit;
                
            }
            return $this->render('filter',[
                'model' => $model,
            ]);
        }
    }

}
