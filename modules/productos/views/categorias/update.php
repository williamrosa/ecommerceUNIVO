<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\productos\models\Categorias $model */

$this->title = 'Editar Registros: ' ;
$this->params['breadcrumbs'][] = ['label' => 'Categorias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_categoria, 'url' => ['view', 'id_categoria' => $model->id_categoria]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categorias-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
