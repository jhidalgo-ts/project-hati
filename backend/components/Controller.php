<?php

namespace backend\components;

use yii;

class Controller extends \yii\web\Controller
{

    //put your code here
    public $modulosSistema = [];
    public $moduloSeleccionado = '';


    public function init()
    {
        if(isset(Yii::$app->request->cookies['modulo']->value)){
            Yii::$app->id = Yii::$app->request->cookies['modulo']->value;
        }
        $this->modulosSistema = $this->cargarModulos();
        $this->modulosSistema = $this->cargarModulos();
        $this->moduloSeleccionado = Yii::$app->id;

    }

    public static function verificarModuloMenu($id){
        $model = \mdm\admin\models\Menu::findOne($id);
        $modulo = $model->name;
        $data = array();

        foreach (self::cargarMenuModulos() as $key => $value) {
            if($value['label'] == $modulo){
                if(isset($value['items'])){
                    $data = self::recorro($value['items']);
                }
            }
        }
        return $data;
    }

    public function cargarModulos(){
        $model = \mdm\admin\models\Menu::find()
            ->where(['parent' => NULL, 'estado' => 1])
            ->orderBy(['order' =>SORT_ASC])
            ->all();
        return $model;
    }

    public static function cargarMenuModulos(){
        if(!Yii::$app->user->isGuest){
            return \mdm\admin\components\MenuHelper::getAssignedMenu(Yii::$app->user->id);
        }
    }

    public static function armarMenu(){
        $data = array();
        if(!(int) Yii::$app->controller->moduloSeleccionado){
            return $data;
        }
        $model = \mdm\admin\models\Menu::findOne(Yii::$app->controller->moduloSeleccionado);
        $modulo = $model->name;

        foreach(self::cargarMenuModulos() as $key =>$value){
            if($value['label'] == $modulo){
                if(isset($value['items'])){
                    $data = self::recorro($value['items']);
                }
            }
        }
        return $data;
    }

    public static function recorro($matriz){
        $data = array();
        foreach ($matriz as $key => $value){
            if(is_array($value)){
                $data[$key] = self::recorro($value);
            } else{
                $data[$key] = $value;
                $menu = \mdm\admin\models\Menu::find()->where("name = '" . trim($value) . "'")->one();

                if($menu['option']){
                    $data['option'] = ['class' => 'header'];
                }else{
                    $data['icon'] = $menu['icon'];
                }
            }
        }
        $clave = array_key_exists('option', $data);
        if($clave){
            foreach ($data as $index => $valor){
                if($index == 'url'){
                    unset($data[$index]);
                }
            }
        }
        return $data;
    }

    public static function recursive_replace(&$data, $find, $replace){
        if (is_array($data)){
            if(!isset($data[RECURSIVE_REPLACE_MARKER])){
                $data[RECURSIVE_REPLACE_MARKER] = true;
                foreach ($data as $key => $val){
                    if(is_array($data[$key]) || is_object($data[$key])){
                        self::recursive_replace($data[$key], $find, $replace);
                    }else{
                        if($data[$key] === $find){
                            $data['url'][0] = $replace;
                        }
                    }
                }
                unset ($data[RECURSIVE_REPLACE_MARKER]);
            }
        }else if(is_object($data)){
            if(!isset($data->RECURSIVE_REPLACE_MARKER)){
                $data->RECURSIVE_REPLACE_MARKER = TRUE;
                foreach ($data as $key => $val){
                    if(is_array($data->$key) || is_object($data->$key)){
                        self::recursive_replace($data->$key, $find, $replace);
                    }else{
                        if($data->$key === $find){
                            $data['url'][0] = $replace;
                        }
                    }
                }
                unset($data->RECURSIVE_REPLACE_MARKER);
            }
        }
    }

    public static function armarAcciones(&$matriz) {
        $data = \mdm\admin\models\Menu::find()->where("data != ''")->all();
        foreach ($data as $value) {
            self::recursive_replace($matriz, $value->name, $value->route . $value->data);
        }
        return $matriz;
    }
}