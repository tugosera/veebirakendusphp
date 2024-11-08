<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <title>PHP tunnitööd</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
    include("nav.php");
?>


<?php
include("header.php");
?>


<section>
    <?php
    if (isset($_GET["leht"])) {
        include("content/".$_GET["leht"]);
    } else {
        include("content/kodu.php");
    }
    ?>
</section>
    <?php
        include("footer.php");
    ?>
</body>
</html>