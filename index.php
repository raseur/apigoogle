//api Google 
<!-- formulaire HTML -->
<form method="GET">
  <input type="text" name="query" placeholder="Rechercher sur Google">
  <input type="submit" value="Go">
</form>

<?php

// Vérifie si le formulaire a été soumis
if (isset($_GET['query'])) {
  // Récupérez la valeur de la requête de recherche
  $query = $_GET['query'];

  // Remplacez YOUR_API_KEY par votre propre clé API Google
  $apiKey = "YOUR_API_KEY";

  // Encodez la requête de recherche pour l'utiliser dans l'URL
  $encodedQuery = urlencode($query);

  // Construisez l'URL de l'API de recherche Google
  $url = "https://www.googleapis.com/customsearch/v1?key=$apiKey&cx=017576662512468239146:omuauf_lfve&q=$encodedQuery";

  // Effectuez une requête HTTP GET à l'URL de l'API
  $curl = curl_init($url);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  $response = curl_exec($curl);
  curl_close($curl);

  // Décodez la réponse JSON
  $results = json_decode($response, true);

  // Affichez les titres et les URL des premiers résultats de la recherche
  foreach ($results['items'] as $result) {
    echo $result['title'] . ": " . $result['link'] . "\n";
  }
}
?>
