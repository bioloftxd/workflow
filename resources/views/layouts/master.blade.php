<!doctype html>
<html lang="en">
<head>
    @include("layouts.head")
</head>
<body>
    @if(Auth::guest())
        @yield("content")
    @else
        @include("layouts.nav")
        @yield("content")
    @endif
<footer>
    @include("layouts.footer")
</footer>
</body>
</html>
