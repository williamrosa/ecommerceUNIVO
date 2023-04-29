<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\modules\productos\models\Productos $model */

$this->title = $model->id_producto;
$this->params['breadcrumbs'][] = ['label' => 'Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="productos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_producto' => $model->id_producto], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_producto' => $model->id_producto], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_producto',
            'nombre',
            'sku',
            'descripcion:ntext',
            'precio',
            'id_categoria',
            'id_sub_categoria',
            'id_marca',
            'fecha_ing',
            'id_usuario_ing',
            'fecha_mod',
            'id_usuario_mod',
            'estado',
        ],
    ]) ?>

</div>
