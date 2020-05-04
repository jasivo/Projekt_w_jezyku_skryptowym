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
            left:10%;
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
            font-size:15px;
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
    <a href="wyj_add.php">
        <div id="next">
            <p id="jeden">Dodaj wyjazd</p>
        </div>
    </a>
    <p id="dwa">LISTA WYJAZDÓW OSP</p>
    <div id="dane">
        <?php
            $polaczenie=mysqli_connect("localhost","root","","straz")
            or die ("Nie mozna polaczyc z baza");

            $kwerenda=mysqli_query($polaczenie,"SET NAMES 'utf8'");

            $zapytanie="SELECT * FROM wyjazdy";
            $wynik=mysqli_query($polaczenie,$zapytanie);

            echo "<table>";
            echo "<td>Data</td><td>Wyjazd</td><td>Przyjazd</td><td>Miejsce</td><td>Rodzaj</td><td>Kierowca</td><td>Dowódca</td><td>Strażak 1</td><td>Strażak 2</td><td>Strażak 3</td><td>Strażak 4</td>";
            while($res=mysqli_fetch_array($wynik))
            {
                $ind=$res['id'];
                echo "<tr>";
                echo "<td>".$res['data']."</td><td>".$res['godz_wyjazdu']."</td><td>".$res['godz_powrotu']."</td><td>".$res['miejsce']."</td><td>".$res['rodzaj']."</td><td>".$res['strazak1']."</td><td>".$res['strazak2']."</td><td>".$res['strazak3']."</td><td>".$res['strazak4']."</td><td>".$res['strazak5']."</td><td>".$res['strazak6']."</td><td><a href='wyj_edit.php?ident=$ind'>Edytuj</a></td>";
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