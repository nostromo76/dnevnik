<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Raspored */

$this->title = 'Create Raspored';
$this->params['breadcrumbs'][] = ['label' => 'Rasporeds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="raspored-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
