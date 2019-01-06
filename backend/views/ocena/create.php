<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Ocena */

$this->title = 'Create Ocena';
$this->params['breadcrumbs'][] = ['label' => 'Ocena', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ocena-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
