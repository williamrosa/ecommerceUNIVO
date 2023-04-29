<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\productos\models\Marcas $model */

$this->title = 'Editar Registro:' ;
$this->params['breadcrumbs'][] = ['label' => 'Listado de Marcas', 'url' =>
['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detalle', 'url' => ['view', 'id_marca' => 
$model->id_marca]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="marcas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
