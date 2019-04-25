<!doctype html>
<html lang="fr">
<head>
    <base href="<?php /** @noinspection PhpUndefinedVariableInspection */
    /** @noinspection PhpUndefinedVariableInspection */
    echo $webRoot; ?>" >

    <meta charset="UTF-8" />
    <meta name="author" content="">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu:500" rel="stylesheet">
    <link rel="icon" href="Public/img/favicon.ico">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!--suppress HtmlUnknownTarget, HtmlUnknownTarget -->
    <link rel="stylesheet" href="Public/css/template.css">
    <!--suppress HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget -->
    <link rel="stylesheet" href="Public/css/content.css">

    <link rel="stylesheet" href="Public/css/materialize.css">

    <title><?php echo $title; ?></title>

</head>
<body id="body">
<!--header-->
<header class="header">
            <div class="header-container height-nav">
                <?php echo $nav ?>
            </div>
        </header>

<div class="content">
    <?php /** @noinspection PhpUndefinedVariableInspection */
    echo $contain; ?>
    <div class="sidenav-overlay"></div>
</div>


    <!--suppress HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget -->
    <script type="text/javascript" src="Public/js/jquery.js"></script>

    <!--suppress HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget -->
    <script type="text/javascript" src="Public/js/materialize.js"></script>
    <!--suppress HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget -->
    <script type="text/javascript" src="Public/js/java.js"></script>

</body>
<?php /** @noinspection PhpIncludeInspection */
require_once 'View/Site/__common/footer.php'; ?>
</html>
