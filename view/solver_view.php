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
require "view/templates/header.php";


?>
<h1>
    Solver
</h1>

<form action="" method="POST">
    <?php
    for ($x = 0; $x < 9; $x += 3) {
        for ($i = $x; $i < $x + 3; $i++) {
            for ($y = 0; $y < 9; $y += 3) {
                for ($j = $y; $j < $y + 3; $j++) { ?>
                    <label for="number">Numbers<?= $i . $j ?></label>
                    <input type="number" id="<?= $i . $j ?>" name="<?= $i . $j ?>" value="0">
                    <?php 
                    $possibleNumbers[$i ][ $j] = [1, 2, 3, 4, 5, 6, 7, 8, 9];
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
    <button type="submit">submit</button>
</form>
<?php


for ($row = 0; $row < 9; $row++) {
    for ($column = 0; $column < 9; $column++) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            echo ($field[$row][$column]);
        }
    }
    echo "<br>";
}
require 'model/solver_model.php';