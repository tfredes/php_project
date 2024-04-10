<?php

const API_URL = "https://whenisthenextmcufilm.com/api";
#Inicializar una nueva sesión de cURL; ch = cURL handle
$ch = curl_init(API_URL);
//Indicar que queremos recibir el resultado dela petición y no mostrarla por pantalla.
curl_setopt($ch, CURLOPT_URL, API_URL);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
/*Ejecutar la petición y guardamos resultado */
$result = curl_exec($ch);

// $result = file_get_contents(API_URL); // si solo quieres hacer un GET de una API
$data = json_decode($result, true);
curl_close($ch);

?>
<head>
    <title>La próxima película de Marvel</title>
    <!-- Centered viewport --> 
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
/>
</head>
<main>
    
   <section>
    <img src="<?= $data["poster_url"]; ?>" width="200" alt="Poster de <?= $data["title"]; ?>" />
   </section>
   <hgroup>
    <h3><?= $data["title"]; ?> se estrena en <?= $data["days_until"]; ?> días</h3>
    <p>Fecha de estreno: <?= $data["release_date"]; ?></p>
    <p>La siguiente película es: <?= $data["following_production"]["title"]; ?></p>
   </hgroup>
</main>


<style>
    :root{
        color-scheme: light dark;
    }
    body{
        display: grid;
        place-content: center;
    }
    section {
        display: flex;
        justify-content: center;
    }
    img {
        border: 0 auto;
    }
    hgroup {
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
</style>