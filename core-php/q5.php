<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Even/Odd Checker</title>
 
</head>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            margin-top: 10px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            padding: 10px 20px;
            margin-top: 15px;
            font-size: 16px;
            background-color: #007BFF;
            border: none;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .result {
            margin-top: 20px;
            padding: 10px;
            font-weight: bold;
            border-radius: 5px;
        }

        .result.even {
            background-color: #d4edda;
            color: #155724;
        }

        .result.odd {
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>
<body>
    <div class="container">
        <form method="post">
            <table>
                <tr>
                    <td >Enter a number and checked even or odd </td>
                </tr>
                <tr>
                    <td ><input type="text" name="number" placeholder="Enter Only integer value...."></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Check" name="submit"></td>
                </tr>
            </table>
        </form>

        <?php
        if (isset($_POST['submit'])) {

            $num = $_POST["number"];

            if ($num){
                if ($num % 2 == 0) {
                    echo "<div class='result even'>$num is an Even number.</div>";
                } else {
                    echo "<div class='result odd'>$num is an Odd number.</div>";
                }
            } else {
                echo "<div class='result odd'>Please enter a valid number!</div>";
            }
        }
        ?>
    </div>
</body>

</html>