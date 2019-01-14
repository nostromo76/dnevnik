<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\ucitelj\models\Ucitelj */

$this->title = 'Update Ucitelj: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Uciteljs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_ucitelj, 'url' => ['view', 'id' => $model->id_ucitelj]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ucitelj-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
