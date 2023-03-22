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
    case 'updatePage':
        edit($ducks, $duckRepository);
        break;
    // case 'updateItem':
    //     updateItem($ducks, $duckRepository);
    //     break;
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
    if (isset($_GET['action']) && $_GET['action'] === 'create') {
        $duckRepository->create();
        header("Location: ./");
        exit();
    }
}

function delete($ducks, $duckRepository)
{
        $duckRepository->delete();
}

function edit($ducks, $duckRepository): void
{
    
    if (isset($_POST['submit'])) {
        $duckRepository->update();
        header("Location: ./");
        exit();
    }

    require './Edit/edit.php';
    
}