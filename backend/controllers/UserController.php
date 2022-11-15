<?php

namespace backend\controllers;

use Yii;
use backend\models\User;
use backend\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\Karyawan;
use backend\models\Owner;
use backend\models\Costumer;
use common\models\user as CommonUser;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
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
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
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
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    // public function actionCreate()
    // {
    //     $model = new User();

    //     if ($model->load(Yii::$app->request->post()) && $model->save()) {
    //         return $this->redirect(['view', 'id' => $model->id]);
    //     }

    //     return $this->render('create', [
    //         'model' => $model,
    //     ]);
    // }
    public function actionCreate()
    {
        $model = new User();

        if ($model->load(Yii::$app->request->post())) {
            $user = new \common\models\SignupForm();
            $user->firstname = $model->firstname;
            $user->lastname = $model->lastname;
            $user->username = $model->username;
            $user->email = $model->email;
            $user->password = $model->password;
            $user->level = $model->level;
            if($user = $user->signup()){
                if($model->level=='Costumer'){
                    $Costumer = new Costumer();
                    //$costumer->id;
                    $Costumer->id_user= $user->id;
                    $Costumer->nama = $model->username;
                    $Costumer->telp = null;
                    $costumer->alamat = null;
                    $Costumer->save();
                }
                else if($model->level=='Karyawan'){
                    $Karyawan = new Karyawan();
                    // $Karyawan->id;
                    $Karyawan->id_user= $user->id;
                    $Karyawan->nama = $model->username;
                    $Karyawan->telp = null;
                    $Karyawan->alamat = null;
                    $Karyawan->save();
                }
                else if($model->level=='Owner'){
                    $Owner = new Owner();
                    $Owner->id_user = $user->id;
                    $Owner->nama = $model->username;
                    $Owner->telp = null;
                    $Owner->alamat = null;
                    $Owner->save();
                }
                return $this->redirect(['view', 'id' => $user->id]);
            }
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    // public function actionUpdate($id)
    // {
    //     $model = $this->findModel($id);

    //     if ($model->load(Yii::$app->request->post()) && $model->save()) {
    //         return $this->redirect(['view', 'id' => $model->id]);
    //     }

    //     return $this->render('update', [
    //         'model' => $model,
    //     ]);
    // }
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            if($model->password) {
                $user = CommonUser::findOne($model->id);
                $user->firstname = $model->firstname;
                $user->lastname = $model->lastname;
                $user->username = $model->username;
                $user->password = $model->password;
                $user->email = $model->email;
                $user->level = $model->level;
                $user->setPassword($model->password);
                $user->generateAuthKey();
                if($user->save()){
                    return $this->redirect(['view', 'id' => $user->id]);
                }
                else{
                    if ($model->save()) {
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                }
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }
    /**
     * Deletes an existing User model.
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
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
