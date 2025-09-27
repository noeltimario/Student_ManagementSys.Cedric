<?php
include 'db.php';

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = intval($_GET['id']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $course = $conn->real_escape_string($_POST['course']);

    $sql = "UPDATE students SET name='$name', email='$email', course='$course' WHERE id=$id";
    if ($conn->query($sql)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}

$result = $conn->query("SELECT * FROM students WHERE id=$id");
if ($result->num_rows == 0) {
    echo "Student not found!";
    exit();
}

$student = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
</head>
<body>
    <h2>Edit Student</h2>
    <form method="post" action="">
        <label>Name:</label><br>
        <input type="text" name="name" value="<?= htmlspecialchars($student['name']) ?>" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="<?= htmlspecialchars($student['email']) ?>" required><br><br>

        <label>Course:</label><br>
        <input type="text" name="course" value="<?= htmlspecialchars($student['course']) ?>" required><br><br>

        <input type="submit" value="Update Student">
    </form>
    <a href="index.php">Back to List</a>
</body>
</html>
