<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coparison website</title>
    @vite('resources/css/app.css')
</head>
<body class="text-center px-8 py-12">
  <h1 class="texttitle">Welcome to the Prices Comparison Website</h1>
  <h2>Click The Button Below To Get Star.</h2>

  <a href="/home" class="btn mt-4 inline-block">
    Get Star!
  </a>
</body>
</html>