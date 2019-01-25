<?php

use yii\db\Migration;

/**
 * Class m190123_145528_init_rbca
 */
class m190123_145528_init_rbca extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;

        // admin privileges

        // user table
        $userIndex = $auth->createPermission('user/index');
        $userIndex->description = 'User index page';
        $auth->add($userIndex);

        $userCreate = $auth->createPermission('user/create');
        $userCreate->description = 'Create new user';
        $auth->add($userCreate);

        $userUpdate = $auth->createPermission('user/update');
        $userUpdate->description = 'Update user';
        $auth->add($userUpdate);

        $userDelete = $auth->createPermission('user/delete');
        $userDelete->description = 'Delete user';
        $auth->add($userDelete);

        // raspored table
        $rasporedIndex = $auth->createPermission('raspored/index');
        $rasporedIndex->description = 'Raspored index page';
        $auth->add($rasporedIndex);

        $rasporedCreate = $auth->createPermission('raspored/create');
        $rasporedCreate->description = 'Create new raspored';
        $auth->add($rasporedCreate);

        $rasporedUpdate = $auth->createPermission('raspored/update');
        $rasporedUpdate->description = 'Update raspored';
        $auth->add($rasporedUpdate);

        $rasporedDelete = $auth->createPermission('raspored/delete');
        $rasporedDelete->description = 'Delete raspored';
        $auth->add($rasporedDelete);

        // predmet table
        $predmetIndex = $auth->createPermission('predmet/index');
        $predmetIndex->description = 'Predmet index page';
        $auth->add($predmetIndex);

        $predmetCreate = $auth->createPermission('predmet/create');
        $predmetCreate->description = 'Create new predmet';
        $auth->add($predmetCreate);

        $predmetUpdate = $auth->createPermission('predmet/update');
        $predmetUpdate->description = 'Update predmet';
        $auth->add($predmetUpdate);

        $predmetDelete = $auth->createPermission('predmet/delete');
        $predmetDelete->description = 'Delete predmet';
        $auth->add($predmetDelete);

        // odeljenje table
        $odeljenjeIndex = $auth->createPermission('odeljenje/index');
        $odeljenjeIndex->description = 'Odeljenje index page';
        $auth->add($odeljenjeIndex);

        $odeljenjeCreate = $auth->createPermission('odeljenje/create');
        $odeljenjeCreate->description = 'Create new odeljenje';
        $auth->add($odeljenjeCreate);

        $odeljenjeUpdate = $auth->createPermission('odeljenje/update');
        $odeljenjeUpdate->description = 'Update odeljenje';
        $auth->add($odeljenjeUpdate);

        $odeljenjeDelete = $auth->createPermission('odeljenje/delete');
        $odeljenjeDelete->description = 'Delete odeljenje';
        $auth->add($odeljenjeDelete);

        // ucenik table

        $ucenikIndex = $auth->createPermission('ucenik/index');
        $ucenikIndex->description = 'Ucenik index page';
        $auth->add($ucenikIndex);

        $ucenikCreate = $auth->createPermission('ucenik/create');
        $ucenikCreate->description = 'Create new ucenik';
        $auth->add($ucenikCreate);

        $ucenikUpdate = $auth->createPermission('ucenik/update');
        $ucenikUpdate->description = 'Update ucenik';
        $auth->add($ucenikUpdate);

        $ucenikDelete = $auth->createPermission('ucenik/delete');
        $ucenikDelete->description = 'Delete ucenik';
        $auth->add($ucenikDelete);

        // roditelj table
        $roditeljIndex = $auth->createPermission('roditelj/index');
        $roditeljIndex->description = 'Roditelj index page';
        $auth->add($roditeljIndex);

        $roditeljCreate = $auth->createPermission('roditelj/create');
        $roditeljCreate->description = 'Create new roditelj';
        $auth->add($roditeljCreate);

        $roditeljUpdate = $auth->createPermission('roditelj/update');
        $roditeljUpdate->description = 'Update roditelj';
        $auth->add($roditeljUpdate);

        $roditeljDelete = $auth->createPermission('roditelj/delete');
        $roditeljDelete->description = 'Delete roditelj';
        $auth->add($roditeljDelete);

        // ucitelj table
        $uciteljIndex = $auth->createPermission('ucitelj/index');
        $uciteljIndex->description = 'Ucitelj index page';
        $auth->add($uciteljIndex);

        $uciteljCreate = $auth->createPermission('ucitelj/create');
        $uciteljCreate->description = 'Create new ucitelj';
        $auth->add($uciteljCreate);

        $uciteljUpdate = $auth->createPermission('ucitelj/update');
        $uciteljUpdate->description = 'Update ucitelj';
        $auth->add($uciteljUpdate);

        $uciteljDelete = $auth->createPermission('ucitelj/delete');
        $uciteljDelete->description = 'Delete ucitelj';
        $auth->add($uciteljDelete);

        // obavestenja table
        $obavestenjaIndex = $auth->createPermission('obavestenja/index');
        $obavestenjaIndex->description = 'Obavestenja index page';
        $auth->add($obavestenjaIndex);

        $obavestenjaCreate = $auth->createPermission('obavestenja/create');
        $obavestenjaCreate->description = 'Create new obavestenja';
        $auth->add($obavestenjaCreate);

        $obavestenjaUpdate = $auth->createPermission('obavestenja/update');
        $obavestenjaUpdate->description = 'Update obavestenja';
        $auth->add($obavestenjaUpdate);

        $obavestenjaDelete = $auth->createPermission('obavestenja/delete');
        $obavestenjaDelete->description = 'Delete obavestenja';
        $auth->add($obavestenjaDelete);

        // admin role

        $admin = $auth->createRole('admin');
        $auth->add($admin);
        // add child for User table
        $auth->addChild($admin, $userIndex);
        $auth->addChild($admin, $userCreate);
        $auth->addChild($admin, $userUpdate);
        $auth->addChild($admin, $userDelete);

        // add child for Raspored table
        $auth->addChild($admin, $rasporedIndex);
        $auth->addChild($admin, $rasporedCreate);
        $auth->addChild($admin, $rasporedUpdate);
        $auth->addChild($admin, $rasporedDelete);

        // add child for Predmet table
        $auth->addChild($admin, $predmetIndex);
        $auth->addChild($admin, $predmetCreate);
        $auth->addChild($admin, $predmetUpdate);
        $auth->addChild($admin, $predmetDelete);

        // add child for Odeljenje table
        $auth->addChild($admin, $odeljenjeIndex);
        $auth->addChild($admin, $odeljenjeCreate);
        $auth->addChild($admin, $odeljenjeUpdate);
        $auth->addChild($admin, $odeljenjeDelete);

        // add child for Ucenik table
        $auth->addChild($admin, $ucenikIndex);
        $auth->addChild($admin, $ucenikCreate);
        $auth->addChild($admin, $ucenikUpdate);
        $auth->addChild($admin, $ucenikDelete);

        // add child for Roditelj table
        $auth->addChild($admin, $roditeljIndex);
        $auth->addChild($admin, $roditeljCreate);
        $auth->addChild($admin, $roditeljUpdate);
        $auth->addChild($admin, $roditeljDelete);

        // add child for Ucitelj table
        $auth->addChild($admin, $uciteljIndex);
        $auth->addChild($admin, $uciteljCreate);
        $auth->addChild($admin, $uciteljUpdate);
        $auth->addChild($admin, $uciteljDelete);

        // add child for Obavestenja table
        $auth->addChild($admin, $obavestenjaIndex);
        $auth->addChild($admin, $obavestenjaCreate);
        $auth->addChild($admin, $obavestenjaUpdate);
        $auth->addChild($admin, $obavestenjaDelete);

        // direktor privileges

        $direktorOcena = $auth->createPermission('direktor/ocena');
        $direktorOcena->description = 'View list of ratings';
        $auth->add($direktorOcena);

        $direktorOcenaView = $auth->createPermission('direktor/ocena/view');
        $direktorOcenaView->description = 'View list of ratings';
        $auth->add($direktorOcenaView);

        $direktorOcenaDirektor = $auth->createPermission('direktor/ocena/direktor');
        $direktorOcenaDirektor->description = 'View list of ratings';
        $auth->add($direktorOcenaDirektor);

        $direktorOcenaDirekto = $auth->createPermission('direktor/ocena/direkto');
        $direktorOcenaDirekto->description = 'View list of ratings';
        $auth->add($direktorOcenaDirekto);

        // direktor role
        $direktor = $auth->createRole('direktor');
        $auth->add($direktor);

        $auth->addChild($direktor, $direktorOcena);
        $auth->addChild($direktor, $direktorOcenaView);
        $auth->addChild($direktor, $direktorOcenaDirektor);
        $auth->addChild($direktor, $direktorOcenaDirekto);

        // ucitelj privileges

        $uciteljRaspored = $auth->createPermission('ucitelj/raspored');
        $uciteljRaspored->description = 'View class schedule';
        $auth->add($uciteljRaspored);

        $uciteljUciteljO = $auth->createPermission('ucitelj/ucitelj-o');
        $uciteljUciteljO->description = 'View notifications';
        $auth->add($uciteljUciteljO);

        $uciteljOdgovorOtvorenaVrata = $auth->createPermission('ucitelj/odgovor/create');
        $uciteljOdgovorOtvorenaVrata->description = 'Response to the request';
        $auth->add($uciteljOdgovorOtvorenaVrata);

        $uciteljPregledOtvorenaVrata = $auth->createPermission('ucitelj/odgovor/view');
        $uciteljPregledOtvorenaVrata->description = 'View message';
        $auth->add($uciteljPregledOtvorenaVrata);

        $uciteljListaOcena = $auth->createPermission('ucitelj/ucitelj');
        $uciteljListaOcena->description = 'Lists of the students grades';
        $auth->add($uciteljListaOcena);

        $uciteljOcenaZaSvakogUcenika = $auth->createPermission('/ucitelj/ucitelj/view');
        $uciteljOcenaZaSvakogUcenika->description = 'List of the student grades';
        $auth->add($uciteljOcenaZaSvakogUcenika);

        $uciteljPoruke = $auth->createPermission('poruke/poruke');
        $uciteljPoruke->description = 'Messages';
        $auth->add($uciteljPoruke);

        $uciteljPorukePregled = $auth->createPermission('poruke/poruke/view');
        $uciteljPorukePregled->description = 'Messages view';
        $auth->add($uciteljPorukePregled);

        $uciteljPorukeOdgovor = $auth->createPermission('poruke/poruke/odgovor');
        $uciteljPorukeOdgovor->description = 'Reply to a message';
        $auth->add($uciteljPorukeOdgovor);

        // ucitelj role
        $ucitelj = $auth->createRole('ucitelj');
        $auth->add($ucitelj);

        $auth->addChild($ucitelj, $uciteljRaspored);
        $auth->addChild($ucitelj, $uciteljUciteljO);
        $auth->addChild($ucitelj, $uciteljOdgovorOtvorenaVrata);
        $auth->addChild($ucitelj, $uciteljPregledOtvorenaVrata);
        $auth->addChild($ucitelj, $uciteljListaOcena);
        $auth->addChild($ucitelj, $uciteljOcenaZaSvakogUcenika);
        $auth->addChild($ucitelj, $uciteljPoruke);
        $auth->addChild($ucitelj, $uciteljPorukePregled);
        $auth->addChild($ucitelj, $uciteljPorukeOdgovor);

        // roditelj privileges

        $roditeljOtvorenaVrata = $auth->createPermission('roditelj/otvorena-vrata');
        $roditeljOtvorenaVrata->description = 'Send a request';
        $auth->add($roditeljOtvorenaVrata);

        $roditeljOdgovor = $auth->createPermission('roditelj/odgovor');
        $roditeljOdgovor->description = 'Response to the request';
        $auth->add($roditeljOdgovor);

        $roditeljPregledPoslatogZahteva = $auth->createPermission('roditelj/otvorena-vrata/view');
        $roditeljPregledPoslatogZahteva->description = 'View a request';
        $auth->add($roditeljPregledPoslatogZahteva);

        $roditeljOcena = $auth->createPermission('roditelj/ocena');
        $roditeljOcena->description = 'List of ratings';
        $auth->add($roditeljOcena);

        $roditeljObavestenja = $auth->createPermission('roditelj/obavestenja');
        $roditeljObavestenja->description = 'Notifications';
        $auth->add($roditeljObavestenja);

        // roditelj role

        $roditelj = $auth->createRole('roditelj');
        $auth->add($roditelj);

        $auth->addChild($roditelj, $roditeljOtvorenaVrata);
        $auth->addChild($roditelj, $roditeljOdgovor);
        $auth->addChild($roditelj, $roditeljPregledPoslatogZahteva);
        $auth->addChild($roditelj, $roditeljOcena);
        $auth->addChild($roditelj, $roditeljObavestenja);
        $auth->addChild($roditelj, $uciteljPoruke);
        $auth->addChild($roditelj, $uciteljPorukePregled);
        $auth->addChild($roditelj, $uciteljPorukeOdgovor);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190123_145528_init_rbca cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190123_145528_init_rbca cannot be reverted.\n";

        return false;
    }
    */
}
