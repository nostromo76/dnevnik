<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use frontend\modules\roditelj\models\Obavestenja;

/* @var $this yii\web\View */
/* @var $model frontend\modules\roditelj\models\ObavestenjaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="obavestenja-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_obavestenja') ?>
    <?= $form->field($model, 'id_odeljenje')->dropDownList(
        ArrayHelper::map(Obavestenja::find()->all(), 'id_obavestenja','naziv'),
        ['prompt' => 'Select obavestenje']
    ) ?>


    <?= $form->field($model, 'naziv') ?>

    <?= $form->field($model, 'opis') ?>

    <?= $form->field($model, 'vreme') ?>

    <?= $form->field($model, 'id_odeljenje') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
