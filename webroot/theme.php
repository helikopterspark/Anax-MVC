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
	$app->theme->setTitle("Tema");

	$content = $app->fileContent->get('theme.md');
	$content = $app->textFilter->doFilter($content, 'shortcode, markdown');

	$app->views->add('theme/index', [
		'content' => $content,     
		]);
});

$app->router->add('theme-regions', function() use ($app) {
 
    $app->theme->addStylesheet('css/anax-grid/regions_demo.css');
    $app->theme->setTitle("Regioner");
 
    $app->views->addString('flash', 'flash')
               ->addString('featured-1', 'featured-1')
               ->addString('featured-2', 'featured-2')
               ->addString('featured-3', 'featured-3')
               ->addString('main', 'main')
               ->addString('sidebar', 'sidebar')
               ->addString('main-extended', 'main-extended')
               ->addString('sidebar-reduced', 'sidebar-reduced')
               ->addString('triptych-1', 'triptych-1')
               ->addString('triptych-2', 'triptych-2')
               ->addString('triptych-3', 'triptych-3')
               ->addString('footer-col-1', 'footer-col-1')
               ->addString('footer-col-2', 'footer-col-2')
               ->addString('footer-col-3', 'footer-col-3')
               ->addString('footer-col-4', 'footer-col-4');
});

$app->router->add('theme-typography', function() use ($app) {

	$app->theme->setTitle("Typografi");
	$content = $app->fileContent->get('typography.html');

	$app->views->add('theme/index', ['content' => $content], 'main');
	$app->views->add('theme/index', ['content' => $content], 'sidebar');
});

$app->router->add('theme-font-awesome', function() use ($app) {
	$app->theme->setTitle("Font Awesome");
	$main = $app->fileContent->get('font-awesome-main.html');
	$sidebar = $app->fileContent->get('font-awesome-sidebar.html');

	$app->views->add('theme/index', ['content' => $main], 'main');
	$app->views->add('theme/index', ['content' => $sidebar], 'sidebar');
});

$app->router->handle();
$app->theme->render();