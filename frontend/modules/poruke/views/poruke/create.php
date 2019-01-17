<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\poruke\models\Poruke */

$this->title = 'Create Poruke';
$this->params['breadcrumbs'][] = ['label' => 'Porukes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="poruke-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
