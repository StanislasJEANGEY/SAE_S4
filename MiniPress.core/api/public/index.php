<?php
declare(strict_types=1);

require_once __DIR__ . '/../src/vendor/autoload.php';

require_once __DIR__ . '/../src/services/utils/Eloquent.php';

use minipress\api\services\utils\Eloquent;

Eloquent::init(__DIR__ . '/../src/conf/conf.ini');

session_start();

/* application boostrap */
$app = (require_once __DIR__ . '/../src/conf/bootstrap.php');

/* routes loading */
(require_once __DIR__ . '/../src/conf/routes.php')($app);

/* application run */
$app->run();