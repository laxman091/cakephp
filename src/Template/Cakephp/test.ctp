<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;

$this->layout = false;

if (!Configure::read('debug')) :
    throw new NotFoundException(
        'Please replace src/Template/Pages/home.ctp with your own version or re-enable debug mode.'
    );
endif;

$cakeDescription = 'CakePHP: the rapid development PHP framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>
    </title>

    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
    <?= $this->Html->css('home.css') ?>
    <link href="https://fonts.googleapis.com/css?family=Raleway:500i|Roboto:300,400,700|Roboto+Mono" rel="stylesheet">
</head>
<body class="home">

<header class="row">
    <div class="header-image"><?= $this->Html->image('cake.logo.svg') ?></div>
    <div class="header-title">
        <h1>Welcome to CakePHP <?= Configure::version() ?> Red Velvet. Build fast. Grow solid.</h1>
    </div>
</header>

<div class="row">
    <div class="columns large-12">
        <div class="ctp-warning alert text-center">
            <p>Please be aware that this page will not be shown if you turn off debug mode unless you replace src/Template/Pages/home.ctp with your own version.</p>
        </div>
        <div id="url-rewriting-warning" class="alert url-rewriting">
            <ul>
                <li class="bullet problem">
                    URL rewriting is not properly configured on your server.<br />
                    1) <a target="_blank" href="https://book.cakephp.org/3.0/en/installation.html#url-rewriting">Help me configure it</a><br />
                    2) <a target="_blank" href="https://book.cakephp.org/3.0/en/development/configuration.html#general-configuration">I don't / can't use URL rewriting</a>
                </li>
            </ul>
        </div>
        <?php Debugger::checkSecurityKeys(); ?>
    </div>
</div>

<div class="row">
    <div class="columns large-6">
        <h4>Environment</h4>

		<?php
		
		echo $this->Form->create(null, [
    'url' => 'http://www.google.com/search',
    'type' => 'post'
]);

$selected = array(1);

		
use Cake\ORM\TableRegistry;

$admins = TableRegistry::getTableLocator()->get('admins');

/*$query = $admins->find();

foreach ($query as $row) {
    //echo $row->email;	// working
}*/

echo $this->Form->control('search', ['type' => 'text', 'label' => 'Can include contract title, description and buyer']);

$postcodes = TableRegistry::getTableLocator()->get('postcodes');

$query1111 = $postcodes->find();

foreach ($query1111 as $row) {
    $miles[] = $row->name;
}


echo $this->Form->control('postcode', ['type' => 'text', 'label' => 'Enter Post Code']);

echo $this->Form->input('Within', array('options' => $miles, 'selected' => $selected));

//echo $this->Form->control('field', ['type' => 'file']);



//echo $this->Form->control('All', ['type' => 'radio']);
//echo $this->Form->control('Region', ['type' => 'radio']);
//echo $this->Form->control('Post Code', ['type' => 'radio']);

$regions = TableRegistry::getTableLocator()->get('regions');

$query2 = $regions->find();

foreach ($query2 as $row) {
    //echo $row->name;
	$options[] = $row->name;
}

echo $this->Form->input('Select region(s)', array('multiple' => true, 'options' => $options, 'selected' => $selected));




		
		
		
		?>
		
		
		
		
		
		
		
    </div>
	
    <div class="columns large-6">
        <h4>Filesystem</h4>
<p>Testing</p>
    </div>
    <hr />
</div>

<div class="row">
    <div class="columns large-6">
        <h4>Database</h4>
        <?php
        try {
            $connection = ConnectionManager::get('default');
            $connected = $connection->connect();
        } catch (Exception $connectionError) {
            $connected = false;
            $errorMsg = $connectionError->getMessage();
            if (method_exists($connectionError, 'getAttributes')) :
                $attributes = $connectionError->getAttributes();
                if (isset($errorMsg['message'])) :
                    $errorMsg .= '<br />' . $attributes['message'];
                endif;
            endif;
        }
        ?>
        <ul>
        <?php if ($connected) : ?>
            <li class="bullet success">CakePHP is able to connect to the database.</li>
        <?php else : ?>
            <li class="bullet problem">CakePHP is NOT able to connect to the database.<br /><?= $errorMsg ?></li>
        <?php endif; ?>
        </ul>
    </div>
    <div class="columns large-6">
        <h4>DebugKit</h4>
        <ul>
        <?php if (Plugin::loaded('DebugKit')) : ?>
            <li class="bullet success">DebugKit is loaded.</li>
        <?php else : ?>
            <li class="bullet problem">DebugKit is NOT loaded. You need to either install pdo_sqlite, or define the "debug_kit" connection name.</li>
        <?php endif; ?>
        </ul>
    </div>
    <hr />
</div>







</body>
</html>
