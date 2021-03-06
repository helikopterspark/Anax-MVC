<?php
/**
 * Config-file for navigation bar.
 *
 */
return [

    // Use for styling the menu
    'class' => 'navbar',
 
    // Here comes the menu strcture
    'items' => [

        // This is a menu item
        'home'  => [
            'text'  => 'Start',
            'url'   => $this->di->get('url')->create(''),
            'title' => 'Startsida'
        ],

        // This is a menu item
        'redovisning' => [
            'text'  => 'Redovisning',
            'url'   => $this->di->get('url')->create('redovisning'),
            'title' => 'Redovisning'
        ],

        // This is a menu item
        'tema' => [
            'text'  => 'Tema &#9662;',
            'url'   => $this->di->get('url')->create('theme-'),
            'title' => 'Tema',
            'mark-if-parent-of' => 'tema',

            // theme submenu
            'submenu' => [
                'items' => [
                    'theme-regions' => [
                        'text'  => 'Regioner',
                        'url'   => $this->di->get('url')->create('theme-regions'),
                        'title' => 'Regioner'
                    ],
                    'theme-typography'  => [
                        'text'  => 'Typografi',
                        'url'   => $this->di->get('url')->create('theme-typography'),
                        'title' => 'Typografi'
                    ],
                    'theme-font-awesome'  => [
                        'text'  => 'Font Awesome',
                        'url'   => $this->di->get('url')->create('theme-font-awesome'),
                        'title' => 'Font Awesome'
                    ],
                ],
            ],
        ],

        // This is a menu item
        'users' => [
            'text'  => 'Användare',
            'url'   => $this->di->get('url')->create('users-'),
            'title' => 'Användare',
            'mark-if-parent-of' => 'users',
        ],

        // This is a menu item
        'comments' => [
            'text'  => 'Kommentarer',
            'url'   => $this->di->get('url')->create('comments-'),
            'title' => 'Kommentarer',
            'mark-if-parent-of' => 'comments',
        ],

        // This is a menu item
        'flashmsg' => [
            'text'  => 'Meddelanden',
            'url'   => $this->di->get('url')->create('flash'),
            'title' => 'Meddelanden',
            'mark-if-parent-of' => 'flashmsg',
        ],

        // This is a menu item
        'dice' => [
            'text'  => 'Tärning &#9662;',
            'url'   => $this->di->get('url')->create('dice'),
            'title' => 'Dice',
            'mark-if-parent-of' => 'dice',
            
            // Dice 100
            'submenu' => [
                'items' => [
                    'dice100' => [
                        'text'  => 'Tärning 100',
                        'url'   => $this->di->get('url')->create('dice100'),
                        'title' => 'Tärning 100'
                    ],
                ],
            ],
        ],

        // This is a menu item
        'calendar' => [
            'text'  => 'Kalender',
            'url'   => $this->di->get('url')->create('calendar'),
            'title' => 'Kalender'
        ],

        // This is a menu item
        'source' => [
            'text'  => 'Källkod',
            'url'   => $this->di->get('url')->create('source'),
            'title' => 'Källkod'
        ],

        /* 
        // This is a menu item
        'test'  => [
            'text'  => 'Submenu',
            'url'   => $this->di->get('url')->create('submenu'),
            'title' => 'Submenu with url as internal route within this frontcontroller',

            // Here we add the submenu, with some menu items, as part of a existing menu item
            'submenu' => [

                'items' => [

                    // This is a menu item of the submenu
                    'item 0'  => [
                        'text'  => 'Item 0',
                        'url'   => $this->di->get('url')->create('submenu/item-0'),
                        'title' => 'Url as internal route within this frontcontroller'
                    ],

                    // This is a menu item of the submenu
                    'item 2'  => [
                        'text'  => '/humans.txt',
                        'url'   => $this->di->get('url')->asset('/humans.txt'),
                        'title' => 'Url to sitespecific asset',
                        'class' => 'italic'
                    ],

                    // This is a menu item of the submenu
                    'item 3'  => [
                        'text'  => 'humans.txt',
                        'url'   => $this->di->get('url')->asset('humans.txt'),
                        'title' => 'Url to asset relative to frontcontroller',
                    ],
                ],
            ],
        ],
        
        // This is a menu item
        'controller' => [
            'text'  =>'Controller (marked for all descendent actions)',
            'url'   => $this->di->get('url')->create('controller'),
            'title' => 'Url to relative frontcontroller, other file',
            'mark-if-parent-of' => 'controller',
        ],

        // This is a menu item
        'about' => [
            'text'  =>'About',
            'url'   => $this->di->get('url')->create('about'),
            'title' => 'Internal route within this frontcontroller'
        ],
        */
    ],
 


    /**
     * Callback tracing the current selected menu item base on scriptname
     *
     */
    'callback' => function ($url) {
        if ($url == $this->di->get('request')->getCurrentUrl(false)) {
            return true;
        }
    },



    /**
     * Callback to check if current page is a decendant of the menuitem, this check applies for those
     * menuitems that has the setting 'mark-if-parent' set to true.
     *
     */
    'is_parent' => function ($parent) {
        $route = $this->di->get('request')->getRoute();
        return !substr_compare($parent, $route, 0, strlen($parent));
    },



   /**
     * Callback to create the url, if needed, else comment out.
     *
     */
   /*
    'create_url' => function ($url) {
        return $this->di->get('url')->create($url);
    },
    */
];
