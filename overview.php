<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./style.css?<?php echo time();?>">
    <title>Bath Buddies</title>
</head>
<body>

<h1>Bath Buddies</h1>

<div id="wrapContainer">
    <div id="DucksContainer">
        <?php foreach ($ducks as $duck) : ?><br>
                <p><?= $duck['id'] ?></p>
                <p>Price: <?= $duck['Price'] ?></p>
                <p>Rarity: <?= $duck['Rarity'] ?></p>
                <p>Color: <?= $duck['Color'] ?></p>
                <p>Theme: <?= $duck['Theme'] ?></p>
                <p>Manufacturer: <?= $duck['Manufacturer'] ?><br><br></p>
                <hr>
        <?php endforeach; ?>
    </div>
    <div id="formContainer">
        <label for="price">Price: </label>
        <input type="text" id="price" name="price"><br>

        <label for="rarity">Rarity: </label>
        <input type="text" id="rarity" name="rarity"><br>

        <label for="color">Color: </label>
        <input type="text" id="color" name="color"><br>

        <label for="theme">Theme: </label>
        <input type="text" id="theme" name="theme"><br>

        <label for="manufacturer">Manufacturer: </label>
        <input type="text" id="manufacturer" name="manufacturer"><br>
        <button type="submit" name="submit">SUBMIT</button>
    </div>
</div>
</body>
</html>