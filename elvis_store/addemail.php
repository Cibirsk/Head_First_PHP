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
    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $email = $_POST['email'];

    $dbc = mysqli_connect('localhost' , 'root' , 'root' , 'elvis_store')
            or die('erreur de connnexion à la base');
        
    $query = " INSERT INTO email_list (first_name, last_name, email) " . 
                " VALUES ('$firstName' , '$lastName' , '$email' ) " ;

    $result = mysqli_query($dbc,$query)
            or die('erreur dans la requete');

    mysqli_close($dbc);

    echo 'You will receive some news soon ! ';



?>
</body>
</html>