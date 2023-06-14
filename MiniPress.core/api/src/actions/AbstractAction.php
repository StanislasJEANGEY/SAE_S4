<?php

namespace actions;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

abstract class AbstractAction{
    abstract public function __invoke(Request $request, Response $response, array $args):Response;
}