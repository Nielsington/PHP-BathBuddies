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

$duckRepository = new DucksRepository($databaseManager);
$ducks = $duckRepository->get();

// If nothing is specified, it will remain empty (home should be loaded)
$action = $_GET['action'] ?? null;

// Load the relevant action
switch ($action) {
    case 'create':
        create($ducks, $duckRepository);
        break;
    case 'delete':
        delete($ducks, $duckRepository);
        break;
    default:
        overview($ducks);
        break;
}

function overview($ducks)
{
    require 'overview.php';
}

function create($ducks, $duckRepository)
{
    $price = $_GET['price'];
    $rarity = $_GET['rarity'];
    $color = $_GET['color'];
    $theme = $_GET['theme'];
    $manufacturer = $_GET['manufacturer'];

    $duckRepository->create($price, $rarity, $color, $theme, $manufacturer);
    require 'overview.php';
    echo "<meta http-equiv=\"refresh\" content=\"0;url=index.php\">";
}

function delete($ducks, $duckRepository)
{
    $toDelete = $_GET['id'];
    $duckRepository->delete($toDelete);
    require 'overview.php';
    echo "<meta http-equiv=\"refresh\" content=\"0;url=index.php\">";
}