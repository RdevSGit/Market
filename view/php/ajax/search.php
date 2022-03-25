<?php

require_once("../../../config/connexion/connexion.php");

$content = $_GET["content"];

$search = $bdd->prepare("SELECT * FROM products WHERE name LIKE ? LIMIT 10");
$search->execute(["%" . $content . "%"]);
$result = $search->fetchAll();

foreach ($result as $res) { ?>
    <a href="index.php?page=product&amp;id=<?= $res['id'] ?>">
        <li><?= $res['name'] ?> (<?= $res['type'] ?>)</li>
    </a>
<?php
}
