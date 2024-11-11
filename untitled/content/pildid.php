<h2> PHP – Töö pildifailidega (Ülesanne 14)
</h2>
<a href="https://www.metshein.com/unit/php-pildifailidega-ulesanne-14/">PHP – Töö pildifailidega (Ülesanne 14)
</a>

<form method="post" action="">
    <select name="pildid">
        <option value="">Vali pilt</option>
        <?php
        $kataloog = 'content/img';
        $asukoht=opendir($kataloog);
        while($rida = readdir($asukoht)){
            if($rida!='.' && $rida!='..'){
                echo "<option value='$rida'>$rida</option>\n";
            }
        }
        ?>
    </select>
    <input type="submit" value="Vaata">
    <input name="random" type="submit" value="Random picture">
</form>



<?php
$pildidmassiv = array();
$asukoht = opendir('content/img/');
while($rida = readdir($asukoht)){
    if($rida!='.' && $rida!='..'){
        array_push($pildidmassiv, $rida);
    }
}
$randomintager = rand(0,3);
$randpilt = $pildidmassiv[$randomintager];

if(!empty($_POST['pildid'])){
    drawPildiInfo($_POST['pildid']);
}
else if (!empty($_GET['random'])){
    $randompilt = $pildidmassiv[$randomintager];
    drawPildiinfo($randompilt);
}
else {
    drawPildiinfo($randpilt);
}

function drawPildiInfo($pilt_nimi){
    $pilt = $pilt_nimi;
    $pildi_aadress = "content/img/".$pilt;
    $pildi_andmed = getimagesize($pildi_aadress);

    $laius = $pildi_andmed[0];
    $korgus = $pildi_andmed[1];
    $formaat = $pildi_andmed[2];
    $max_laius = 120;
    $max_korgus = 90;

    if($laius <= $max_korgus && $korgus<=$max_korgus){
        $ratio = 1;
    } elseif($laius>$korgus){
        $ratio = $max_laius/$laius;
    } else {
        $ratio = $max_korgus/$korgus;
    }

    $pisi_laius = round($laius*$ratio);
    $pisi_korgus = round($korgus*$ratio);

    echo '<h3>Originaal pildi andmed</h3>';
    echo "Laius: $laius<br>";
    echo "Kõrgus: $korgus<br>";
    echo "Formaat: $formaat<br>";

    echo '<h3>Uue pildi andmed</h3>';
    echo "Arvutamse suhe: $ratio <br>";
    echo "Laius: $pisi_laius<br>";
    echo "Kõrgus: $pisi_korgus<br>";
    echo "<img width='$pisi_laius' src='$pildi_aadress'><br>";
}
?>


<h2>Ülesanne PHP – Töö pildifailidega (Ülesanne 14)
</h2>

