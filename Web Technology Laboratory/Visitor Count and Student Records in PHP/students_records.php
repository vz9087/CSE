<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "weblab";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM student";
$result = $conn->query($sql);

$students = [];

echo "<table border='2'><caption>Before Sorting</caption>";
echo "<tr><th>USN</th><th>NAME</th><th>Marks</th></tr>";

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>{$row['usn']}</td><td>{$row['name']}</td><td>{$row['marks']}</td></tr>";
        $students[] = $row;
    }
}
echo "</table>";

// Sort students by USN in descending order
usort($students, function($a, $b) {
    return strcmp($b['usn'], $a['usn']);
});

echo "<br><table border='2'><caption>After Sorting</caption>";
echo "<tr><th>USN</th><th>NAME</th><th>Marks</th></tr>";

foreach ($students as $student) {
    echo "<tr><td>{$student['usn']}</td><td>{$student['name']}</td><td>{$student['marks']}</td></tr>";
}
echo "</table>";

$conn->close();
?>