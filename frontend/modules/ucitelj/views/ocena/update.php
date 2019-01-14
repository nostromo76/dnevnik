<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\ucitelj\models\Ocena */

$this->title = 'Update Ocena: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Ocenas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_ocena, 'url' => ['view', 'id' => $model->id_ocena]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ocena-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
