<!doctype html>
<html lang="ca">
<head>
    <title>Untitled page</title>
    <link href="/assets/global.css" rel="stylesheet"/>
    <link href="/../../src/css/table.css" rel="stylesheet"/>
    <meta charset="utf-8" />
</head>
<body>
<header>
    <h1>Pàgina principal</h1>
    <nav>
        <ul>
            <li>
                <a href="/">Pàgina principal</a>
            </li>
            <li>
                <a href="/login_list.php">Veure inicis de sessió</a>
            </li>

            <li>
                <a href="/login_create.php">Iniciar sessió</a>
            </li>
            <li>
                <a href="/logout.php">Tancar sessió</a>
            </li>

        </ul>
    </nav>
</header>
<main>
    <?=$content?>
</main>
</body>
</html>