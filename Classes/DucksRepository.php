<?php

// This class is focussed on dealing with queries for one type of data
// That allows for easier re-using and it's rather easy to find all your queries
// This technique is called the repository pattern
class DucksRepository
{
    private DatabaseManager $databaseManager;

    // This class needs a database connection to function
    public function __construct(DatabaseManager $databaseManager)
    {
        $this->databaseManager = $databaseManager;
    }

    public function create(): void
    {
        $price = $_GET['price'];
        $rarity = $_GET['rarity'];
        $color = $_GET['color'];
        $theme = $_GET['theme'];
        $manufacturer = $_GET['manufacturer'];

        $query = $this->databaseManager->connection->prepare(
            "INSERT INTO ducks (Price, Rarity, Color, Theme, Manufacturer) 
            VALUES (?,?,?,?,?);"
        );

        $values = array($price, $rarity, $color, $theme, $manufacturer);
        $query->execute($values);
    }

    // Get one
    public function find($toFill): array
    {
        $query = $this->databaseManager->connection->prepare(
            "SELECT * FROM ducks WHERE id=?;"
        );

        $query->execute([$toFill]);
        $data = $query->fetch();
        var_dump($data);
        return $data;
    }

    // Get all
    public function get(): array
    {
        $query = $this->databaseManager->connection->query('SELECT * FROM ducks;');
        $data = $query->fetchAll();

        return $data;
    }

    public function update(): void
    {
        $price = $_POST['price'];
        $rarity = $_POST['rarity'];
        $color = $_POST['color'];
        $theme = $_POST['theme'];
        $manufacturer = $_POST['manufacturer'];
        $toFill = $_GET['id'];

        $query = $this->databaseManager->connection->prepare("UPDATE ducks SET Price=?, Rarity=?, Color=?, Theme=?, Manufacturer=? WHERE id=?;");
        $query->execute([$price, $rarity, $color, $theme, $manufacturer, $toFill]);
    }

    public function delete(): void
    {
        $toDelete = $_GET['id'];
        $query = $this->databaseManager->connection->prepare("DELETE FROM ducks WHERE ID=?;");
        $query->execute([$toDelete]);
    }
}