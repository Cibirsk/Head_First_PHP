<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Make Me Elvis - Remove Email</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>

  <p>Please select the email addresses to delete from the email list and click Remove.</p>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<?php
    $dbc = mysqli_connect('localhost' , 'root' , 'root' , 'elvis_store')
            or die('erreur de connnexion à la base');
  // 1: creation de la connexion avec mysqli_connect et les parametres
  // 2: creation de la requete avec SELECT * FROM email_list
  // 3: la connexion et la requete sont stocké dans $result
  // 4:   affichage de la page (id,prenom, nom, mail)
  // 4.1:    mysqli_fetch_array balaye la base avec les données de connexion de $result et stock dans $row
  // 4.2:    la checkbox a pour value 'id' du $row en cours et pour name un tableau crée 'todelete[]' 

  // Delete the customer rows (only if the form has been submitted)
  if (isset($_POST['submit'])) {
    foreach ($_POST['todelete'] as $delete_id) {
      $query = "DELETE FROM email_list WHERE id = $delete_id";
      mysqli_query($dbc, $query)
        or die('Error querying database.');
    } 

    echo 'Customer(s) removed.<br />';
  }

  // Display the customer rows with checkboxes for deleting
  $query = "SELECT * FROM email_list";
  $result = mysqli_query($dbc, $query);
  while ($row = mysqli_fetch_array($result)) {
    echo '<input type="checkbox" value="' . $row['id'] . '"  name="todelete[]" />';
    echo $row['first_name'];
    echo ' ' . $row['last_name'];
    echo ' ' . $row['email'];
    echo '<br />';
  }

  mysqli_close($dbc);
?>

    <input type="submit" name="submit" value="Remove" />
  </form>
</body>
</html>