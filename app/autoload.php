<?php
require_once('db.php');

$db = new App\DB();
$db->init();

spl_autoload_register(function ($class) {
    $dir = __DIR__ . '/../';
    $filename = str_replace('\\', '/', sprintf('%s.php', $class));

    if (!file_exists($dir . $filename)) {
        throw new \ErrorException(sprintf('File %s not found', $filename));
    }

    require_once($dir . $filename);
});

require_once('routes.php');
