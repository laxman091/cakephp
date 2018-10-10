<?php
class DATABASE_CONFIG {

    public $default = array(
        'datasource' => 'Database/Mysql',
        'persistent' => false,
        'host' => 'localhost',
        'login' => 'root',
        'password' => '',
        'database' => 'simer169_contractsfinder',
        'prefix' => '',
        //'encoding' => 'utf8',
    );


    public $test = array(
        'datasource' => 'Database/Mysql',
        'persistent' => false,
        'host' => 'localhost',
        'login' => 'root',
        'password' => '',
        'database' => 'cake_test',
        'prefix' => '',
        //'encoding' => 'utf8',

    );

}