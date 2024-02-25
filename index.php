<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        .add-button, .remove-button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 4px;
        }

        .remove-button {
            background-color: #f44336;
        }

        .container {
            max-width: 800px;
            margin: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>ToDo List</h1>

        <?php
            // Connect to the database
            $conn = new mysqli('localhost', 'root', '', 'todolist');

            // Check the connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Display ToDo List items
            $sql = "SELECT * FROM todoitems";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo '<table>';
                echo '<tr><th>Title</th><th>Description</th><th>Action</th></tr>';
                while($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row['Title'] . '</td>';
                    echo '<td>' . $row['Description'] . '</td>';
                    echo '<td>';
                    echo '<form action="remove_item.php" method="post" style="display:inline;">';
                    echo '<input type="hidden" name="itemNum" value="' . $row['ItemNum'] . '">';
                    echo '<button class="remove-button" type="submit">Remove</button>';
                    echo '</form>';
                    echo '</td>';
                    echo '</tr>';
                }
                echo '</table>';
            } else {
                echo '<p>No to do list items exist yet.</p>';
            }

            // Close the database connection
            $conn->close();
        ?>

        <a href="add_item.php" class="add-button">Add Item</a>
    </div>
</body>
</html>
