<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Obavestenja */

$this->title = 'Update Obavestenja: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Obavestenja', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_obavestenja, 'url' => ['view', 'id' => $model->id_obavestenja]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="obavestenja-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
