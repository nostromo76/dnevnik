<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Predmet */

$this->title = 'Update Predmet: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Predmets', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_predmet, 'url' => ['view', 'id' => $model->id_predmet]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="predmet-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
