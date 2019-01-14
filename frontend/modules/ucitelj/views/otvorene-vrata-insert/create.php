<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\ucitelj\models\OtvoreneVrataInsert */

$this->title = 'Create Otvorene Vrata Insert';
$this->params['breadcrumbs'][] = ['label' => 'Otvorene Vrata Inserts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="otvorene-vrata-insert-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
