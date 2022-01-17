<div class="card">
  <img src="../images/<?php echo $row->getAvatar() ?? 'default.jpg'; ?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?php echo $row->getFirstname() . ' ' . $row->getName(); ?></h5>
    <p class="card-text">
      <small class="text-muted">
        <?php
        echo $row->getBirthdate() ? $row->getBirthdate()->format('Y-m-d') : '-';
        ?>
      </small>
    </p>
  </div>
</div>