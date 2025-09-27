<?php
include 'db.php';

$result = $conn->query("SELECT * FROM students");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Management System</title>
</head>
<body>
    <h2>Students</h2>
    <a href="add.php">Add New Student</a>
    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Course</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= htmlspecialchars($row['name']) ?></td>
            <td><?= htmlspecialchars($row['email']) ?></td>
            <td><?= htmlspecialchars($row['course']) ?></td>
            <td>
                <a href="edit.php?id=<?= $row['id'] ?>">Edit</a> | 
                <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Delete this student?')">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
