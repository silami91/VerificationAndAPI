<!doctype html>
<html>

<head>
    <title>Facebook Results</title>
</head>

<body>
    <h1><?php echo $page->name?> has:</h1>
    <h3><?php echo $page->likes ?> likes</h3>
    <p>Go to <?php echo $page->name?>'s <a href="<?php echo $page->website?>">Website</a> </p>
    <?php if(isset($page->about)):?>
        <p><?php echo $page->about ?></p>
    <?php endif ?>
    <?php if(isset($page->description)):?>
        <p><?php echo $page->description ?></p>
    <?php endif ?>
</body>
</html>