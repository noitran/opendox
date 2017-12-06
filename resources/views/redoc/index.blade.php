<!DOCTYPE html>
<html>
    <head>
        <title>ReDoc</title>
        <!-- needed for adaptive design -->
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--
        ReDoc doesn't change outer page styles
        -->
        <style>
            body {
                margin: 0;
                padding: 0;
            }
        </style>
    </head>
    <body>
        <redoc spec-url='<?php echo $documentationFile; ?>'></redoc>
        <script src="https://cdn.jsdelivr.net/npm/redoc@2.0.0-alpha.4/bundles/redoc.standalone.js"> </script>
    </body>
</html>
