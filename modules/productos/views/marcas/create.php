<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\productos\models\Marcas $model */

$this->title = 'Crear Registro';
$this->params['breadcrumbs'][] = ['label' => 'Listado de marcas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="marcas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
