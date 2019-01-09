<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Raspored */

$this->title = 'Update Raspored: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Rasporeds', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="raspored-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
