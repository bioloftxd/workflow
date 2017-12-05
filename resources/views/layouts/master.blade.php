<!doctype html>
<html lang="en">
<head>
    @include("layouts.head")
</head>
<body>
<header>
    @include("layouts.nav")
</header>
<main class="container-fluid">
    @yield("content")
</main>
</body>
<footer>
    @include("layouts.footer")
</footer>
</html>

