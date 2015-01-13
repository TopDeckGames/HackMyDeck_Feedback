<!DOCTYPE html>
<html>
    <head>
        <title>Hack My Deck - Rapports</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <link rel="stylesheet" href="css/bootflat.min.css" />
        <link rel="stylesheet" href="css/style.css" />
        <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
        <script type="text/javascript" src="js/script.js"></script>
    </head>
    <body>
        <div class="docs-header">
            <nav class="navbar navbar-default navbar-custom" role="navigation">
                <div class="container">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="index.php">HackMyDeck</a>
                    </div>
                </div>
            </nav>
        </div>
        <div class="container documents">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="well">
                        <h2>Rapport</h2>
                        <form method="post" action="#">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="email">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3"><label for="type">Type</label></div>
                                <div class="col-md-3"><label for="bug">Bug</label><input type="radio" id="bug" name="type" value="1" checked></div>
                                <div class="col-md-4"><label for="suggestion">Suggestion</label><input type="radio" id="suggestion" name="type" value="2"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="message">Message (500 charact&egrave;res)</label>
                                    <textarea class="form-control" name="message" rows="5" maxlength="500"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2 col-md-offset-10">
                                    <button class="btn btn-primary submit" type="button">Envoyer</button>
                                    <img src="loader.gif" class="loader" alt="loader">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>