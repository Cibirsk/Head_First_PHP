<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php    

    $subject = $_POST['subject'];
    $body = $_POST['body'];

    $dbc = mysqli_connect('localhost' , 'root' , 'root' , 'elvis_store')
            or die('erreur de connnexion à la base');

    $query = "SELECT * FROM email_list" ;

    $result = mysqli_query($dbc, $query) or die('erreur dans la requête');

?>
</body>
</html>