<!-- HTML for static distribution bundle build -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>{{config('swagger-lume.api.title')}}</title>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Source+Code+Pro:300,600|Titillium+Web:400,600,700" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/swagger-ui/<?php echo $swaggerVersion; ?>/swagger-ui.css" >
        <style>
            html
            {
                box-sizing: border-box;
                overflow: -moz-scrollbars-vertical;
                overflow-y: scroll;
            }
            *,
            *:before,
            *:after
            {
                box-sizing: inherit;
            }
            body {
                margin:0;
                background: #fafafa;
            }
        </style>
    </head>
    <body>
        <div id="swagger-ui"></div>
        <script src="//cdnjs.cloudflare.com/ajax/libs/swagger-ui/<?php echo $swaggerVersion; ?>/swagger-ui-bundle.js"> </script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/swagger-ui/<?php echo $swaggerVersion; ?>/swagger-ui-standalone-preset.js"> </script>
        <script>
            window.onload = function() {
                // Build a system
                const ui = SwaggerUIBundle({
                    dom_id: '#swagger-ui',
                    url: "<?php echo $documentationFile; ?>",

                    operationsSorter: {!! isset($operationsSorter) ? '"' . $operationsSorter . '"' : 'null' !!},
                    configUrl: {!! isset($additionalConfigUrl) ? '"' . $additionalConfigUrl . '"' : 'null' !!},
                    validatorUrl: {!! isset($validatorUrl) ? '"' . $validatorUrl . '"' : 'null' !!},

                    presets: [
                        SwaggerUIBundle.presets.apis,
                        SwaggerUIStandalonePreset
                    ],
                    plugins: [
                        SwaggerUIBundle.plugins.DownloadUrl
                    ],
                    layout: "StandaloneLayout"
                });
                window.ui = ui
            }
        </script>
    </body>
</html>

