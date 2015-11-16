<?php
/**
 * This is a Anax pagecontroller.
 *
 */
require __DIR__.'/config_with_app_CR.php';

$app->url->setUrlType(\Anax\Url\CUrl::URL_CLEAN);
$app->navbar->configure(ANAX_APP_PATH . 'config/navbar_me.php');
$app->theme->configure(ANAX_APP_PATH . 'config/theme-grid.php');

/*
// Scaffolding demo, use anax-scaffold.php to add demo class Scaffold to try it out
$di->set('ScaffoldController', function() use ($di) {
  $controller = new \CR\Scaffold\ScaffoldController();
  $controller->setDI($di);
  return $controller;
});

$app->router->add('scaffold', function() use ($app) {
  $app->dispatcher->forward([
   'controller' => 'scaffold',
   'action'     => 'index',
   ]);
});
*/

 /**
  * Start page
  *
  */
 $app->router->add('', function() use ($app) {
 	$app->theme->setTitle("Om mig");

   $content = $app->fileContent->get('me.md');
   $content = $app->textFilter->doFilter($content, 'shortcode, markdown');
   $aside = $app->fileContent->get('appadv.html');
   $byline = $app->fileContent->get('byline.html');

   $pagecontent = $content . $byline;

   $app->theme->addClassAttributeFor('sidebar-reduced', 'appad');
   $app->views->add('theme/index', ['content' => $pagecontent], 'main-extended');
   $app->views->add('theme/index', ['content' => $aside], 'sidebar-reduced');

   $app->dispatcher->forward([
     'controller' => 'comments',
     'action'     => 'viewPageComments',
     'params'	=> ['start', ''],
     ]);
 });

 /**
  * Reports
  *
  */
 $app->router->add('redovisning', function() use ($app) {
 	$app->theme->setTitle("Redovisning");

 	$content = $app->fileContent->get('redovisning.md');
 	$content = $app->textFilter->doFilter($content, 'shortcode, markdown');
  $byline = $app->fileContent->get('byline.html');
  $pagecontent = $content . $byline;

  $app->views->add('theme/index', ['content' => $pagecontent], 'main-extended');

  $app->dispatcher->forward([
   'controller' => 'comments',
   'action'     => 'viewPageComments',
   'params'	=> ['redovisning', 'redovisning'],
   ]);
});

 /**
 * Dispatch to UsersController and list all users in db
 *
 */
$app->router->add('users-', function() use ($app) {
  $app->dispatcher->forward([
    'controller' => 'users',
    'action' => 'index'
    ]);
});

/**
 * Dispatch to CommentsController and list all users in db
 *
 */
$app->router->add('comments-', function() use ($app) {
  $app->dispatcher->forward([
    'controller' => 'comments',
    'action' => 'index'
    ]);
});

 /**
  * Flash messages demo
  *
  */
 $app->router->add('flash', function() use ($app) {
    $app->theme->addStylesheet('css/flashmsg.css');
    $app->theme->setTitle("Flash messages");

    $text = 'Det här är ett exempel på ett flashmeddelande.';
    $alert = '<span class="flashmsgicon"><i class="fa fa-exclamation-circle fa-2x"></i></span>Alert! ' . $text;
    $error = '<span class="flashmsgicon"><i class="fa fa-times-circle fa-2x"></i></span>Error! ' . $text;
    $success = '<span class="flashmsgicon"><i class="fa fa-check-circle fa-2x"></i></span>Success! ' . $text;
    $info = '<span class="flashmsgicon"><i class="fa fa-info-circle fa-2x"></i></span>Info! ' . $text;
    $notice = '<span class="flashmsgicon"><i class="fa fa-commenting fa-2x"></i></span>Notice! ' . $text;
    $warning = '<span class="flashmsgicon"><i class="fa fa-exclamation-triangle fa-2x"></i></span>Warning! ' . $text;
   
    $app->flashmessage->alert($alert);
    $app->flashmessage->error($error);
    $app->flashmessage->info($info);
    $app->flashmessage->notice($notice);
    $app->flashmessage->success($success);
    $app->flashmessage->warning($warning);

    $app->views->add('theme/index', ['content' => '<h2>Flash-meddelanden</h2>' . $app->flashmessage->outputMsgs()], 'main-extended');

    $app->flashmessage->clearMessages();

});

 /**
  * Dice
  *
  */
 $app->router->add('dice', function() use ($app) {
 	
 	$app->views->add('dice/index');
 	$app->theme->setTitle("Tärning");
 });

 /**
  * Route to roll dice and show results
  *
  */
 $app->router->add('dice/roll', function() use ($app) {
 	$app->theme->addStylesheet('css/dice.css');
 	// Check how many rolls to do
 	$roll = $app->request->getGet('roll', 1);
 	$app->validate->check($roll, ['int', 'range' => [1, 100]])
 	or die("Roll out of bounds");

    // Make roll and prepare reply
 	$dice = new \Mos\Dice\CDice();
 	$dice->roll($roll);

 	$app->views->add('dice/index', [
 		'roll'      => $dice->getNumOfRolls(),
 		'results'   => $dice->getResults(),
 		'total'     => $dice->getTotal(),
 		], 'main');

 	$app->theme->setTitle("Rolled a dice");

 });

 /**
  * Route to Dice 100
  *
  */
 $app->router->add('dice100', function() use ($app) {
 	
 	$app->theme->setTitle("Tärning 100");
 	// Start session
 	$app->session();

  $instruction = $app->fileContent->get('dice100instruction.html');

  if (isset($_SESSION['diceplay'])) {
   $play = $_SESSION['diceplay'];
 } else {
   $play = new \CR\CPlayDice100\CPlayDice100();
   $_SESSION['diceplay'] = $play;
 }

 $app->views->add('theme/index', ['content' => $play->PlayDice100()], 'main-extended');
 $app->views->add('theme/index', ['content' => $instruction], 'sidebar-reduced');

});

 /**
  * Calendar
  *
  */
 $app->router->add('calendar', function() use ($app) {
 	$app->theme->setTitle("Kalender");

 	if (isset($_GET['year']) && isset($_GET['month'])) {
 		$year = $app->request->getGet('year', 1);
 		$month = $app->request->getGet('month', 1);
 		$calendar = new \CR\CCalendar\CCalendar($month, $year);
 	} else {
 		$calendar = new \CR\CCalendar\CCalendar(date("n"), date("Y"));
 	}

  $app->views->add('me/calendar', ['content' => $calendar->showCalendar()], 'fullpage');

});

 /**
  * Source code
  *
  */
 $app->router->add('source', function() use ($app) {
 	$app->theme->setTitle("Källkod");

 	$source = new \Mos\Source\CSource([
 		'secure_dir' => '..',
 		'base_dir' => '..',
 		'add_ignore' => ['.htaccess'],
 		]);

 	$app->views->add('theme/index', [
 		'content' => $source->View(),
 		], 'fullpage');
 });

 $app->router->handle();
 $app->theme->render();
