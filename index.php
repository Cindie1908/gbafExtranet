<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
        rel="stylesheet"
    >
    <link rel="stylesheet" href="styles.css" type="text/css" >
</head>
<body class="d-flex flex-column min-vh-100">
    <div class="container">

    <!-- Navigation -->
    <?php include_once('header.php'); ?>

    <!-- Entête -->
    <?php include_once('title.php'); ?>

    <!-- Liste -->
    <?php include_once('variables.php'); ?>
    <?foreach ($actors as $actor): ?> 
        <article>
            <p><?php echo $actor['logo']; ?></p>
            <p><?php echo $actor['description']; ?></p>
            <p><?php echo $actor['nom']; ?></p>
        </article>
    <?php endforeach ?>

    <?php include_once('footer.php'); ?>
</body>
</html>