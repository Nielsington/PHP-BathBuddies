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

    public function create($price, $rarity, $color, $theme, $manufacturer): void
    {
        $query = $this->databaseManager->connection->prepare(
            "INSERT INTO ducks (Price, Rarity, Color, Theme, Manufacturer) 
            VALUES (?,?,?,?,?);"
        );

        $values = array($price, $rarity, $color, $theme, $manufacturer);
        $query->execute($values);


    }

    // Get one
    public function find(): array
    {

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

    }

    public function delete(): void
    {

    }

}