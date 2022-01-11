<?php
// Partie traitement du formulaire
if (isset($_GET['nb1']) && isset($_GET['nb2']) && isset($_GET['operator'])) {
  // Initialisation de la variable d'erreur à false : par défaut, tout va bien
  // Jusqu'à ce qu'on rencontre potentiellement une erreur
  $error = false;
  // Validation des données saisies
  // On veut s'assurer que nb1 et nb2 sont bien des valeurs numériques
  // Et que l'opérateur est bien un opérateur connu pour nous
  if (!is_numeric($_GET['nb1']) || !is_numeric($_GET['nb2'])) {
    echo "Veuillez entrer des valeurs numériques";
    $error = true;
  }

  // Si l'opérateur est connu, alors on calcule le résultat
  // Sinon, on affiche un message d'erreur à l'écran
  if (!$error) {
    switch ($_GET['operator']) {
      case '+':
        $result = $_GET['nb1'] + $_GET['nb2'];
        break;
      case '-':
        $result = $_GET['nb1'] - $_GET['nb2'];
        break;
      case '*':
        $result = $_GET['nb1'] * $_GET['nb2'];
        break;
      case '/':
        $result = $_GET['nb1'] / $_GET['nb2'];
        break;
      default:
        echo "L'opérateur " . $_GET['operator'] . "n'est pas pris en charge";
    }

    echo "Le résultat est $result";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Calculette</title>
</head>

<body>
  <form>
    <input type="text" name="nb1" placeholder="Nombre 1" />
    <select name="operator">
      <option value="+">+</option>
      <option value="-">-</option>
      <option value="*">*</option>
      <option value="/">/</option>
    </select>
    <input type="text" name="nb2" placeholder="Nombre 2" />
    <button type="submit">Calculer</button>
  </form>
</body>

</html>