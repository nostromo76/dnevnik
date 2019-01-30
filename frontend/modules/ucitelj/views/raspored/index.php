<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\RasporedSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Raspored';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="raspored-index">

    <h2><?= Html::encode($this->title) ?></h2>

    <?php
       if(empty($model)){
            echo '<h4>Trenutno nema rasporeda za vaše odeljenje</h4>';
        } else { ?>

            <?php
                $days = ['Ponedeljak','Utorak','Sreda','Cetvrtak','Petak'];
                $broj = ['1','2','3','4','5'];
                foreach ($days as $modelDays){
                    $day = $modelDays;

                    $array_day[$day] = array_filter($model, function ($element) use ($day) {
                        return ($element['dan'] == $day);
                    });

                    $subjects[$day]= array_column($array_day[$day], 'naziv');

                }
            ?>

            <div class="row">
                <div class="col-sm-1">
                    <h3>Cas</h3>
                    <?php
                    foreach ($broj as $br){
                        echo '<p class = "text-center">'. $br .'</p>';
                    }
                    ?>
                </div>

            <div class="col-sm-11">
              <?php foreach($days as $modelDay){
                        $day = $modelDay;
                        echo '
                        <div class="col-sm-2">
                          <h3>'.$day.'</h3>';
                        foreach($subjects[$day] as $subject){
                         echo' <p>'.$subject.'</p>';
                        }
                        echo '</div>';
              }?>
            </div>
            </div><!-- End of row -->

    <?php } ?>
</div>
