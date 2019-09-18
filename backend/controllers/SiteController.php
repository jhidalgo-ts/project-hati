<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use common\models\ForgotForm;
use frontend\models\SignupForm;

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
                        'actions' => ['login', 'error', 'forgot', 'signup'],
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
        return $this->render('index');
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

    public static function armarMenu($matriz){
        $data = array();
        foreach ($matriz as $key => $value){
            $data[] = SiteController::recorro($value);
        }
        return $data;
    }

    public static function recorro($matriz) {
        $data = array();
        foreach ($matriz as $key => $value) {
            if (is_array($value)) {
                $data[$key] = SiteController::recorro($value);
            } else {
                $data[$key] = $value;
                $menu = \mdm\admin\models\Menu::find()->where("name = '" . trim($value) . "'")->one();

                if ($menu['option']) {
                    $data['option'] = ['class' => 'header'];
                } else {
                    $data['icon'] = $menu['icon'];
                }
            }
        }
        $clave = array_key_exists('option', $data);
        if ($clave) {
            foreach ($data as $index => $valor) {
                if ($index == 'url') {
                    unset($data[$index]);
                }
            }
        }
        return $data;
    }

    public static function recursive_replace(&$data, $find, $replace){
        if (is_array($data)) {
            if (!isset($data[RECURSIVE_REPLACE_MARKER])) {
                $data[RECURSIVE_REPLACE_MARKER] = TRUE;
                foreach ($data as $key => $val) {
                    if (is_array($data[$key]) || is_object($data[$key])) {
                        SiteController::recursive_replace($data[$key], $find, $replace);
                    } else {
                        if ($data[$key] === $find) {
                            $data['url'][0] = $replace;
                        }
                    }
                }
                unset($data[RECURSIVE_REPLACE_MARKER]);
            }
        } elseif (is_object($data)) {
            if (!isset($data->RECURSIVE_REPLACE_MARKER)) {
                $data->RECURSIVE_REPLACE_MARKER = TRUE;
                foreach ($data as $key => $val) {
                    if (is_array($data->$key) || is_object($data->$key)) {
                        SiteController::recursive_replace($data->$key, $find, $replace);
                    } else {
                        if ($data->$key === $find) {
                            $data['url'][0] = $replace;
                        }
                    }
                }
                unset($data->RECURSIVE_REPLACE_MARKER);
            }
        }
    }


    public static function armarAcciones(&$matriz){
        $data = \mdm\admin\models\Menu::find()->where("data != ''")->all();
        foreach ($data as $value){
            SiteController::recursive_replace($matriz, $value->name, $value->route . $value->data);
        }
        return $matriz;
    }

    /**
     * forgot action.
     *
     * @return string
     */
    public function actionForgot(){
        $model = new ForgotForm();
        $this->layout = 'main-login';
        return $this->render('forgot',[
            'model' => $model,
        ]);
    }

    public function actionSignup(){
        $model = new SignupForm();
        $this->layout = 'main-login';
        if($model->load(Yii::$app->request->post())){
            if($user = $model->signup()){
                if(Yii::$app->getUser()->login($user)){
                    return $this->render('signup', [
                        'model' => $model,
                    ]);
                }
            }
        }
        return $this->render('signup', [
            'model' => $model
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

    public static function armardata($array, $respuestaclik) {
        $data = [];

        foreach ($respuestaclik as $key => $value) {
            if (array_key_exists($key, $array)) {
                $data[] = intval($array[$key][$key]);
            } else {
                $data[] = 0;
            }
        }
        return $data;
    }
}
