<html>
<head>
<meta charset="UTF-8"/>
<style>
#druk{
    display: none;
}
</style>
<script src="//cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js"></script>
</head>
<body>

<img src="tlo.jpg" id="druk">

<canvas id="plotno" width="848" height="603">
</canvas>
<br>
<button id="download">Pobierz Raport</button>

<?php
    $id = $_GET['rap'];
    $polaczenie = mysqli_connect("localhost","root","","straz") or die ("Nie mozna polaczyc z baza");
    $kwerenda = mysqli_query($polaczenie,"SET NAMES 'utf8'");
    $zapytanie = "SELECT * FROM wyjazdy WHERE id = $id";
    $wynik = mysqli_query($polaczenie,$zapytanie);    

    while($res = mysqli_fetch_array($wynik))
    {
        $data = $res['data']; 
        $wyjazd = $res['godz_wyjazdu'];
        $przyjazd = $res['godz_powrotu'];
        $strazacy = array();
        if($res['strazak1']!=null)
            array_push($strazacy,$res['strazak1']);
        if($res['strazak2']!=null)    
            array_push($strazacy,$res['strazak2']);
        if($res['strazak3']!=null)
            array_push($strazacy,$res['strazak3']);
        if($res['strazak4']!=null)
            array_push($strazacy,$res['strazak4']);
        if($res['strazak5']!=null)
            array_push($strazacy,$res['strazak5']);
        if($res['strazak6']!=null)
            array_push($strazacy,$res['strazak6']);
    }
    $js_strazacy = json_encode($strazacy);
    $dateDiff = intval((strtotime($przyjazd)-strtotime($wyjazd))/60);
    $hours = intval($dateDiff/60);
    $minutes = $dateDiff%60;
?>

<script charset="utf-8">

    var canvas = document.getElementById("plotno");
    var ctx = canvas.getContext("2d");

    var druk = document.getElementById("druk");
    ctx.drawImage(druk,0,0)

    var data = "<?php echo $data ?>";
    ctx.font = "11px Arial";
    ctx.fillStyle = "#060e70";
    ctx.fillText(data, 228, 110);
    ctx.fillText(data, 733, 240);

    var str = <?php echo $js_strazacy ?>;
    var czas_wyjazdu = "<?php echo $wyjazd ?>";
    var czas_przyjazdu ="<?php echo $przyjazd ?>";
    var godziny = <?php echo $hours ?>;
    var minuty = <?php echo $minutes ?>;
    for(var i=0;i<str.length;i++){
        ctx.fillText(str[i], 65, (i*28)+300);
        ctx.fillText(czas_wyjazdu.substr(0,5)+" - "+czas_przyjazdu.substr(0,5), 220, (i*28)+300);
        ctx.fillText(godziny+"h "+minuty+"min", 300, (i*28)+300);
    }

    var godziny_calkowite = godziny*str.length;
    var minuty_calkowite = minuty*str.length;
    while(minuty_calkowite>=60)
    {
        minuty_calkowite-=60;
        godziny_calkowite++;
    }
    ctx.fillText(godziny_calkowite+"h "+minuty_calkowite+"min", 300, 500);

    download.addEventListener("click", function() {
    var imgData = canvas.toDataURL("image/jpeg", 1.0);
    var pdf = new jsPDF('l', 'mm', [220, 158]);

    pdf.addImage(imgData, 'JPEG', 0, 0);
    pdf.save("raport.pdf");
    }, false);

</script>

</body>
</html>