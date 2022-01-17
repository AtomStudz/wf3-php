<?php
if (isset($_FILES['avatar'])) {

  $avatar = $_FILES['avatar'];
  $filename = $avatar['name'];
  $destination = __DIR__ . '/img/avatars/';

  if (move_uploaded_file($avatar['tmp_name'], $destination . $filename)) {
    echo 'avatar uploaded successfully';
  } else {
    echo 'avatar uploaded failed';
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>File upload</title>
</head>

<body>
  <h1>Upload avatar</h1>
  <form method="POST" enctype="multipart/form-data">
    <input type="file" name="avatar" id="avatar" />
    <button value="Envoyer">Envoyer</button>
  </form>
</body>

</html>