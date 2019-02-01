<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\poruke\models\Poruke */

$this->title = 'Odgovor';
$this->params['breadcrumbs'][] = ['label' => 'Nazad', 'url' => ['index']];

?>
<div class="poruke-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'poruka')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Sačuvaj', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

