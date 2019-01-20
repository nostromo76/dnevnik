<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model frontend\modules\poruke\models\Poruke */

/*$this->title = $model->id_poruke;*/
$this->params['breadcrumbs'][] = ['label' => 'Nazad', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="poruke-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php if(Yii::$app->user->identity->role == 4){ ?>
    <?php foreach ($poruke as $poruka): ?>
    <?php if($poruka->od_korisnika == $ucitelj_id->id_ucitelj){ ?>
            <div class="container text-center">
                <h4 style="color: red;"><?= $poruka->ucitelj->user->fullname ?></h4>
                <p>Poruka: <?= $poruka->poruka ?></p>
                <p>Vreme: <?=$poruka->vreme ?></p>
                <p>Poruku poslao: <?=$poruka->od_korisnika ?></p>
            </div>
    <?php } else if($poruka->ka_korisniku == $ucitelj_id->id_ucitelj){ ?>
            <div class="container">
                <h4 style="color: orange;"><?= $poruka->roditelj->user->fullname ?></h4>
                <p>Poruka: <?= $poruka->poruka ?></p>
                <p>Vreme: <?=$poruka->vreme ?></p>
                <p>Poruku poslao: <?=$poruka->od_korisnika ?></p>
            </div>
    <?php } ?>
    <?php endforeach; ?>
    <?php } else if(Yii::$app->user->identity->role == 8){ ?>
        <?php foreach ($porukeRoditelj as $poruka): ?>
            <?php if($poruka->od_korisnika == $roditelj_id->id_roditelj){ ?>
                <div class="container text-center">
                    <h4 style="color: red;"><?= $poruka->ucitelj->user->fullname ?></h4>
                    <p>Poruka: <?= $poruka->poruka ?></p>
                    <p>Vreme: <?=$poruka->vreme ?></p>
                    <p>Poruku poslao: <?=$poruka->od_korisnika ?></p>
                </div>
            <?php } else if($poruka->ka_korisniku == $roditelj_id->id_roditelj){ ?>
                <div class="container">
                    <h4 style="color: orange;"><?= $poruka->roditelj->user->fullname ?></h4>
                    <p>Poruka: <?= $poruka->poruka ?></p>
                    <p>Vreme: <?=$poruka->vreme ?></p>
                    <p>Poruku poslao: <?=$poruka->od_korisnika ?></p>
                </div>
            <?php } ?>
        <?php endforeach; ?>
    <?php } ?>
    <a href="<?=Url::to(['create'])?>">Odgovori</a>
</div>
