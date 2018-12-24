<?php

require './vendor/autoload.php';

//Then just reference code in your application

use League\Flysystem\Filesystem;
use League\Flysystem\ZipArchive\ZipArchiveAdapter as Adapter;

$adapter = new Adapter(__DIR__.'/archive.zip');
$filesystem = new Filesystem($adapter);

//Output a list of files in this archive
$contents = $filesystem->listContents('/', true);

?>
<!doctype html>
<html>
    <head>
        <title>List of Files</title>
    </head>
    <body>
    <h1>List of Files</h1>

    <ul>
        <?php foreach ($contents as $content): ?>
        <li><?= $content['type']; ?>: <?= $content['path'] ?></li>
        <?php endforeach; ?>
    </ul>
    </body>
</html>
