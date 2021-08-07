<!DOCTYPE html>
<html>

<head>
    <title>BUBT Result</title>
    <link rel="icon" type="image/svg+xml" href="favicon.svg" />
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" />
</head>

<body>
    <?php include('./partials/nav.php'); ?>

    <?php include($content); ?>

    <?php include('./partials/footer.php'); ?>

    <!-- Compiled and minified JavaScript -->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        (function($) {
            $(function() {
                $(".sidenav").sidenav();
                $("select").formSelect();
            }); // end of document ready
        })(jQuery); // end of jQuery name space
    </script>
</body>

</html>