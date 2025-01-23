<?php
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
}

for ($j = 0; $j < 9; $j++) {
    for ($i = 0; $i < 9; $i++) {
        if (in_array($field[$i][$j], $checkArray)) {
            $falsch += 1;
        }
        $checkArray[] = $field[$i][$j];
    }
}

for ($x = 0; $x < 9; $x += 3) {
    for ($y = 0; $y < 9; $y += 3) {
        for ($i = $x; $i < $x + 3; $i++) {
            for ($j = $y; $j < $y + 3; $j++) {
                if (in_array($field[$i][$j], $checkArray)) {
                    $falsch += 1;
                }
                $checkArray[] = $field[$i][$j];
            }
        }
    }
}
if ($falsch == 0) {
    echo "Alles richtig. Für ein neues Sudoku einfach reloaden";
} else {
    echo "falsch";
}
?>