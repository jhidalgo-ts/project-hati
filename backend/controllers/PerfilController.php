<?php

namespace backend\controllers;

use Yii;
use common\models\Perfil;
use common\models\search\PerfilSearch;
use backend\components\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;
use yii\filters\AccessControl;

/**
 * PerfilController implements the CRUD actions for Perfil model.
 */
class PerfilController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                    'bulk-delete' => ['post'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all Perfil models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new PerfilSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Perfil model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        $request = Yii::$app->request;
        if ($request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'title' => "Resumen del registro #: " . $id,
                'content' => $this->renderAjax('view', [
                    'model' => $this->findModel($id),
                ]),
                'footer' => Html::button('Cerrar', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                    Html::a('Editar', ['update', 'id' => $id], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])
            ];
        } else {
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
    }

    /**
     * Creates a new Perfil model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
//        $request = Yii::$app->request;
//        $model = new Perfil();
//
//        if($request->isAjax){
//            /*
//            *   Process for ajax request
//            */
//            Yii::$app->response->format = Response::FORMAT_JSON;
//            if($request->isGet){
//                return [
//                    'title'=> "Crear Nuevo",
//                    'content'=>$this->renderAjax('create', [
//                        'model' => $model,
//                    ]),
//                    'footer'=> Html::button('Cerrar',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
//                                Html::button('Guardar',['class'=>'btn btn-primary','type'=>"submit"])
//
//                ];
//            }else if($model->load($request->post()) && $model->save()){
//                return [
//                    'forceReload'=>'#crud-datatable-pjax',
//                    'title'=> "Crear Nuevo",
//                    'content'=>'<span class="text-success">Registro creado correctamente</span>',
//                    'footer'=> Html::button('Cerrar',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
//                            Html::a('Crear Otro',['create'],['class'=>'btn btn-primary','role'=>'modal-remote'])
//
//                ];
//            }else{
//                return [
//                    'title'=> "Crear Nuevo",
//                    'content'=>$this->renderAjax('create', [
//                        'model' => $model,
//                    ]),
//                    'footer'=> Html::button('Cerrar',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
//                                Html::button('Guardar',['class'=>'btn btn-primary','type'=>"submit"])
//
//                ];
//            }
//        }else{
//            /*
//            *   Process for non-ajax request
//            */
//            if ($model->load($request->post()) && $model->save()) {
//                return $this->redirect(['view', 'id' => $model->id]);
//            } else {
//                return $this->render('create', [
//                    'model' => $model,
//                ]);
//            }
//        }
    }

    /**
     * Updates an existing Perfil model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $request = Yii::$app->request;
        $model = $this->findModel($id);

        if ($request->isAjax) {
            /*
             *   Process for ajax request
             */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if ($request->isGet) {
                return [
                    'title' => "Editar registro #: " . $id,
                    'content' => $this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Cerrar', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                        Html::button('Guardar', ['class' => 'btn btn-primary', 'type' => "submit"])
                ];
            } else if ($model->load($request->post())) {
                $model->contaBodegaDestinos = implode(',', $model->contaBodegaDestinos);
                if ($model->save()) {
                    return [
                        'forceReload' => '#crud-datatable-pjax',
                        'title' => "Registro editado #: " . $id,
                        'content' => $this->renderAjax('view', [
                            'model' => $model,
                        ]),
                        'footer' => Html::button('Cerrar', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                            Html::a('Editar', ['update', 'id' => $id], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])
                    ];
                }
            } else {
                return [
                    'title' => "Editar registro #: " . $id,
                    'content' => $this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Cerrar', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                        Html::button('Guardar', ['class' => 'btn btn-primary', 'type' => "submit"])
                ];
            }
        } else {
            /*
             *   Process for non-ajax request
             */
            if ($model->load($request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }
    }

    /**
     * Delete an existing Perfil model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $request = Yii::$app->request;
        $this->findModel($id)->delete();

        if ($request->isAjax) {
            /*
             *   Process for ajax request
             */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose' => true, 'forceReload' => '#crud-datatable-pjax'];
        } else {
            /*
             *   Process for non-ajax request
             */
            return $this->redirect(['index']);
        }
    }

    /**
     * Finds the Perfil model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Perfil the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Perfil::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionSync() {
        $users = \common\models\User::find()->all();
        foreach ($users as $user) {
            $perfil = Perfil::findOne(['user_id' => $user->id]);
            if(!$perfil){
                $perfilNew = new Perfil();
                $perfilNew->user_id = $user->id;
                $perfilNew->save();
            }
        }

//        Yii::$app->response->format = Response::FORMAT_JSON;
//        return ['forceClose' => true, 'forceReload' => '#crud-datatable-pjax'];
    }

}
