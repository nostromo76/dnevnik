<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Predmet */

$this->title = 'Create Predmet';
$this->params['breadcrumbs'][] = ['label' => 'Predmets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="predmet-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
