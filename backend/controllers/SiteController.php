<?php

namespace backend\controllers;

use Yii;
use backend\components\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use common\models\ForgotForm;
use yii\web\BadRequestHttpException;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use common\models\UploadCSVForm;

/**
 * Site controller
 */
class SiteController extends Controller
{

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error', 'modulo', 'signup', 'request-password-reset', 'reset-password', 'perfil'],
                        'allow' => true,
                    ],
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $mensaje = "";
        if((int) Yii::$app->controller->moduloSeleccionado){
            $model = \mdm\admin\models\Menu::findOne(Yii::$app->controller->moduloSeleccionado);
            $vista = strtolower(str_replace(' ','',$model->name));
            switch ($vista){
                case 'sap':
                    return $this->dashboardSap();
                case 'rrhh':
                    return $this->dashboardRrhh();
                case 'obra':
                    return $this->dashboardObra();
                case 'configuracion':
                    return $this->dashboardConfiguracion();
                default:
                    $mensaje = "El modulo [$vista] aun no cuenta con dashboard principal";
                    break;
            }
        }
        return $this->render('index', ['mensaje' => $mensaje]);
    }

    public function actionModulo($id){
        Yii::$app->id = $id;

        $moduloCookie = new \yii\web\Cookie([
            'name' => 'modulo',
            'value' => $id,
            'expire' => time() + 60 * 60 * 24 * 30,
        ]);
        Yii::$app->response->cookies->add($moduloCookie);
        return $this->redirect("index");
    }

    public function dashboardSap(){
        return $this->render('/dashboard/sap');
    }

    public function dashboardRrhh(){
        return $this->render('/dashboard/rrhh');
    }

    public function dashboardObra(){
        return $this->render('/dashboard/obra');
    }

    public function dashboardConfiguracion(){
        return $this->render('/dashboard/administracion');
    }


    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $this->layout = 'main-login';
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup(){
        if(!Yii::$app->user->isGuest){
            return $this->goHome();
        }
        $model = new \frontend\models\SignupForm();
        if($model->load(Yii::$app->request->post())){
            if($user = $model->signup()){
                if(Yii::$app->getUser()->login($user)){
                    Yii::$app->mailer->compose()
                        ->setTo(Yii::$app->params['adminEmail'])
                        ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name. 'roboot'])
                        ->setSubject("Nuevo Usuario Registrado")
                        ->setTextBody("Existe un nuevo usuario registrado y se debe asiganr un perfil")
                        ->send();
                    return $this->goHome();
                }
            }
        }
        $this->layout = 'main-login';
        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset(){
        if(!Yii::$app->user->isGuest){
            return $this->goHome();
        }
        $model = new \frontend\models\PasswordResetRequestForm();
        if($model->load(Yii::$app->request->post()) && $model->validate()){
            if($model->sendEmail()){
                Yii::$app->session->setFlash('success', 'Revise su correo para obtener mas instrucciones.');
                return $this->goHome();
            }else{
                Yii::$app->session->setFlash('error', 'Lo sentimos, no podemos restablecer la contraseña para el correo electronico proporcionado');
            }
        }
        $this->layout = 'main-login';
        return $this->render('requestPasswordResetToken',[
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token){
        try{
            $model = new \frontend\models\ResetPasswordForm($token);
        }catch (InvalidParamException $e){
            throw new BadRequestHttpException($e->getMessage());
        }

        if($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()){
            Yii::$app->session->setFlash('success', 'Se ha guardado la nueva clave');
            return $this->goHome();
        }
        $this->layout = 'main-login';
        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    //metodo para gurdar perfiles
    public function actionPerfil(){
        $user = \common\models\User::findOne(Yii::$app->user->identity->id);
        if(!$user){
            throw new NotFoundHttpException("The user was not found");
        }
        $perfil = \common\models\Perfil::findOne(['user_id' => $user->id]);
        if(!$perfil){
            $perfil = new \common\models\Perfil();
            $perfil->user_id = $user->id;
            $perfil->save();
        }

        if($user->load(Yii::$app->request->post()) && $perfil->load(Yii::$app->request->post())){
            $isValid = $user->validate();
            $isValid = $perfil->validate() && $isValid;
            if($isValid){
                $perfil->foto = UploadedFile::getInstance($perfil, 'foto');
                if($perfil->foto){
                    $dir = Yii::getAlias('@backend') . "/web/img/usuarios/" . $user->id . '.jpg';
                    $perfil->foto->saveAs($dir);
                    $perfil->foto = $user->id . ".jpg";
                }
                $user->save(false);
                $perfil->save(false);
                Yii::$app->session->setFlash('success', 'Sus datos han sido actualizados');
                return $this->goHome();
            }else{
                Yii::$app->session->setFlash('error', 'Lo sentimos no podemos guardar la informacion guardada');
            }
        }
        return $this->render('perfil', [
            'user' => $user,
            'perfil' => $perfil,
        ]);
    }

    public static function limpiar($String) {
        $String = str_replace(array('á', 'à', 'â', 'ã', 'ª', 'ä'), "a", $String);
        $String = str_replace(array('Á', 'À', 'Â', 'Ã', 'Ä'), "A", $String);
        $String = str_replace(array('Í', 'Ì', 'Î', 'Ï'), "I", $String);
        $String = str_replace(array('í', 'ì', 'î', 'ï'), "i", $String);
        $String = str_replace(array('é', 'è', 'ê', 'ë'), "e", $String);
        $String = str_replace(array('É', 'È', 'Ê', 'Ë'), "E", $String);
        $String = str_replace(array('ó', 'ò', 'ô', 'õ', 'ö', 'º'), "o", $String);
        $String = str_replace(array('Ó', 'Ò', 'Ô', 'Õ', 'Ö'), "O", $String);
        $String = str_replace(array('ú', 'ù', 'û', 'ü'), "u", $String);
        $String = str_replace(array('Ú', 'Ù', 'Û', 'Ü'), "U", $String);
        $String = str_replace(array('[', '^', '´', '`', '¨', '~', ']'), "", $String);
        $String = str_replace("ç", "c", $String);
        $String = str_replace("Ç", "C", $String);
        $String = str_replace("ñ", "n", $String);
        $String = str_replace("Ñ", "N", $String);
        $String = str_replace("Ý", "Y", $String);
        $String = str_replace("ý", "y", $String);

        $String = str_replace("&aacute;", "a", $String);
        $String = str_replace("&Aacute;", "A", $String);
        $String = str_replace("&eacute;", "e", $String);
        $String = str_replace("&Eacute;", "E", $String);
        $String = str_replace("&iacute;", "i", $String);
        $String = str_replace("&Iacute;", "I", $String);
        $String = str_replace("&oacute;", "o", $String);
        $String = str_replace("&Oacute;", "O", $String);
        $String = str_replace("&uacute;", "u", $String);
        $String = str_replace("&Uacute;", "U", $String);
        return $String;
    }

    public static function armardata($array, $respuestaclick){
        $data = [];

        foreach ($respuestaclick as $key => $value){
            if(array_key_exists($key, $array)){
                $data[] = intval($array[$key][$key]);
            }else{
                $data[] = 0;
            }
        }
        return $data;
    }
}
