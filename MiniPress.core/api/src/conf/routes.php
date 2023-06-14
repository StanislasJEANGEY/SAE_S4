<?php

use gift\api\getApi\getBoxByApi;
use gift\api\getApi\getCategoriesByApi;
use gift\app\actions\get\GetBoxAction;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

return function (\Slim\App $app): void {
$app->get('/api/categories[/]', getCategoriesByApi::class);




};
