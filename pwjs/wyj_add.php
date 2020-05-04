<html>
<head>
    <meta charset="UTF-8"/>
    <style>
        body{
            background-color: #403b3b;
        }
        #back{
            color: white;
            background-color: black;
            height: 10%;
            width: 16%;
            top: 25px;
            left: 25px;
            text-align: center; 
            position: absolute;
        }
        #dane{
            width:40%;
            height:50%;
            text-align:center;
            position: absolute;
            top:15%;
            left:30%;
            color:white;
            font-size:22px;
        }
        #dwa{
            text-align: center;
            font-size: 34px;
            font-style: italic;
            color: white;
            margin-top: 3%;
        }
        #jeden{
            text-align: center;
            font-size: 22px;
        }
    </style>
</head>
<body>
    <a href="wyj_show.php">
        <div id="back">
            <p id="jeden">Powrót</p>
        </div>
    </a>
    <p id="dwa">DODAJ WYJAZD</p>
    <div id="dane">
        <form method="POST" action="">
            Data</br>
            <input type='date' name='data'></br>
            Godzina wyjazdu:</br>
            <input type='time' name='gwyj'></br>
            Godzina powrotu:</br>
            <input type='time' name='gpow'></br>
            Miejscowość:</br>
            <input type='text' name='miej'></br>
            Rodzaj</br>
            <input type='text' name='rdz'></br>
            Kierowca:</br>
            <select name='str1'>
            <?php
            $polaczenie=mysqli_connect("localhost","root","","straz")
            or die ("Nie mozna polaczyc z baza");
            $kwerenda=mysqli_query($polaczenie,"SET NAMES 'utf8'");
            $zapytanie="SELECT imie, nazwisko FROM strazacy";
            $wynik=mysqli_query($polaczenie,$zapytanie);
            while($res=mysqli_fetch_array($wynik))
            {
                $name=$res["imie"]." ".$res["nazwisko"];
                echo "<option value='$name'>$name</option>";
            }
            ?>
            </select>
            </br>
            Dowódca:</br>
            <select name='str2'>
            <option value="">brak</option>
            <?php
            $polaczenie=mysqli_connect("localhost","root","","straz")
            or die ("Nie mozna polaczyc z baza");
            $kwerenda=mysqli_query($polaczenie,"SET NAMES 'utf8'");
            $zapytanie="SELECT imie, nazwisko FROM strazacy";
            $wynik=mysqli_query($polaczenie,$zapytanie);
            while($res=mysqli_fetch_array($wynik))
            {
                $name=$res["imie"]." ".$res["nazwisko"];
                echo "<option value='$name'>$name</option>";
            }
            ?>
            </select></br>
            Strażak 1:</br>
            <select name='str3'>
            <option value="">brak</option>
            <?php
            $polaczenie=mysqli_connect("localhost","root","","straz")
            or die ("Nie mozna polaczyc z baza");
            $kwerenda=mysqli_query($polaczenie,"SET NAMES 'utf8'");
            $zapytanie="SELECT imie, nazwisko FROM strazacy";
            $wynik=mysqli_query($polaczenie,$zapytanie);
            while($res=mysqli_fetch_array($wynik))
            {
                $name=$res["imie"]." ".$res["nazwisko"];
                echo "<option value='$name'>$name</option>";
            }
            ?>
            </select></br>
            Strażak 2:</br>
            <select name='str4'>
            <option value="">brak</option>
            <?php
            $polaczenie=mysqli_connect("localhost","root","","straz")
            or die ("Nie mozna polaczyc z baza");
            $kwerenda=mysqli_query($polaczenie,"SET NAMES 'utf8'");
            $zapytanie="SELECT imie, nazwisko FROM strazacy";
            $wynik=mysqli_query($polaczenie,$zapytanie);
            while($res=mysqli_fetch_array($wynik))
            {
                $name=$res["imie"]." ".$res["nazwisko"];
                echo "<option value='$name'>$name</option>";
            }
            ?>
            </select></br>
            Strażak 3:</br>
            <select name='str5'>
            <option value="">brak</option>
            <?php
            $polaczenie=mysqli_connect("localhost","root","","straz")
            or die ("Nie mozna polaczyc z baza");
            $kwerenda=mysqli_query($polaczenie,"SET NAMES 'utf8'");
            $zapytanie="SELECT imie, nazwisko FROM strazacy";
            $wynik=mysqli_query($polaczenie,$zapytanie);
            while($res=mysqli_fetch_array($wynik))
            {
                $name=$res["imie"]." ".$res["nazwisko"];
                echo "<option value='$name'>$name</option>";
            }
            ?>
            </select></br>
            Strażak 4:</br>
            <select name='str6'>
            <option value="">brak</option>
            <?php
            $polaczenie=mysqli_connect("localhost","root","","straz")
            or die ("Nie mozna polaczyc z baza");
            $kwerenda=mysqli_query($polaczenie,"SET NAMES 'utf8'");
            $zapytanie="SELECT imie, nazwisko FROM strazacy";
            $wynik=mysqli_query($polaczenie,$zapytanie);
            while($res=mysqli_fetch_array($wynik))
            {
                $name=$res["imie"]." ".$res["nazwisko"];
                echo "<option value='$name'>$name</option>";
            }
            ?>
            </select></br></br>

            <input type="submit" value="Dodaj">
        </form>
        <?php
        if(!empty($_POST))
        {
            $data=$_POST["data"];
            $gwyj=$_POST["gwyj"];
            $gprz=$_POST["gpow"];
            $miejsce=$_POST["miej"];
            $rodzaj=$_POST["rdz"];
            $str1=$_POST["str1"];
            $str2=$_POST["str2"];
            $str3=$_POST["str3"];
            $str4=$_POST["str4"];
            $str5=$_POST["str5"];
            $str6=$_POST["str6"];

            if($data && $gwyj && $gprz && $miejsce && $rodzaj && $str1)
            {
                $polaczenie=mysqli_connect("localhost","root","","straz")
                or die ("Nie mozna polaczyc z baza");

                $wynik="";
                if(!empty($data))
                    $wynik.="data='$data',";
                if(!empty($gwyj))
                    $wynik.="godz_wyjazdu='$gwyj',";
                if(!empty($gprz))
                    $wynik.="godz_powrotu='$gprz',";
                if(!empty($miejsce))
                    $wynik.="miejsce='$miejsce',";
                if(!empty($rodzaj))
                    $wynik.="rodzaj='$rodzaj',";
                if(!empty($str1))
                    $wynik.="strazak1='$str1',";
                if(!empty($str2))
                    $wynik.="strazak2='$str2',";
                if(!empty($str3))
                    $wynik.="strazak3='$str3',";
                if(!empty($str4))
                    $wynik.="strazak4='$str4',";
                if(!empty($str5))
                    $wynik.="strazak5='$str5',";
                if(!empty($str6))
                    $wynik.="strazak6='$str6',";
                
                $wynik=substr($wynik,0,-1);

                $zapytanie="INSERT INTO wyjazdy SET $wynik";

                $kwerenda=mysqli_query($polaczenie,"SET NAMES 'utf8'");
                $res=mysqli_query($polaczenie,$zapytanie);

                if($res)
                    echo "Udało się dodać wyjazd do bazy!";
                else
                    echo "Nie udało się dodać rekordu";
            }
        }
        ?>
    </div>
</body>
</html>