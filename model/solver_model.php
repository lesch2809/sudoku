<?php
$checkArray = [];
echo (var_dump($checkArray));
//check if there is a nummbre double in a row
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $i = 1;
    $j = 1;
    for ($i = 0; $i < 9; $i++) {
        // die doppelten zahlen im Array speichern
        for ($j = 0; $j < 9; $j++) {
            if (in_array($field[$i][$j], $checkArray)) {
                $falsch += 1;
            }
            $checkArray[] = $field[$i][$j];
        }
        // löschen der nicht möglichen Zahlen anhand der Zahlen im Array
        for ($j = 0; $j < 9; $j++) {
            if ($field[$i][$j] == 0 || $field[$i][$j] == null) {
                for ($k = 0; $k < count($checkArray); $k++) {
                    if (in_array($checkArray[$k], $possibleNumbers[$i ][ $j])) {
                        array_splice($possibleNumbers[$i ][ $j], $checkArray[$k]);                    //falsch
                   //     $possibleNumbers[$i ][ $j] = array_diff($possibleNumbers[$i ][ $j], $checkArray[$k]);
                    }
                }
                echo ($possibleNumbers[0][0]);
            }
        }
        $checkArray = [];
    }
}

echo ("<br>");
$checkArray = [];

// check if there is a number double in a column
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $i = 1;
    $j = 1;
    for ($j = 0; $j < 9; $j++) {
        for ($i = 0; $i < 9; $i++) {
            if (in_array($field[$i][$j], $checkArray)) {
                $falsch1 += 1;
            }
            $checkArray[] = $field[$i][$j];
        }
        // löschen der nicht möglichen Zahlen anhand der Zahlen im Array
        for ($i = 0; $i < 9; $i++) {
            if ($field[$i][$j] == 0 || $field[$i][$j] == null) {
                for ($k = 0; $k < count($checkArray); $k++) {
                    if (in_array($checkArray[$k], $possibleNumbers[$i ][ $j])) {
                        array_splice($possibleNumbers[$i ][ $j], $checkArray[$k]);
                    }
                }
            }
        }
        $checkArray = [];
    }
}

echo ("<br>");
$checkArray = [];

// check if there is a number double in a rect
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $i = 0;
    $j = 0;
    for ($x = 0; $x < 9; $x += 3) {
        for ($y = 0; $y < 9; $y += 3) {
            for ($i = $x; $i < $x + 3; $i++) {
                for ($j = $y; $j < $y + 3; $j++) {
                    if (in_array($field[$i][$j], $checkArray)) {
                        $falsch2 += 1;
                    }
                    $checkArray[] = $field[$i][$j];
                }
            }
            // löschen der nicht möglichen Zahlen anhand der Zahlen im Array
            for ($i = $x; $i < $x + 3; $i++) {
                for ($j = $y; $j < $y + 3; $j++) {
                    for ($k = 0; $k < count($checkArray); $k++) {
                        if (in_array($checkArray[$k], $possibleNumbers[$i ][ $j])) {
                            array_splice($possibleNumbers[$i ][ $j], $checkArray[$k]);
                        }
                    }
                }
            }
            $checkArray = [];
        }
    }
}
echo ($possibleNumbers[8][8]);
echo (array_values($possibleNumbers[$i][$j]));
echo ($falsch . "/ " . $falsch1 . "/ " . $falsch2);
for ($i = 0; $i < 9; $i++) {
    for ($j = 0; $j < 9; $j++) {
        echo "Possible numbers for cell ($i, $j): " . implode(", ", $possibleNumbers[$i ][ $j]) . "<br>";
    }
}
