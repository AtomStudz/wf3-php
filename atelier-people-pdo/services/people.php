<?php
require_once 'db.php';
require_once 'People.php';

/**
 * Returns the statement to iterate over after looking for all people in db
 *
 * @return PDOStatement|false
 */
function findAllPeopleStatement(): PDOStatement
{
  $connection = getConnection();
  $query = "SELECT * FROM people";
  return $connection->query($query);
}

/**
 * Add a people to the database
 *
 * @param People $people
 * @return bool
 */
function addPeople(People $people): bool
{
  $connection = getConnection();
  $birthdateSqlVal = $people->getBirthDate() ? $people->getBirthDate()->format('Y-m-d') : null;

  // Requête non préparée
  // --- A EVITER CAR NON SECURISE ------------------------------------------------------------------------------
  // $query = "INSERT INTO people (name, firstname, birthdate) VALUES ('$name', '$firstname', $birthdateSqlVal);";
  // return $connection->query($query);
  // ------------------------------------------------------------------------------------------------------------

  // Requête préparée
  // --- PARAMETRES NOMMES --------------------------------------------------------------------------------------
  // 1 - Préparation de la requête : je déclare mes paramètres de requête
  // en ajoutant ':' devant le nom du paramètre
  $stmt = $connection->prepare("INSERT INTO people (name, firstname, birthdate) VALUES (:people_name, :people_firstname, :people_birthdate);");
  // 2 - Exécution de la requête : j'exécute la requête préparée en lui passant
  // les valeurs de paramètres à utiliser lors de l'exécution
  return $stmt->execute([
    'people_name' => $people->getName(),
    'people_firstname' => $people->getFirstname(),
    'people_birthdate' => $birthdateSqlVal,
  ]);
  // ------------------------------------------------------------------------------------------------------------

  // --- PARAMETRES ANONYMES ------------------------------------------------------------------------------------
  // 1 - Préparation de la requête : je déclare mes paramètres de requête
  // en ajoutant ':' devant le nom du paramètre
  // $stmt = $connection->prepare("INSERT INTO people (name, firstname, birthdate) VALUES (?, ?, ?);");
  // 2 - Exécution de la requête : j'exécute la requête préparée en lui passant
  // les valeurs de paramètres à utiliser lors de l'exécution
  // return $stmt->execute([$name, $firstname, $birthdateSqlVal]);
  // ------------------------------------------------------------------------------------------------------------
}
