<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        header {
            padding: 40px;
            text-align: center;
            background: #1abc9c;
            color: white;
            font-size: 30px;
        }

        header .content {
            font-size: 22px;
            color: #dec843;
        }

        footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: #5f3f27;
            color: white;
            text-align: center;
            padding: 15px;
        }
    </style>
    <title><?=$error ?? '' ?></title>
</head>
<body>
<!--    --><?// require VIEW_DIR .  '_templates/header.php'?>
    <main>
        <h2><?=$error ?? '' ?></h2>
    </main>
<!--    --><?// require VIEW_DIR .  '_templates/footer.php'?>
</body>
</html>
