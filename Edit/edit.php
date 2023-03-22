<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./Edit/edit.css?<?php echo time();?>">
    <title>Bath Buddies</title>
</head>
<body>
    <h1>Bath Buddies</h1>
    <?php
        global $duckRepository;
        $data = $duckRepository->find($_GET['id']);
    ?>
    <div id="wrapContainer">
        <div id="formContainer">
            <form action="" method="POST">
            <div class='input'>
                <label for="price">Price: </label><br>
                <input type="text" id="price" name="price" value="<?= $data['Price'];?>" required><br>
            </div>
            <div class='input'>    
                <label for="rarity">Rarity: </label><br>
                <input type="text" id="rarity" name="rarity" value="<?= $data['Rarity'];?>" required><br>
            </div>
            <div class='input'>
                <label for="color">Color: </label><br>
                <input type="text" id="color" name="color" value="<?= $data['Color'];?>" required><br>
            </div>
            <div class='input'>
                <label for="theme">Theme: </label><br>
                <input type="text" id="theme" name="theme" value="<?= $data['Theme'];?>" required><br>
            </div>
            <div class='input'>
                <label for="manufacturer">Manufacturer: </label><br>
                <input type="text" id="manufacturer" name="manufacturer" value="<?= $data['Manufacturer'];?>" required><br>
            </div>
            <button type="submit" name="submit">UPDATE</button>
            </form>
        </div>
    </div>
</body>
</html>