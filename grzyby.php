<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="styl5.css">
        <title>Grzybobranie</title>
    </head>
    <body>
        <section id="miniatury">
            <a href="borowik.jpg"><img alt="Grzybobranie" src="borowik-miniatura.jpg"></a>
        </section>
        <section id="tytulowy">
            <h1>Idziemy na grzyby</h1>
        </section>
        <section id="lewy">
            <?php
                $connection = mysqli_connect('localhost', 'root', '', 'dane2');
                $zapytanie = "SELECT nazwa_pliku, potoczna FROM `grzyby`";
                $query = mysqli_query($connection, $zapytanie);
                
                while($wiersz = mysqli_fetch_assoc($query)) {
                    echo '<img src="' . $wiersz["nazwa_pliku"] . '" title="' . $wiersz["potoczna"] . '">';
                }
                mysqli_close($connection);
            ?>
        </section>
        <section id="prawy">
            <h2>Grzyby jadalne</h2>
            <?php
                $connection = mysqli_connect('localhost', 'root', '', 'dane2');
                $zapytanie = 'SELECT nazwa, potoczna FROM `grzyby` WHERE jadalny = 1;';
                $query = mysqli_query($connection, $zapytanie);
                
                while($wiersz = mysqli_fetch_assoc($query)) {
                    echo '<p>' . $wiersz["nazwa"] . '(' . $wiersz["potoczna"] . ')</p>';
                }
                mysqli_close($connection);
            ?>
            <h2>Polecamy do sosów</h2>
            <?php
                $connection = mysqli_connect('localhost', 'root', '', 'dane2');
                $zapytanie = 'SELECT grzyby.nazwa, potoczna, rodzina.nazwa FROM `grzyby` JOIN `rodzina` ON grzyby.rodzina_id = rodzina.id JOIN `potrawy` ON grzyby.potrawy_id = potrawy.id WHERE potrawy.nazwa = "sos";';
                $query = mysqli_query($connection, $zapytanie);
                
                echo "<ol>";
                while($wiersz = mysqli_fetch_row($query)) {
                    echo '<li>' . $wiersz[0] . '(' . $wiersz[1] . '), ' . $wiersz[2] . '</li>';
                }
                echo "</ol>";
                mysqli_close($connection);
            ?>
        </section>
        <section id="stopka">
            <p>Autor: 01234567890</p>
        </section>
    </body>
</html>    