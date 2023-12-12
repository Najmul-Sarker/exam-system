<!-- resources/views/demo.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JSpreadsheet Demo</title>

    <!-- Load JSpreadsheet styles -->
    <link rel="stylesheet" href="https://bossanova.uk/jspreadsheet/v4/jexcel.css" type="text/css" />
</head>
<body>

    <div id="your-spreadsheet-id" style="width: 100%; height: 500px;"></div>

    <!-- Load JSpreadsheet script -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var script = document.createElement('script');
            script.type = 'module';
            script.src = 'node_modules/jspreadsheet-ce/dist/index.js';  // Replace with the path to your app.js
            document.head.appendChild(script);
        });
    </script>

    <script nomodule>
        document.addEventListener('DOMContentLoaded', function () {
            // Provide a fallback for older browsers
            var script = document.createElement('script');
            script.src = '/path/to/your/app.nomodule.js';  // Replace with the path to your app.nomodule.js
            document.head.appendChild(script);
        });
    </script>
</body>
</html>
