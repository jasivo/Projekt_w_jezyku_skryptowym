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
    <a href="index.php">
        <div id="back">
            <p id="jeden">Powrót</p>
        </div>
    </a>
    <p id="dwa">Zaloguj się</p>
    <div id="dane">
        <form method="POST" action="">
            Login:</br>
            <input type='text' name='login'></br>
            Hasło:</br>
            <input type='password' name='haslo'></br></br>
            <input type="submit" value="Zaloguj">
        </form>
        <?php
            if(!empty($_POST))
            {
                $login=$_POST['login'];
                $haslo=$_POST['haslo'];
                if(($login=="admin")&&($haslo=="admin"))
                {
                    header("Location: http://localhost/phpmyadmin");
                }
                else
                    echo "Podany login lub hasło jest nieprawidłowe.";
            }
        ?>
    </div>
</body>
</html>