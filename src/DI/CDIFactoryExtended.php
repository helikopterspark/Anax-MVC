<?php
/**
 * Extended class to handle easy change of themes.
 */
namespace Anax\DI;

class CDIFactoryExtended extends CDIFactoryDefault
{
       /**
         * Construct.
         *
         */
       public function __construct()
       {
       	parent::__construct();

       	$this->setShared('theme', function () {
       		$themeEngine = new \Anax\ThemeEngine\CThemeExtended();
       		$themeEngine->setDI($this);
       		$themeEngine->configure(ANAX_APP_PATH . 'config/theme.php');
       		return $themeEngine;
       	});
       }
   }