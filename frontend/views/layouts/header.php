<?php

use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;

?>

<?php
NavBar::begin([
    //'brandLabel' => Yii::$app->name,
    //'brandUrl' => Yii::$app->homeUrl,
    'options' => [
        'class' => 'navbar-inverse navbar-fixed-top',
    ],
]);
$menuItems = [
    ['label' => 'Dir', 'url' => ['/direktor/ocena']],
    ['label' => 'Dir O', 'url' => ['/direktor/ocena/direktor']],
    ['label' => 'Raspored', 'url' => ['/ucitelj/raspored']],
    ['label' => 'Otvorena U', 'url' => ['/ucitelj/ucitelj-o']],
    ['label' => 'Ucitelj', 'url' => ['/ucitelj/ucitelj']],
    ['label' => 'Obavestenja', 'url' => ['/roditelj/obavestenja']],
    ['label' => 'Otvorena R', 'url' => ['/roditelj/otvorena-vrata']],
    ['label' => 'Otvorena R O', 'url' => ['/roditelj/odgovor']],
    ['label' => 'Ocena', 'url' => ['/roditelj/ocena']],
    ['label' => 'Poruke', 'url' => ['/poruke/poruke']]
];
if (Yii::$app->user->isGuest) {
    $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
    $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
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
