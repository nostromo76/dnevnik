<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Direktor */

$this->title = 'Update Direktor: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Direktor', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_direktor, 'url' => ['view', 'id' => $model->id_direktor]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="direktor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
