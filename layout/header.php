<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <link href="index.css" rel="stylesheet">
  <title>
    <?php
    // Structure classique if/else
    // if (isset($title)) {
    //   echo $title;
    // } else {
    //   echo "WF3";
    // }
    //
    // Opérateur ternaire
    // echo isset($title) ? $title : "WF3";
    //
    // Null coalescing operator
    echo $title ?? "WF3";
    ?>
  </title>
</head>

<body>