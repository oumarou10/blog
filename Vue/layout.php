<!DOCTYPE HTML>

<html>
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"/>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title> Bienvenue sur mon blog !</title>
</head>

<body>
    <div class="container">

        <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="?action=accueilController">Mon Blog</a>
                        </div>
                        <div id="navbar" class="navbar-collapse collapse">
                            <ul class="nav navbar-nav">
                                <li class="active"><a href="?action=accueilController">Accueil</a></li>
                                <li><a href="?action=postsController">Blog</a></li>
                                <li><a href="?action=addPostController">Ajout blog</a></li>
                            </ul>
                            <a class="pull-right btn btn-info account" href="#">Account</a>
                        </div><!--/.nav-collapse -->
                    </div><!--/.container-fluid -->
                </nav>

        <p> Bienvenue sur mon blog <?=$titre?></p>

        <div class="container">


            <?= $contenu ?>

        </div>

    </div>

</body>
</html>`