
<!--  Create a form that takes a user's name and email. Use the $_POST super global to 
display the entered data. -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Global variables</title>
</head>
   <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 40px;
        }

        .container {
            max-width: 400px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
        }

        td {
            padding: 10px;
        }

        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #2980b9;
        }

        .result {
            margin-top: 20px;
            padding: 10px;
            background-color: #dff0d8;
            color: #3c763d;
            border: 1px solid #d6e9c6;
            border-radius: 5px;
        }
    </style>

<body>

    <div class="container">

        <form method="post">
            <table>
                <tr>
                    <td>Enter your name : </td>
                    <td><input type="text" name="name" placeholder="Enter user name...!"></td>
                </tr>
                <tr>
                    <td>Entert your email : </td>
                    <td><input type="email" placeholder="abc@gmail.com" name="email"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" name="submit"></td>
                </tr>
            </table>

            <?php

            if (isset($_POST['submit'])) {

                $u_name = $_POST['name'];

                $u_email = $_POST['email'];


                echo "<div class='result'>$u_name <br> $u_email</div>" . "<br>";
            }
            ?>
        </form>
    </div>
</body>

</html>
