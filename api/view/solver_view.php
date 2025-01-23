<?php
$i = 0;
$j = 0;
$k = 0;
$l = 0;
$falsch = 0;
$falsch1 = 0;
$falsch2 = 0;
$numbers = [];
$checkNumbers = array();
$checkArray = array();
$possibleNumbers[][] = array();
$row = 0;
$column = 0;
$field = array_fill(0, 9, array_fill(0, 9, 0));
$clear = 0;
$stop = 0;
$possibleNumbersRow = [];
$impossibleNumbersRow = [];
for ($i = 0; $i < 9; $i++) {
    for ($j = 0; $j < 9; $j++) {

        $possibleNumbers[$i][$j] = [1, 2, 3, 4, 5, 6, 7, 8, 9];
    }
}


require "view/templates/header.php";


?>
<h1>
    Solver
</h1>
<div class="form_solver">
    <form action="" method="POST">
        <?php
        for ($x = 0; $x < 9; $x += 3) {
            for ($i = $x; $i < $x + 3; $i++) {
                for ($y = 0; $y < 9; $y += 3) {
                    for ($j = $y; $j < $y + 3; $j++) { ?>
                        <label for="number">Numbers<?= $i . $j ?></label>
                        <input type="text" class="input_number" id="<?= $i . $j ?>" name="<?= $i . $j ?>" value="<?= $field[$i][$j] ?>">
        <?php

                    }
                    echo "|";
                }
                echo "<br>";
            }
            echo "<br>";
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            for ($row = 0; $row < 9; $row++) {
                for ($column = 0; $column < 9; $column++) {
                    $field[$row][$column] = $_POST[$row . $column];
                }
            }
        }
        ?>
        <div class="form_solver">
        <button type="submit" class="button">submit</button>
        </div>
    </form>
</div>
<?php

require 'model/solver_model.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    for ($row = 0; $row < 9; $row++) {
        for ($column = 0; $column < 9; $column++) {

            echo ($field[$row][$column]);
        }
    }
    echo "<br>";

?>
    <form action="" method="POST">
        <?php
        for ($x = 0; $x < 9; $x += 3) {
            for ($i = $x; $i < $x + 3; $i++) {
                for ($y = 0; $y < 9; $y += 3) {
                    for ($j = $y; $j < $y + 3; $j++) { ?>
                        <label for="number">Numbers<?= $i . $j ?></label>
                        <input type="number" class="input_number" id="<?= $i . $j ?>" name="<?= $i . $j ?>" value="<?= $_POST[$i . $j] ?>">
        <?php

                    }
                    echo "|";
                }
                echo "<br>";
            }
            echo "<br>";
        }
        ?>
        <button type="submit" class="button">submit</button>
    </form>
<?php
}
