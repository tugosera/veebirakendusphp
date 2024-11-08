<?php
echo "Mõistatus: Euroopa riik<br>";
$riik = "saksamaa";
$otsing = "on";

echo "Esimene täht - ".substr($riik, 0, 1);

echo "<br>";

echo "Riigi nimi pikkus - ".strlen($riik);
echo '<br>';

?>

<form method="post">
    Sisesta vastus
    <input type="text" name="riig">
    <input type="submit" value="OK">
</form>

<?php
if(empty($_POST['riig']))
{
    echo " ";
}
else{
    if($_POST['riig']==$riik)
    {
        echo "Sul on õigus";
    }
    else
    {
        echo "ei ole õige";
    }
}

echo "<br>";
//highlight_file('moistatus.php');
?>