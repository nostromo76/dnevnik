<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\roditelj\models\Obavestenja */

$this->title = 'Create Obavestenja';
$this->params['breadcrumbs'][] = ['label' => 'Obavestenjas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="obavestenja-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
