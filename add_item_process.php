<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $conn = new mysqli('localhost', 'root', '', 'todolist');
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $title = $_POST['title'];
        $description = $_POST['description'];

        $sql = "INSERT INTO todoitems (Title, Description) VALUES ('$title', '$description')";
        $conn->query($sql);

        $conn->close();
        header("Location: index.php");
        exit();
    }
?>
