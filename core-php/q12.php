<!-- For Loop (Addition): Add all integers from 0 to 30 and display the total. -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="post">
        <label>Enter number:</label>
        <input type="text" name="num">
        <input type="submit" name="submit">
    </form>

</body>

</html>
<?php
if (isset($_POST['submit'])) 
{
    $number = $_POST['num'];
    $sum = $number;
    for ($i = 0; $i <= $sum; $i++) 
    {
        echo $i." ";
    }
    $sum += $i;
    echo "<br><strong>Sum = $sum</strong>";
}
?>