<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\ucitelj\models\OtvoreneVrataInsert */

$this->title = 'Update Otvorene Vrata Insert: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Otvorene Vrata Inserts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="otvorene-vrata-insert-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
