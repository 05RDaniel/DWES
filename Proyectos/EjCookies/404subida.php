<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if (isset($_POST['btnSubir']) && $_POST['btnSubir'] == 'Subir') {
        if (isset($_FILES['archivoEnviado']) && is_uploaded_file($_FILES['archivoEnviado']['tmp_name'])) {
            $nombre = $_FILES['archivoEnviado']['name'];
        } else {
            echo "<p>No se ha subido ningún archivo</p>";
        }
    }
    ?>
</body>
</html>
