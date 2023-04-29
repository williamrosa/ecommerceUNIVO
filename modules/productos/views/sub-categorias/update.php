<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\productos\models\SubCategorias $model */

$this->title = 'Editar registro: ' ;
$this->params['breadcrumbs'][] = ['label' => 'Sub Categorias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detalle', 'url' => ['view','id_dub_categoria' => $model->id_categoria]];
$this->params['breadcrumbs'][] = $this->title;;
?>
<div class="sub-categorias-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
