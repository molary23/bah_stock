<?php

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
defined('SITE_ROOT') ? null : define('SITE_ROOT', DS . 'Applications' . DS . 'XAMPP' . DS . 'htdocs' . DS . 'stock');
defined('INC_DIR') ? null : define('INC_DIR', SITE_ROOT . DS . 'backend' . DS . 'includes');

defined('CORE_DIR') ? null : define('CORE_DIR', SITE_ROOT . DS . 'backend' . DS . 'core');

require_once(INC_DIR . DS . 'config.php');
require_once(CORE_DIR . DS . 'class' . DS . 'category.php');
