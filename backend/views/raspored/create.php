<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Raspored */

$this->title = 'Kreiraj Raspored';
$this->params['breadcrumbs'][] = ['label' => 'Raspored', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="raspored-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
