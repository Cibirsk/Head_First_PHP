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

    $email = $_POST['email'];

    $dbc = mysqli_connect('localhost' , 'root' , 'root' , 'elvis_store')
            or die('erreur de connnexion à la base');

    $query = "DELETE FROM email_list WHERE email = '$email' ";
    
    $result = mysqli_query($dbc,$query)
                or die('erreur dans la requête');


    mysqli_close($dbc);

    echo 'Your email ' . $email . ' has been removed';

?>
</body>
</html>