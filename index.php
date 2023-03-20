<?php

declare (strict_types = 1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once 'config.php';
require_once 'classes/DatabaseManager.php';
require_once 'classes/DucksRepository.php';

$databaseManager = new DatabaseManager($config['host'], $config['user'], $config['password'], $config['dbname']);
$databaseManager->connect();

$cardRepository = new DucksRepository($databaseManager);
$ducks = $cardRepository->get();

// If nothing is specified, it will remain empty (home should be loaded)
$action = $_GET['action'] ?? null;

// Load the relevant action
switch ($action) {
    case 'create':
        create();
        break;
    default:
        overview($ducks);
        break;
}

function overview($ducks)
{
    require 'overview.php';
}

function create()
{
    // TODO: provide the create logic
}