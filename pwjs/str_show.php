<html>
<head>
    <meta charset="utf-8" />
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
        #next{
            color: white;
            background-color: black;
            height: 10%;
            width: 16%;
            top: 25px;
            right: 25px;
            text-align: center; 
            position: absolute;
        }
        #dane{
            width:80%;
            height:50%;
            text-align:center;
            position: absolute;
            top:20%;
            left:20%;
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
        table{
            color: white;
            border: 2px solid white;
            border-collapse: collapse;
        }
        tr:nth-child(1) td{
            padding: 15px; 
        }
        td{
            border: 2px solid white;
            padding: 10px; 
        }
        a{
            color: white;
        }
    </style>
</head>
<body>
    <a href="index.php">
        <div id="back">
            <p id="jeden">Powrót</p>
        </div>
    </a>
    <a href="str_add.php">
        <div id="next">
            <p id="jeden">Dodaj strażaka</p>
        </div>
    </a>
    <p id="dwa">LISTA STRAŻAKÓW OSP</p>
    <div id="dane">
        <?php
            $polaczenie=mysqli_connect("localhost","root","","straz")
            or die ("Nie mozna polaczyc z baza");

            $kwerenda=mysqli_query($polaczenie,"SET NAMES 'utf8'");

            $zapytanie="SELECT * FROM strazacy";
            $wynik=mysqli_query($polaczenie,$zapytanie);

            echo "<table>";
            echo "<td>Imię</td><td>Nazwisko</td><td>Data urodzenia</td><td>Miejsce urodzenia</td><td>PESEL</td><td>Imię ojca</td><td>Koniec badań lekarskich</td>";
            while($res=mysqli_fetch_array($wynik))
            {
                $ind=$res['id'];
                echo "<tr>";
                echo "<td>".$res['imie']."</td><td>".$res['nazwisko']."</td><td>".$res['dataur']."</td><td>".$res['miejsceur']."</td><td>".$res['pesel']."</td><td>".$res['imieoj']."</td><td>".$res['badania']."</td><td><a href='str_edit.php?ident=$ind'>Edytuj</a></td>";
                echo "</tr>";
            }
            echo "</table>";

            if(!$wynik)
               echo "Nie udało sie pobrać danych z bazy.";
                
            mysqli_close($polaczenie);
        ?>
    </div>
</body>
</html>