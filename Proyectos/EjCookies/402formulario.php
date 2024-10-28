<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <?php

  echo ("<table border=1px>
    <tr>
      <td>Nombre y apellidos</td>
      <td>" . $_POST['fullname'] . "</td>
    </tr>
    <tr>
      <td>Email</td>
      <td>" . $_POST['email'] . "</td>
    </tr>
    <tr>
      <td>URL página</td>
      <td>" . $_POST['url'] . "</td>
    </tr>
    <tr>
      <td>Sexo</td>
      <td>" . $_POST['sex'] . "</td>
    </tr>
    <tr>
      <td>Nº convivientes domicilio</td>
      <td>" . $_POST['nConv'] . "</td>
    </tr>
    <tr>
      <td>Aficiones</td><td>");
  if (isset($_POST['aficiones'])) {
    foreach ($_POST['aficiones'] as $aficion) {
      echo $aficion . "<br />";
    }
  }
  echo ("</td>
    </tr>
    <tr>
      <td>Menús favoritos</td>
      <td>");
  if (isset($_POST['menus'])) {
    $menus = $_POST['menus'];
    foreach ($menus as $menu) {
      echo $menu . "<br />";
    }
  }
  echo ("</td>
    </tr>
  </table>");
  ?>
</body>

</html>