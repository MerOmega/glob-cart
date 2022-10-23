<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My practice</title>
    <link rel="stylesheet" href="style/styles.css">
</head>
<body>
    <!-- Function -->
    <?php
        function sayHi(String $param):void{
            echo "Hello World, Im $param ";
        }
    ?>
    <!-- END OF FUNC -->
    <!-- -->
    <?php $var1=100; $var2=200;?>
    <!-- -->
    <p><?php echo $var1+$var2 ?></p>
    <!-- -->

    <!-- FUNCTION TEST -->
            <p><?php sayHi("Charif") ?></p>
    <!-- END OF TEST -->
    <form action="form.php" method="post">
        <input type="text" name="data">
        <input type="submit" name="submit">
    </form>
    <?php require 'array.php' ?>
</body>
</html>