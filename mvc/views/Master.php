<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- css -->
    <link href="public/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="public/lib/font-awesome-4.7.0/font-awesome.min.css" rel="stylesheet">
    <link href="public/css/content.css" rel="stylesheet">

    <!-- js -->
    <script src="public/lib/jquery/jquery-3.5.1.slim.min.js" type="text/javascript"></script>
    <script src="public/lib/bootstrap/bootstrap.bundle.min.js" type="text/javascript"></script>
    
    <title>Trang Chủ</title>

</head>
<body>
    <?php require_once "./mvc/views/blocks/HeaderMenu.php" ?>

    <div class="content">
        <?php require_once "./mvc/views/pages/" . $view . ".php" ?>
    </div>

</body>
</html>