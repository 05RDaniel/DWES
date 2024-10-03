<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $texto_es="EN ESPAÑOL: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam vestibulum elit et velit commodo, in ultricies sem tincidunt";
    $texto_en="IN INGLISH: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam vestibulum elit et velit commodo, in ultricies sem tincidunt";
    $idiomas_es="Inglés, Español, Valenciano, Balleno";
    $idiomas_en="English, Spanish, Valencian, Whale";
    $idioma=$_GET["idioma"];
    $texto="texto_".$idioma;
    $idiomas="idiomas_".$idioma;
    echo $$texto,"<br>",$$idiomas;
    ?>
</body>

</html>