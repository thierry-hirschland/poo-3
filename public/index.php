<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <main>
        <?php
        require_once "../src/Archer.php";
        require_once "../src/Soldier.php";

        const MIN_X = -7;
        const MAX_X = 7;
        const MIN_Y = -7;
        const MAX_Y = 7;

        session_start();
        $archer = new Archer();
        $soldier = new Soldier();
        $_SESSION['Archer'] = $archer;
        $_SESSION['Soldier'] = $soldier;

        tabDisplayInit();
        function tabDisplayInit()
        {
            for ($i=MIN_X; $i<=MAX_X; $i++) {
                for ($j=MIN_Y; $j<=MAX_Y; $j++) {
                    if ($i === 0 && $j === 0) {
                        $displayWarrior = ' Unit ';
                    } else {
                        $displayWarrior = '';
                    };

                    echo "<div class='tab col_lig_" . $i . "_" . $j ."$displayWarrior '>$i $j</div>";
                };
            }
        }
        ?>
    </main>
    <form action="game.php" method="POST">
        <div>
            <label for="warrior">Choisir le guerrier :</label>
            <select id="warrior" name="warrior">
            <option value="defaut">Choisissez le guerrier</option>
                <option value="Soldier">Le Soldat</option>
                <option value="Archer">L'archer</option>
            </select>
        </div>
        <div>
            <label for="direction">Direction :</label>
                <select id="direction" name="direction">
                <option value="defaut">Choisissez la direction</option>
                <option value="top">en haut</option>
                <option value="down">en bas</option>
                <option value="left">à gauche</option>
                <option value="right">à droite</option>
            </select>
        </div>
        
            <button type="submit">Submit</button>
    </form>
    

</body>
</html>
