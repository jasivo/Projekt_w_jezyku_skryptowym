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
        select{
            height: 25px;
            top:  20%;
            left: 28%;
            position: absolute;
        }
        #przycisk{
            position: absolute;
            top: 30%;
            left: 33%;
        }
    </style>
</head>
<body>
    <a href="index.php">
        <div id="back">
            <p id="jeden">Powrót</p>
        </div>
    </a>
    <p id="dwa">Raporty OSP</p>
    <div id="dane">
        <?php
            $polaczenie=mysqli_connect("localhost","root","","straz")
            or die ("Nie mozna polaczyc z baza");

            $kwerenda=mysqli_query($polaczenie,"SET NAMES 'utf8'");

            $zapytanie="SELECT * FROM wyjazdy";
            $wynik=mysqli_query($polaczenie,$zapytanie);

            echo "<form method='get' action='raport.php'>";
            echo "<select name='rap'>";       
            while($res=mysqli_fetch_array($wynik))
            {
                $ind=$res['id'];
                echo "<option value='$ind'>";
                echo $res['data']." ".$res['rodzaj'];
                echo "</option>";
            }
            echo "</select>";
            echo "<div id='przycisk'><input type='submit' value='Generuj Raport!'></div>";
            echo "</form>";
            mysqli_close($polaczenie);
        ?>
    </div>
</body>
</html>