<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Ocena */

$this->title = 'Update Ocena: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Ocena', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_ocena, 'url' => ['view', 'id' => $model->id_ocena]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ocena-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
