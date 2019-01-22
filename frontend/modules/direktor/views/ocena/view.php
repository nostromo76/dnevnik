<?php


/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\direktor\models\OcenaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Prosek';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ocena-index">
    <?php

    foreach($model as $ocene){};
    foreach($predmet as $pre){};


    $chartConfiguration = [
        'dataProvider' => [
            ['title' => $pre['naziv'], 'count' => ($ocene['Prosek']*20)],
            [ 'title' => '', 'count' => (100-($ocene['Prosek']*20))],

        ],
        'type' => 'pie',
        'legend' => [
            'markerType' => 'circle',
            'position' => 'right',
            'marginRight' => 30,
            'autoMargins' => false,
            'labelWidth' => 310,
            'labelText' => '[[title]]',
            'valueText' => '[[value]]',
            //'valueText' => '[[value]] ([[percents]]%)',
            'width' => 390,
        ],
        'maxLabelWidth' => 150,
        'marginLeft' => -100,
        'marginTop' => 0,
        'marginBottom' => 0,
        'labelText' => '[[value]]',
        //'labelText' => '([[percents]]%)',
        'valueField' => 'count',
        'titleField' => 'title',
        'descriptionField' => 'author',
        'balloonText' => '[[title]]<br><span style=\'font-size:12px\'><b>[[value]]</b> ([[percents]]%)</span>',
    ];
    echo mitrm\amcharts\AmChart::widget([
        'chartConfiguration' => $chartConfiguration,
        'options' => ['id' => 'chart_id'],
        'width' => '100%',
        'language' => 'en',
    ]);
    ?>

</div>
