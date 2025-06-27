<!-- Chessboard Pattern: Use a nested loop to create a chessboard pattern (8x8 grid). -->
<!DOCTYPE html>
<html>
<head>
    <title>Simple Chessboard</title>
    <style>
        table {
            border-collapse: collapse;
            margin: 50px auto;
        }
        td {
            width: 60px;
            height: 60px;
        }
    </style>
</head>
<body>
    <h2 style="text-align: center;">8x8 Chessboard</h2>
    <table border="1">
        <?php
        for ($row = 0; $row < 8; $row++) {
            for ($col = 0; $col < 8; $col++) {
                if (($row + $col) % 2 == 0) {
                    $color = 'white';
                } else {
                    $color = 'black';
                }
                echo "<td style='background-color: $color;'></td>";
            }
            echo "</tr>"; 
        }
        ?>
    </table>
</body>
</html>
