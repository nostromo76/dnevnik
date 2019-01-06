<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Poruke */

$this->title = 'Update Poruke: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Poruke', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_poruke, 'url' => ['view', 'id' => $model->id_poruke]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="poruke-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
