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
            top:20%;
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
    <a href="str_show.php">
        <div id="back">
            <p id="jeden">Powrót</p>
        </div>
    </a>
    <p id="dwa">DODAJ STRAŻAKA</p>
    <div id="dane">
        <form method="POST" action="">
            Imię</br>
            <input type='text' name='imie'></br>
            Nazwisko:</br>
            <input type='text' name='nazwisko'></br>
            Data urodzenia:</br>
            <input type='date' name='uro'></br>
            Miejsce urodzenia:</br>
            <input type='text' name='mur'></br>
            PESEL</br>
            <input type='text' name='pesel'></br>
            Imię ojca:</br>
            <input type='text' name='imieoj'></br>
            Data końca badań lekarskich:</br>
            <input type='date' name='badania'></br></br>
            <input type="submit" value="Dodaj">
        </form>
        <?php
        if(!empty($_POST))
        {
            $imie=$_POST["imie"];
            $nazwisko=$_POST["nazwisko"];
            $data=$_POST["uro"];
            $miejsce=$_POST["mur"];
            $pesel=$_POST["pesel"];
            $imieoj=$_POST["imieoj"];
            $badania=$_POST["badania"];

            if($imie && $nazwisko && $data && $miejsce && $pesel && $imieoj && $badania)
            {
                $polaczenie=mysqli_connect("localhost","root","","straz")
                or die ("Nie mozna polaczyc z baza");

                $zapytanie="INSERT INTO strazacy SET imie='$imie', nazwisko='$nazwisko', dataur='$data', miejsceur='$miejsce', pesel='$pesel', imieoj='$imieoj', badania='$badania'";

                $kwerenda=mysqli_query($polaczenie,"SET NAMES 'utf8'");
                $wynik=mysqli_query($polaczenie,$zapytanie);

                if($wynik)
                    echo "Udało się dodać strażaka do bazy!";
                else
                    echo "Nie udało się dodać rekordu";
            }
        }
        ?>
    </div>
</body>
</html>