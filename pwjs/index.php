<html>
<head>
    <meta charset="UTF-8"/>
    <style>
        body{
            background-color: #403b3b;
        }
        .big-box{
            position: absolute;
            width: 80%;
            height: 80%;
            top: 10%;
            left: 10%;
        }
        .small-box{
            position: absolute;
            width: 50%;
            height: 50%;
            border: 2px solid white;
            text-align: center;
        }
        #first{
            background-color: green;
            top: 0%;
            left: 0%;
        }
        #first:hover{
            background-color: #003300;
        }
        #second{
            background-color: #ffcc00;
            top: 0%;
            right: 0%;
        }
        #second:hover{
            background-color: #b38f00;
        }
        #third{
            background-color: #0066ff;
            bottom: 0%;
            left: 0%;
        }
        #third:hover{
            background-color: #003380;
        }
        #fourth{
            background-color: #cc3300;
            bottom: 0%;
            right: 0%;
        }
        #fourth:hover{
            background-color: #802000;
        }
        .content{
            position: absolute;
            top: 15%;
            left: 10%;
            color: white;
            font-weight: bold;
            font-size: 32px;
            text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;
        }
    </style>
</head>
<body>
    <div class="big-box">
        <a href="str_show.php">
            <div class="small-box" id="first">
                <p class="content">Strażacy</p>
            </div>
        </a>
        <a href="wyj_show.php">
            <div class="small-box" id="second">
                <p class="content">Wyjazdy</p>
            </div>
        </a>
        <div class="small-box" id="third">
            <p class="content">Dokumenty</p>
        </div>
        <a href="admin_login.php">
            <div class="small-box" id="fourth">
                <p class="content">Panel Administracyjny</p>
            </div>
        </a>
    </div>
</body>
</html>