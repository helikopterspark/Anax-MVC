<?php
/**
 * Extended class to handle easy change of themes, creation of forms, database service etc.
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

        // Forms service
        $this->set('form', '\Mos\HTMLForm\CForm');

        // Database service for Anax
        $this->setShared('db', function () {
          $db = new \Mos\Database\CDatabaseBasic();
          $db->setOptions(require ANAX_APP_PATH . 'config/config_sqlite.php');
          $db->connect();
          return $db;
        });

        // Users
        $this->set('UsersController', function() {
          $userscontroller = new \Anax\Users\UsersController();
          $userscontroller->setDI($this);
          return $userscontroller;
        });
      }

    }