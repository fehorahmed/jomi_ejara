<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Hi</title>


</head>

<body>
    <style>
        @font-face {
            font-family: "SolaimanLipi";
            src: url({{ storage_path('fonts/SolaimanLipi12.ttf') }});
        }

        .p {
            font-family: "SolaimanLipi";
        }
    </style>
    <h1>{{ $title }}</h1>
    <p>{{ $date }}</p>
    <p>আমার সোনার বাংলা</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
</body>

</html>
