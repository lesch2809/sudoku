<?php
require "view/templates/header.php"
?>

<script>
    fetch('https://sudoku-api.vercel.app/api/dosuku', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        const grid = data.newboard.grids[0].value;
        populateSudokuGrid(grid);
    })
    .catch(error => console.error('Error fetching Sudoku:', error));

    function populateSudokuGrid(grid) {
        for (let i = 0; i < 9; i++) {
            for (let j = 0; j < 9; j++) {
                const cellId = `${i}${j}`;
                const cell = document.getElementById(cellId);
                if (cell) {
                    cell.innerText = grid[i][j] !== 0 ? grid[i][j] : '';
                }
            }
        }
    }
</script>
<div class="form_solver">
<form action="" method="POST" id="form_generate">
    <table border = "1">
        <?php
        for ($x = 0; $x < 9; $x++) {
            echo "<tr>";
            for ($y = 0; $y < 9; $y++) { ?>
                <td id="<?= $x . $y ?>" name="<?= $x . $y ?>" value="0">
                   0
                </td>
                <?php
            }
            echo "</tr>";
        }
        ?>
    </table>
    <div class="form_solver">
    <button type="submit" class="button" id="submit_generate">submit</button>
    </div>
</form>
</div>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require 'model/generate_model.php';
}