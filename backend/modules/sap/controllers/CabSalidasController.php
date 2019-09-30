<?php

namespace backend\modules\sap\controllers;


use Yii;
use common\models\CabSalidas;
use common\models\search\CabSalidasSearch;
use backend\components\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;
use yii\filters\AccessControl;

/**
 * CabSalidasController implements the CRUD actions for CabSalidas model.
 */
class CabSalidasController extends Controller
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
                    'delete' => ['post'],
                    'bulk-delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all CabSalidas models.
     * @return mixed
     */
    public function actionIndex()
    {    
        $searchModel = new CabSalidasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single CabSalidas model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {   
        $request = Yii::$app->request;
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                    'title'=> "CabSalidas #".$id,
                    'content'=>$this->renderAjax('view', [
                        'model' => $this->findModel($id),
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Edit',['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];    
        }else{
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
    }

    /**
     * Creates a new CabSalidas model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model = new CabSalidas();  

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Create new CabSalidas",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
        
                ];         
            }else if($model->load($request->post()) && $model->save()){
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "Create new CabSalidas",
                    'content'=>'<span class="text-success">Create CabSalidas success</span>',
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Create More',['create'],['class'=>'btn btn-primary','role'=>'modal-remote'])
        
                ];         
            }else{           
                return [
                    'title'=> "Create new CabSalidas",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
        
                ];         
            }
        }else{
            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }
       
    }

    /**
     * Updates an existing CabSalidas model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id);       

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Update CabSalidas #".$id,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
                ];         
            }else if($model->load($request->post()) && $model->save()){
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "CabSalidas #".$id,
                    'content'=>$this->renderAjax('view', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Edit',['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];    
            }else{
                 return [
                    'title'=> "Update CabSalidas #".$id,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
                ];        
            }
        }else{
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
     * Delete an existing CabSalidas model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $request = Yii::$app->request;
        $this->findModel($id)->delete();

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose'=>true,'forceReload'=>'#crud-datatable-pjax'];
        }else{
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }


    }

     /**
     * Delete multiple existing CabSalidas model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionBulkDelete()
    {        
        $request = Yii::$app->request;
        $pks = explode(',', $request->post( 'pks' )); // Array or selected records primary keys
        foreach ( $pks as $pk ) {
            $model = $this->findModel($pk);
            $model->delete();
        }

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose'=>true,'forceReload'=>'#crud-datatable-pjax'];
        }else{
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }
       
    }

    /**
     * Finds the CabSalidas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CabSalidas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CabSalidas::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    //funcion sincronizar para extraer las salidas de mercaderia de sistema sap
    public function actionSincronizar(){
        $request = Yii::$app->request;
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            $id = CabSalidas::find()->max('id');
            if(!$id){
                $ret = $this->cabecera("CALL SBO_CHASKI_PROD19.SP_CH_SALIDAS");
            }else{
                $_numDoc = CabSalidas::find()->where(['id' => $id])->asArray()->one();
                $ret = $this->cabecera("CALL SBO_CHASKI_PROD19.SP_CH_SALIDAS_IN ('" . $_numDoc['docnum'] . "')");
            }
            return [
                'forceReload' => 'true',
                'title' => "Sincronizacion Salidas de Mercderia",
                'content' => $ret,
                'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"])
            ];
        }else{
            return[
                'forceReaload' => 'true',
                'title' => "Sincronizando",
                'content' => '<span class="text-success">Sincronizacion Exitosa</span>',
                'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"])
            ];
        }
    }

    //funcion para grabar en base la cabecera de las salidas
    private function cabecera($query){
        $trans = Yii::$app->dbSap->beginTransaction();
        try{
            $cab = $this->consultaSap($query);
            if(!empty($cab)){
                foreach ($cab as $_reg){
                    $model = new CabSalidas();
                    $model->docnum = $_reg['DocNum'];
                    $model->salidanum = $_reg['U_CHA_NSALIDA'];
                    $model->tiposalida = utf8_encode($_reg['U_CHA_TIPSAL']);
                    $model->fechadocumento = $_reg['DocDate'];
                    $model->solicita = utf8_encode($_reg['U_CHA_SOL_SAL']);
                    $model->aprueba = utf8_encode($_reg['U_CHA_AUT_SAL']);
                    $model->retira = utf8_encode($_reg['U_CHA_RET_SAL']);
                    $model->estado = 0;
                    if($model->save()){
                        $this->detalle($_reg['DocNum']);
                    }
                }
                $trans->commit();
                return '<span class="text-success">Sincronizacion Exitosa</span>';
            }else{
                return '<span class="text-primary">No hay registros que sincronizar</span>';
            }
        }catch (\Exception $ex){
            $trans->rollBack();
            throw  $ex;
        }
    }

    //funcion para extraer el detalle de la base de SAP
    private function detalle($id){
        $query = "CALL SBO_CHASKI_PROD19.SP_CH_SALIDAS_DET ('" . $id . "')";
        $_detalle = $this->consultaSap($query);
        if(!empty($_detalle)){
            foreach ($_detalle as $registro){
                $_model = new \common\models\DetSalidas();
                $_model->cab_id = CabSalidas::find()->asArray()->where(['docnum' => $id])->select('id')->one()['id'];
                $_model->coditem = $registro['ItemCode'];
                $_model->descripcion = utf8_encode($registro['Dscription']);
                $_model->bodega = utf8_encode($registro['WhsCode']);
                $_model->cantidad = $registro['Quantity'];
                $_model->unidad = $registro['UomCode'];
                $_model->piso = utf8_encode($registro['U_CHA_PISO']);
                $_model->observacion = utf8_encode($registro['U_CHA_OBSERVA']);
                $_model->save();
            }
        }
    }


    //funcion para consultar a la base de SAP
    private function consultaSap($query){
        $dns = "sap_server";
        $usuario = "SYSTEM";
        $pass = "B1Admin$";
        $cid = odbc_connect($dns, $usuario, $pass);
        if(!$cid){
            echo "<strong>Ya ocurrido un error tratando de conectarse con el origen de datos.</strong>";
        }else{
            $result = odbc_exec($cid, $query) or die("Error en odbc_exce");
            $items = 0;
            $rs = array();
            while($row = odbc_fetch_array($result)){
                $rs[$items] = $row;
                $items ++;
            }
            return $rs;
        }
    }
}
