<?php
$checkArray = [];
//echo (var_dump($checkArray));
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    while ($clear < 81 && $stop  < 30) {
        $clear = 0;
        //check if there is a nummbre double in a row

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
                        if (in_array($checkArray[$k], $possibleNumbers[$i][$j])) {
                            $possibleNumbers[$i][$j] = array_diff($possibleNumbers[$i][$j], $checkArray);
                        }
                    }
                }
            }
            $checkArray = [];
        }


        //echo ("<br>");
        $checkArray = [];

        // check if there is a number double in a column

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
                        if (in_array($checkArray[$k], $possibleNumbers[$i][$j])) {
                            $possibleNumbers[$i][$j] = array_diff($possibleNumbers[$i][$j], $checkArray);
                        }
                    }
                }
            }
            $checkArray = [];
        }


        //echo ("<br>");
        $checkArray = [];

        // check if there is a number double in a rect

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
                        if ($field[$i][$j] == 0 || $field[$i][$j] == null) {
                            for ($k = 0; $k < count($checkArray); $k++) {
                                if (in_array($checkArray[$k], $possibleNumbers[$i][$j])) {
                                    $possibleNumbers[$i][$j] = array_diff($possibleNumbers[$i][$j], $checkArray);
                                }
                            }
                        } else {
                            $possibleNumbers[$i][$j] = [];
                            $clear += 1;
                        }
                    }
                }
                $checkArray = [];
            }
        }

        

        //check if a nummber is only possible in one cell in a row
       /* for ($i = 0; $i < 9; $i++) {
            for ($j = 0; $j < 9; $j++) {
                for ($k=0; $k < count($possibleNumbers[$i][$j]); $k++) {
                    if (in_array($possibleNumbers[$i][$j][$k], $possibleNumbersRow)) {
                        $impossibleNumbersRow[$i] = $possibleNumbers[$i][$j][$k];
                    }else{
                        $possibleNumbersRow[$i] = $possibleNumbers[$i][$j][$k];
                    }
                    
                }
            }
        }
*/
        //echo (var_dump($possibleNumbers[8][8]));

        //echo ($falsch . "/ " . $falsch1 . "/ " . $falsch2);
        //for ($i = 0; $i < 9; $i++) {
        //    for ($j = 0; $j < 9; $j++) {
        //        echo "Possible numbers for cell ($i, $j): " . implode(", ", $possibleNumbers[$i][$j]) . "<br>";
        //    }
        //}
        for ($i = 0; $i < 9; $i++) {
            for ($j = 0; $j < 9; $j++) {
                if (count($possibleNumbers[$i][$j]) == 1) {
                    array_splice($possibleNumbers[$i][$j], 0, 0);
                    //echo "Cell ($i, $j) has only one possible number: " . implode(", ", $possibleNumbers[$i][$j]) . "<br>";
                    $_POST[$i.$j] = $possibleNumbers[$i][$j][0];
                    $field[$i][$j] = $possibleNumbers[$i][$j][0];
                }
            }
        }
        if ($clear == 81) {
            echo "<h1>Sudoku solved!</h1>";
        }
        $stop += 1;
    }
}