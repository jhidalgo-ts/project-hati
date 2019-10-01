<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset;
use johnitvn\ajaxcrud\BulkButtonWidget;

/* @var $this yii\web\View */
/* @var $searchModel \common\models\search\DetSalidasSearch */
/* @var $dataProvider \yii\data\ActiveDataProvider */

$this->title = 'Detalle de Salida de Mercaderia';
$this->params['breadcrumbs'][] = $this->title;
CrudAsset::register($this);
?>

<div class="salida-mercaderia-det-index">
    <div id="ajaxCrudDatatable">
        <?=
        GridView::widget([
            'id' => 'crud-datatable',
            'dataProvider' => $dataProvider,
            'pjax' => true,
            'columns' => require(__DIR__ . '/_columns_det.php'),
            'toolbar' => [
                ['content' =>
                    Html::a('<i class="glyphicon glyphicon-ok"></i>', ['fiscalizado', 'id' => $id], ['role' => 'modal-remote', 'title' => 'Fiscalizado', 'class' => 'btn btn-default']) .
                    //Html::a('<i class="glyphicon glyphicon-envelope"></i>', ['mail'], ['role' => 'modal-remote', 'title' => 'Envio Informe', 'class' => 'btn btn-default']) .
                    //Html::a('<i class="glyphicon glyphicon-repeat"></i>', [''], ['data-pjax' => 1, 'class' => 'btn btn-default', 'title' => 'Actualizar']) .
                    '{toggleData}'
                ],
            ],
            'striped' => true,
            'condensed' => true,
            'responsive' => true,
            'panel' => [
                'type' => 'primary',
                'heading' => '<i class="glyphicon glyphicon-list"></i> Listado Salida de Mercaderia',
            ]
        ])
        ?>
    </div>
</div>
<?php
Modal::begin([
    "id" => "ajaxCrubModal",
    "footer" => "",
])
?>
<?php Modal::end(); ?>