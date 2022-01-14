<?php
require_once 'constants.php';

function getConnection(): PDO
{
  $dbConfiguration = parse_ini_file('config/db.ini');
  $dsn = "mysql:dbname=" . $dbConfiguration['db_name'] . ";host=" . $dbConfiguration['host'] . ";charset" . $dbConfiguration['charset'];

  try {
    $pdo = new PDO($dsn, $dbConfiguration['user'], $dbConfiguration['password']);
  } catch (PDOException $e) {
    echo "Erreur de connexion à la base de données<br />";
    switch ($e->getCode()) {
      case 1045:
        echo "Identifiants incorrects";
        break;
      case 2019:
        echo "Jeu de caractères inconnu";
        break;
      default:
        echo "Une erreur est survenue";
    }
    exit;
  }

  return $pdo;
}