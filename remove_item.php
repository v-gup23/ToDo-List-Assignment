<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $conn = new mysqli('localhost', 'root', '', 'todolist');
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $itemNum = $_POST['itemNum'];

        $sql = "DELETE FROM todoitems WHERE ItemNum = $itemNum";
        $conn->query($sql);

        $conn->close();

        header("Location: index.php");
        exit();
    }
?>
