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

    <pre>
        <h3>POST DATA</h3>
    <?php
        var_dump($_GET);
    ?>
    </pre>

    <div id="wrapContainer">
            <div id="DucksContainer">
                <?php foreach ($ducks as $duck) : ?><br>
                        <a href="?id=<?= $duck['ID']?>&action=updatePage" name="update"><img class="updateBtn" src="./Assets/pencil.png" alt="update"></a>
                        <p><?= $duck['ID'] ?></p>
                        <p>Price: <?= $duck['Price'] ?></p>
                        <p>Rarity: <?= $duck['Rarity'] ?></p>
                        <p>Color: <?= $duck['Color'] ?></p>
                        <p>Theme: <?= $duck['Theme'] ?></p>
                        <p>Manufacturer: <?= $duck['Manufacturer'] ?><br><br></p>
                        <a href="?id=<?= $duck['ID']?>&action=delete" name="delete"><img class="deleteBtn" src="./Assets/trash.png" alt="delete"></a>
                <?php if($duck !== end($ducks)){echo '<hr>';}; ?>
                <?php endforeach; ?>
            </div>
        <div id="formContainer">
            <form action="" method="GET">
                <div class='input'>
                    <label for="price">Price: </label><br>
                    <input type="text" id="price" name="price" required><br>
                </div>
                <div class='input'>    
                    <label for="rarity">Rarity: </label><br>
                    <input type="text" id="rarity" name="rarity" required><br>
                </div>
                <div class='input'>
                    <label for="color">Color: </label><br>
                    <input type="text" id="color" name="color" required><br>
                </div>
                <div class='input'>
                    <label for="theme">Theme: </label><br>
                    <input type="text" id="theme" name="theme" required><br>
                </div>
                <div class='input'>
                    <label for="manufacturer">Manufacturer: </label><br>
                    <input type="text" id="manufacturer" name="manufacturer" required><br>
                </div>
                <button type="submit" name="action" value="create" >SUBMIT</button>
            </form>
        </div>
    </div>
</body>
</html>