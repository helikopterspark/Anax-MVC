<?php
/**
 * This is a Anax pagecontroller.
 *
 */
require __DIR__.'/config_with_app.php';

$app->url->setUrlType(\Anax\Url\CUrl::URL_CLEAN);
$app->navbar->configure(ANAX_APP_PATH . 'config/navbar_me.php');
$app->theme->configure(ANAX_APP_PATH . 'config/theme-grid.php');

/**
 * Comments
 *
 */
$di->set('CommentController', function() use ($di) {
	$controller = new CR\Comment\CommentControllerExtended();
	$controller->setDI($di);
	return $controller;
});

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

 $app->views->add('theme/index', ['content' => $pagecontent], 'main-extended');
 $app->views->add('theme/index', ['content' => $aside], 'sidebar-reduced');

 	$app->dispatcher->forward([
 		'controller' => 'comment',
 		'action'     => 'viewPageComments',
 		'params'	=> ['me-page', ''],
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
 		'controller' => 'comment',
 		'action'     => 'viewPageComments',
 		'params'	=> ['redovisning-page', 'redovisning'],
 		]);
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
 	$app->theme->addStylesheet('css/dice100.css');
 	$app->theme->setTitle("Tärning 100");
 	// Start session
 	$app->session();

 	if (isset($_SESSION['diceplay'])) {
 		$play = $_SESSION['diceplay'];
 	} else {
 		$play = new \CR\CPlayDice100\CPlayDice100();
 		$_SESSION['diceplay'] = $play;
 	}

  $app->views->add('me/dice100', ['dice100play' => $play->PlayDice100()], 'fullpage');

 });

 /**
  * Calendar
  *
  */
 $app->router->add('calendar', function() use ($app) {
 	//$app->theme->addStylesheet('css/calendar.css');
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
 	$app->theme->addStylesheet('css/source.css');
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
