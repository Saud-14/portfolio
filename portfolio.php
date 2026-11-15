<?php
$conn = new mysqli("localhost", "root", "", "portfolio");

if (isset($_POST['name'])) {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    $conn->query("INSERT INTO messages (name, email, message) VALUES ('$name', '$email', '$message')");

    echo "Thank you, $name. Your message was sent! <a href='index.html'>Back to Home</a>";
}

else {
    $result = $conn->query("SELECT * FROM info");
    $row = $result->fetch_assoc();
    echo "<section id='about'><h2>About Me</h2>";
    echo "<p>" . $row["bio"] . "</p>";
    echo "<p>Email: " . $row["email"] . "</p>";

    echo "<h3>Experience</h3>";
    $result = $conn->query("SELECT * FROM experience");
    while ($row = $result->fetch_assoc()) {
        echo "<div class='card'><h4>" . $row["job_title"] . " - " . $row["company"] . "</h4>";
        echo "<p class='date'>" . $row["period"] . "</p><p>" . $row["details"] . "</p></div>";
    }
    echo "</section>";

    echo "<section id='skills'><h2>Skills</h2><ul class='skills-list'>";
    $result = $conn->query("SELECT * FROM skills");
    while ($row = $result->fetch_assoc()) {
        echo "<li>" . $row["skill_name"] . "</li>";
    }
    echo "</ul></section>";

    echo "<section id='projects'><h2>Projects</h2>";
    $result = $conn->query("SELECT * FROM projects");
    while ($row = $result->fetch_assoc()) {
        echo "<div class='card'><h4>" . $row["title"] . "</h4><p>" . $row["description"] . "</p></div>";
    }
    echo "</section>";
}

$conn->close();
?>
