<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <?php
  if (isset($_POST['file'])) {
    if (is_uploaded_file($_FILES['file']['tmp_name'])) {
        echo "<p>Archivo $nombre subido con éxito</p>";
    }
} else {echo "Ningún archivo subido";}
  ?>
</body>

</html>