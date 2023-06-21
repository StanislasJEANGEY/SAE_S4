<?php
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class CustomTwigEnvironment extends Environment
{
protected $loader;

public function __construct(FilesystemLoader $loader, array $options = [])
{
parent::__construct($loader, $options);
}
}
