<?php
require_once 'People.php';
require_once 'services/people.php';
require_once "layout/header.php";
?>

<h1>Les peoples</h1>

<?php
$stmt = findAllPeopleStatement();
?>
<div class="card-group">
  <?php
  while ($row = $stmt->fetchObject('People')) {
    require 'people-card.php';
  } ?>
</div>
<?php
require_once "layout/footer.php";
