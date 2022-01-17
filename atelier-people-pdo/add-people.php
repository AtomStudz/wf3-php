<?php
require_once 'People.php';
require_once 'services/people.php';
require_once 'alert.php';

if (isset($_POST['name']) && isset($_POST['firstname'])) {
  $newPeople = new People();
  $newPeople->setName($_POST['name']);
  $newPeople->setFirstname($_POST['firstname']);

  $birthdate = $_POST['birthdate'] === '' ? null : new DateTime($_POST['birthdate']);
  $newPeople->setBirthDate($birthdate);

  $inserted = addPeople($newPeople);

  if ($inserted === false) {
    displayAlert(AlertLevel::DANGER, "Une erreur est survenue lors de l'enregistrement !");
  } else {
    displayAlert(AlertLevel::SUCCESS, "La people a été correctement enregistrée");
  }
}

require_once "layout/header.php";
?>

<h1>Ajouter une people</h1>

<form class="col-12 col-sm-8 col-md-6 col-lg-4" method="post">
  <div class="mb-3">
    <label for="name" class="form-label">Nom</label>
    <input type="text" class="form-control" id="name" name="name" required />
  </div>
  <div class="mb-3">
    <label for="firstname" class="form-label">Prénom</label>
    <input type="text" class="form-control" id="firstname" name="firstname" required />
  </div>
  <div class="mb-3">
    <label class="form-label" for="birthdate">Date de naissance</label>
    <input type="date" class="form-control" id="birthdate" name="birthdate" />
  </div>
  <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>
<?php
require_once "layout/footer.php";
