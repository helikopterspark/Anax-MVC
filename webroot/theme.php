<?php
/**
 * This is a Anax pagecontroller.
 *
 */

// Get environment & autoloader and the $app-object.
require __DIR__.'/config_with_app.php'; 

$app->url->setUrlType(\Anax\Url\CUrl::URL_CLEAN); 

$app->navbar->configure(ANAX_APP_PATH . 'config/navbar_me.php');
$app->theme->configure(ANAX_APP_PATH . 'config/theme-grid.php');

$app->router->add('theme-', function() use ($app) {

	//$app->theme->addStylesheet('css/anax-grid/grid_background.css');
	$app->theme->setTitle("Tema");

	$flash = $app->fileContent->get('theme-flash.html');
	$featured = $app->fileContent->get('theme-featured.html');
	$main = $app->fileContent->get('theme-main.html');
	$sidebar = $app->fileContent->get('theme-sidebar.html');
	$main_extended = $app->fileContent->get('theme-main-extended.html');
	$sidebar_reduced = $app->fileContent->get('theme-sidebar-reduced.html');
	$fullpage = $app->fileContent->get('theme-fullpage.html');
	$triptych = $app->fileContent->get('theme-triptych.html');
	$footer = $app->fileContent->get('theme-footer.html');

	$app->views->add('theme/region-small', ['content' => $flash], 'flash');

	$app->views->add('theme/region-small', ['content' => $featured], 'featured-1');
	$app->views->add('theme/region-small', ['content' => $featured], 'featured-2');
	$app->views->add('theme/region-small', ['content' => $featured], 'featured-3');

	$app->views->add('theme/index', ['content' => $main], 'main');
	$app->views->add('theme/index', ['content' => $sidebar], 'sidebar');

	$app->views->add('theme/index', ['content' => $main_extended], 'main-extended');
	$app->views->add('theme/index', ['content' => $sidebar_reduced], 'sidebar-reduced');

	$app->views->add('theme/region-small', ['content' => $fullpage], 'fullpage');

	$app->views->add('theme/region-small', ['content' => $triptych], 'triptych-1');
	$app->views->add('theme/region-small', ['content' => $triptych], 'triptych-2');
	$app->views->add('theme/region-small', ['content' => $triptych], 'triptych-3');

	$app->views->add('theme/region-small', ['content' => $footer], 'footer-col-1');
	$app->views->add('theme/region-small', ['content' => $footer], 'footer-col-2');
	$app->views->add('theme/region-small', ['content' => $footer], 'footer-col-3');
	$app->views->add('theme/region-small', ['content' => $footer], 'footer-col-4');
});

$app->router->add('theme-regions', function() use ($app) {
 
    $app->theme->addStylesheet('css/anax-grid/regions_demo.css');
    $app->theme->addStylesheet('css/anax-grid/grid_background.css');
    $app->theme->setTitle("Regioner");
 
    $app->views->addString('flash', 'flash')
               ->addString('featured-1', 'featured-1')
               ->addString('featured-2', 'featured-2')
               ->addString('featured-3', 'featured-3')
               ->addString('main', 'main')
               ->addString('sidebar', 'sidebar')
               ->addString('main-extended', 'main-extended')
               ->addString('sidebar-reduced', 'sidebar-reduced')
               ->addString('fullpage', 'fullpage')
               ->addString('triptych-1', 'triptych-1')
               ->addString('triptych-2', 'triptych-2')
               ->addString('triptych-3', 'triptych-3')
               ->addString('footer-col-1', 'footer-col-1')
               ->addString('footer-col-2', 'footer-col-2')
               ->addString('footer-col-3', 'footer-col-3')
               ->addString('footer-col-4', 'footer-col-4');
});

$app->router->add('theme-typography', function() use ($app) {

	$app->theme->addStylesheet('css/anax-grid/grid_background.css');
	$app->theme->setTitle("Typografi");
	$content = $app->fileContent->get('typography.html');

	$app->views->add('theme/index', ['content' => $content], 'main');
	$app->views->add('theme/index', ['content' => $content], 'sidebar');
});

$app->router->add('theme-font-awesome', function() use ($app) {
	$app->theme->setTitle("Font Awesome");
	$main = $app->fileContent->get('font-awesome-main.html');
	$sidebar = $app->fileContent->get('font-awesome-sidebar.html');

	$app->views->add('theme/index', ['content' => $main], 'main-extended');
	$app->views->add('theme/index', ['content' => $sidebar], 'sidebar-reduced');
});

$app->router->handle();
$app->theme->render();