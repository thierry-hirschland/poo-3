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

        $warriorCat =  $_POST['warrior'];
        $direction =  $_POST['direction'];
        session_start();

        if (!isset($_SESSION['Archer'])) {
            $archer = new Archer();
            $_SESSION['Archer'] = $archer;
        } else {
            $archer = $_SESSION['Archer'];
        };
        if (!isset($_SESSION['Soldier'])) {
            $soldier = new Soldier();
            $_SESSION['Soldier'] = $soldier;
        } else {
            $soldier = $_SESSION['Soldier'];
        };
        

        $directionsValues = ($direction === 'Archer')? ['Archer','Soldier'] : ['Soldier','Archer'];

        moveInTab($warriorCat, $direction);

        tabDisplay($archer, $soldier);

        function tabDisplay(Archer $a, Soldier $s)
        {
            $alig = $a->getPositionX();
            $acol = $a->getPositionY();
            $slig = $s->getPositionX();
            $scol = $s->getPositionY();
            for ($i=MIN_X; $i<=MAX_X; $i++) {
                for ($j=MIN_Y; $j<=MAX_Y; $j++) {
                    $w1 = ($j === $alig && $i === $acol) ? ' Archer ' : '';
                    $w2 = ($j === $slig && $i === $scol) ? ' Soldier ' : '';
                    $w3 = ($j === 0 && $i === 0) ? ' Unit ' : '';

                    echo "<div class='tab col_lig_" . $i . "_" . $j ."$w1 $w2 $w3 '>$i $j</div>";
                };
            };
        };

        function moveInTab(string $warriorCat, string $direction)
        {
            $warrior = $_SESSION[$warriorCat];
            $warrior->walk($direction);
            switch ($direction) {
                case 'left':
                    if ($warrior->getPositionX() < MIN_X) {
                        $warrior->setPositionX(MIN_X);
                    }
                    break;
                case 'right':
                    if ($warrior->getPositionX() > MAX_X) {
                        $warrior->setPositionX(MAX_X);
                    }
                    break;
                case 'top':
                    if ($warrior->getPositionY() < MIN_Y) {
                        $warrior->setPositionY(MIN_Y);
                    }
                    break;
                case 'down':
                    if ($warrior->getPositionY() > MAX_Y) {
                        $warrior->setPositionY(MAX_Y);
                    }
                    break;
            };
        }

        ?>
    </main>
    <form action="game.php" method="POST">
        <div>
            <label for="warrior">Choisir le guerrier :</label>
            <select id="warrior" name="warrior">
                <?php

                    $warriorCat =  $_POST['warrior'];

                    $warriorsValues = ($warriorCat === 'Archer')? ['Archer','Soldier'] : ['Soldier','Archer'];
                    foreach ($warriorsValues as $value) {
                        echo '<option value="' . $value . '">' . $value . '</option>';
                    }
                ?>

            </select>
        </div>
        <div>
            <label for="direction">Direction :</label>
            <select id="direction" name="direction">
                <?php

                    $direction =  $_POST['direction'];
                    switch ($direction) {
                        case 'left':
                            $directionsValues = ['left', 'right', 'top', 'down'];
                            break;
                        case 'right':
                            $directionsValues = ['right', 'left', 'top', 'down'];
                            break;
                        case 'top':
                            $directionsValues = ['top', 'down', 'left', 'right'];
                            break;
                        case 'down':
                            $directionsValues = ['down', 'top', 'left', 'right'];
                            break;
                    }
                    foreach ($directionsValues as $value) {
                        echo '<option value="' . $value . '">' . $value . '</option>';
                    }
                ?>
            </select>
        </div>

        <button type="submit">Submit</button>
    </form>
</body>

</html>