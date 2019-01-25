<?php

use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;

?>

<?php
NavBar::begin([
    'options' => [
        'class' => 'navbar-inverse navbar-fixed-top',
    ],
]);

if(!Yii::$app->user->isGuest){
$rola = Yii::$app->user->identity->role;
switch ($rola){
    case 2:
        $menuItems = [
            ['label' => 'Dir', 'url' => ['/direktor/ocena']],
            ['label' => 'Dir O', 'url' => ['/direktor/ocena/direktor']],
        ];
        break;
    case 4:
        $menuItems = [
            ['label' => 'Raspored', 'url' => ['/ucitelj/raspored']],
            ['label' => 'Otvorena Vrata', 'url' => ['/ucitelj/ucitelj-o']],
            ['label' => 'Ocene učenika', 'url' => ['/ucitelj/ucitelj']],
            ['label' => 'Poruke', 'url' => ['/poruke/poruke']]
        ];
        break;
    case 8:
        $menuItems = [
            ['label' => 'Obaveštenja', 'url' => ['/roditelj/obavestenja']],
            ['label' => 'Otvorena vrata', 'url' => ['/roditelj/otvorena-vrata']],
            ['label' => 'Otvorena vrata obaveštenje', 'url' => ['/roditelj/odgovor']],
            ['label' => 'Ocene', 'url' => ['/roditelj/ocena']],
            ['label' => 'Poruke', 'url' => ['/poruke/poruke']]
        ];
        break;
    }
}

if (Yii::$app->user->isGuest) {
    $menuItems[] = ['label' => 'Prijavi se', 'url' => ['/site/login']];
} else {
    $menuItems[] = '<li>'
        . Html::beginForm(['/site/logout'], 'post')
        . Html::submitButton(
            'Odjavi se (' . Yii::$app->user->identity->username . ')',
            ['class' => 'btn btn-link logout']
        )
        . Html::endForm()
        . '</li>';
}
echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-right'],
    'items' => $menuItems,
]);
NavBar::end();
?>
