<?php
echo "<h2>Ajafunktsioonid</h2>";
echo "<div id='kuupaev'>";
echo "Täna on ".date("d.m.Y.")."<br>";
date_default_timezone_set("Europe/Tallinn");
echo "<strong>";
echo "Tanane Tallinna kuupäev ja kellaeag on".
    date("d.m.Y G:i", time())."<br>";
echo "</strong>";
echo "date('d.m.Y G:i', time())";
echo "<br>";
echo "d - kuupäev 1-31";
echo "<br>";
echo "m - kuu numbrina 1- 12";
echo "<br>";
echo "Y - aasta neljakohane";
echo "<br>";
echo "G - tunniformaat 0-24";
echo "<br>";
echo "i - minutid 0-59";
echo "</div>";
?>
<div id="hooaeg">
    <h2>Väljasta vastavalt hooajale pilt (kevad/suvi/sügis/talv)</h2>
    <?php
    $today = new DateTime();
    echo "Täna on ".$today->format('3-30-2024');
    //hooaja punktid - сезон
    $spring=new DateTime('March 20');
    $summer=new DateTime('june 21');
    $fall=new DateTime('september 22');
    $winter=new DateTime('December 22');

    switch(true){
        //kevad
        case $today>=$spring && $today<$summer:
            echo ", Kevad ";
            echo "<br>";
            $pildi_aadress='content/img/kevad.jpg';
            break;
        case $today>=$summer && $today<$fall:
            echo ", Suvi ";
            echo "<br>";
            $pildi_aadress='content/img/suvi.jpg';
            break;
        case $today>=$fall && $today<$winter:
            echo ", Sügis ";
            echo "<br>";
            $pildi_aadress='content/img/sügis.jpg';
            break;
        default:
            echo ", Talv ";
            echo "<br>";
            $pildi_aadress='content/img/talv.jpg';
            break;
    }
    ?>
    <img src="<?=$pildi_aadress?>" alt='hooaja pilt' width = "300px">
</div>
<div id="koolivabaaeg">
    <h2>Mittu päeva on koolivabaajani 23.12.2024</h2>
    <?php
    $kdate=date_create_from_format('d.m.Y', '23.12.2024');
    $date=date_create();
    $diff=date_diff($kdate,$date);
    echo "jääb ".$diff->format("%a")." päeva" ;
    echo "<br>";
    echo "jääb ".$diff->days." päeva" ;
    ?>
</div>
<div id="sunnipaev">
    <h2>Mittu päeva on minu sünnipäevani 17.09.2025</h2>
    <?php
    $sdate=date_create_from_format('d.m.Y', '17.09.2025');
    $date=date_create();
    $diff=date_diff($sdate,$date);
    echo "jääb ".$diff->format("%a")." päeva" ;
    echo "<br>";
    echo "jääb ".$diff->days." päeva" ;
    ?>
</div>
<div id="vanus">
    <h2>Kasutaja vanuse leidmine</h2>
    <form method="post">
        Sisesta ima sünnikuupäev
        <input type="date" name="synd" placeholder="dd.mm.yyyy">
        <input type="submit" value="OK">
    </form>
    <?php
    if(empty($_POST['synd'])){
        echo "sisesta oma sünnipäeva kuupäev";
    }
    else{
        $ssdate=date_create($_POST['synd']);
        $date=date_create();
        $diff=date_diff($ssdate,$date);
        echo "sa oled ".$diff->format("%y")." aastat vana" ;
    }
    ?>
</div>
<div>
    <h2>Massivi abil näidata kuu nimega tänases kuupäevas</h2>
    <?php
    $kuud=array(1=>'jaanuar','veebruar','märts','aprill','mai'.'juuni','juuli','august','september','oktoober','november','december');
    $paev=date('d');
    $year=date('y');
    $kuu=$kuud[date('n')];
    echo $paev.".".$kuu.".".$year;
    ?>
</div>