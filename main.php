<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TIME</title>
    <link rel = "stylesheet" href = "style.css">
</head>
<body>

    <div class = "left">
        <input  id = "downbut" class = "butt" value = '-1' type = 'button'/>
    </div>
    <div class = "center">
        <h1><kbd id = "count">0</kbd></h1>
    </div>
    <div class = "right">
    <input  id = "upbut" class = "butt" value = '+1' type = 'button'/>
    </div>
    <?php
    session_start();
    if (!(isset($_SESSION['chas_pos']))) {
        $_SESSION['chas_pos'] = 0;
    }

    ?>
    <script>
        function gtime() {
            var req = new XMLHttpRequest();
            req.onreadystatechange = function() {
                if (req.responseText !== '') {
                    document.getElementById('count').innerHTML = req.responseText;
                }
            };
            req.open('POST', 'index.php', true);
            req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            req.send("type=just_time");
        }
        var timerID;
        function start() {
            gtime();
            timerID = setInterval(gtime, 1000)
        }
        function plus() {
            req = new XMLHttpRequest();
            req.onreadystatechange = function() {
                if (req.responseText !== '') {
                    document.getElementById('count').innerHTML = req.responseText;
                }
            };
            req.open('POST', 'index.php', true);
            req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            req.send("type=plus_one");
            d.setHours(d.getHours() + 1);
            time = d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds();
            document.getElementById('count').innerHTML = time;
        }
        function minus() {
            req = new XMLHttpRequest();
            req.onreadystatechange = function() {
                if (req.responseText !== '') {
                    document.getElementById('count').innerHTML = req.responseText;
                }
            };
            req.open('POST', 'index.php', true);
            req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            req.send("type=minus_one");
        }

        start();
        downbut.onclick = function () {
           minus();
        };
        upbut.onclick = function () {
            plus();
        }


    </script>
</body>
</html>