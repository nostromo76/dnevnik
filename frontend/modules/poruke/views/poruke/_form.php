<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\modules\poruke\models\Roditelj;
use frontend\modules\poruke\models\User;
use frontend\modules\poruke\models\Ucitelj;

/* @var $this yii\web\View */
/* @var $model frontend\modules\poruke\models\Poruke */
/* @var $form yii\widgets\ActiveForm */


?>

<div class="poruke-form">


    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'poruka')->textarea(['rows' => 6]) ?>
    <?php
        if(Yii::$app->user->identity->role == 4){
           echo  $form->field($model, 'roditelj_id')->dropDownList(ArrayHelper::map(Roditelj::find()->all(),'id_roditelj','user.username'));
        } else if(Yii::$app->user->identity->role == 8){
            //echo $form->field($model, 'ucitelj_id')->dropDownList(ArrayHelper::map(Ucitelj::find()->all(),'id_ucitelj','user.username'));
        } else {
            echo '';
        }
    ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
