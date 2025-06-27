<!DOCTYPE html>
<html>
<head>
    <title>Restaurant Menu</title>
</head>
 <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            padding: 40px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h2 {
            color: #333;
        }

        form {
            background-color: #fff;
            padding: 20px 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }

        input[type="text"] {
            padding: 10px;
            width: 250px;
            margin-right: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #218838;
        }

        h3 {
            margin-top: 0;
            color: #007bff;
        }

        ul {
            background: #fff;
            padding: 20px;
            width: 300px;
            border-radius: 10px;
            list-style-type: none;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        li {
            padding: 8px 0;
            border-bottom: 1px solid #eee;
        }

        li:last-child {
            border-bottom: none;
        }

        p {
            color: red;
            font-weight: bold;
        }
    </style>
<body>

    <h2>Restaurant Menu</h2>
    <form method="post">
        Enter your choice (starter / main course / dessert): 
        <input type="text" name="choice">
        <input type="submit" value="Show Menu" name="submit">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $choice = $_POST['choice'];

        switch ($choice) {
            case "starter":
                echo "<h3>Starters</h3>";
                echo "<ul>
                        <li>Spring Rolls - ₹180</li>
                        <li>Nachos with Cheese - ₹200</li>
                        <li>Corn Tikki - ₹160</li>
                      </ul>";
                break;

            case "main course":
                echo "<h3>Main Course</h3>";
                echo "<ul>
                        <li>Shahi Paneer - ₹320</li>
                        <li>Chole Bhature - ₹180</li>
                        <li>Veg Biryani - ₹260</li>
                      </ul>";
                break;

            case "dessert":
                echo "<h3>Desserts</h3>";
                echo "<ul>
                        <li>Gulab Jamun - ₹90</li>
                        <li>Rasmalai - ₹110</li>
                        <li>Kulfi - ₹80</li>
                      </ul>";
                break;

            default:
                echo "<p style='color:red;'>Invalid choice. Please enter: starter, main course, or dessert.</p>";
        }
    }
    ?>

</body>
</html>
