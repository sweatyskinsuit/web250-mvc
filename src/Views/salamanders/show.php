<?php
// src/Views/salamanders/show.php
//
// This view displays a single salamander's details.
// It receives the $salamander variable from the controller.
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($salamander['name']) ?> - Salamander Details</title>
</head>

<body>
    <h1><?= htmlspecialchars($salamander['name']) ?></h1>

    <p><strong>Habitat:</strong></p>
    <p><?= nl2br(htmlspecialchars($salamander['habitat'])) ?></p>

    <p><strong>Description:</strong></p>
    <p><?= nl2br(htmlspecialchars($salamander['description'])) ?></p>

    <hr>

    <p><a href="../salamanders">← Back to salamanders list</a></p>
</body>

</html>