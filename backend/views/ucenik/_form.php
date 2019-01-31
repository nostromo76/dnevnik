<?php


use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Odeljenje;
use backend\models\Roditelj;

/* @var $this yii\web\View */
/* @var $model backend\models\Ucenik */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ucenik-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ime')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'prezime')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_odeljenje')->dropDownList(
        ArrayHelper::map(odeljenje::find()->all(), 'id_odeljenje', 'naziv'),
        ['prompt'=> 'Odaberi Odeljenje']
    ) ?>
    <!-- id_odeljenje textInput -->

    <?= $form->field($model, 'id_roditelj')->dropDownList(
        ArrayHelper::map(roditelj::find()->all(), 'id_roditelj', 'user.username'),
        ['prompt'=> 'Odaberi Roditelja']
    ) ?>
    <!-- id_roditelj textInput -->

    <div class="form-group">
        <?= Html::submitButton('Sačuvaj', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
