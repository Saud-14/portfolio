<?php
$conn = new mysqli("localhost", "root", "", "portfolio");

$sent = "";

if (isset($_POST['name'])) {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    $conn->query("INSERT INTO messages (name, email, message) VALUES ('$name', '$email', '$message')");

    $sent = "Thank you, $name. Your message was sent!";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saud Alshdayyid - Portfolio</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <nav>
        <div class="logo">Saud</div>
        <ul>
            <li><a href="#home">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#skills">Skills</a></li>
            <li><a href="#projects">Projects</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
        <button id="themeBtn" onclick="toggleTheme()">Dark / Light</button>
    </nav>

    <section id="home">
        <img src="images/saud.jpg" alt="My photo" class="photo">
        <h1>Hi, I'm Saud Alshdayyid</h1>
        <p class="title">Software Engineering Student &amp; Product Manager</p>
        <a href="#contact" class="btn">Contact Me</a>
    </section>

    <section id="about">
        <h2>About Me</h2>
        <?php
        $result = $conn->query("SELECT * FROM info");
        $row = $result->fetch_assoc();
        echo "<p>" . $row["bio"] . "</p>";
        echo "<p>Email: " . $row["email"] . "</p>";
        ?>

        <h3>Experience</h3>
        <?php
        $result = $conn->query("SELECT * FROM experience");
        while ($row = $result->fetch_assoc()) {
            echo "<div class='card'>";
            echo "<h4>" . $row["job_title"] . " - " . $row["company"] . "</h4>";
            echo "<p class='date'>" . $row["period"] . "</p>";
            echo "<p>" . $row["details"] . "</p>";
            echo "</div>";
        }
        ?>
    </section>

    <section id="skills">
        <h2>Skills</h2>
        <ul class="skills-list">
            <?php
            $result = $conn->query("SELECT * FROM skills");
            while ($row = $result->fetch_assoc()) {
                echo "<li>" . $row["skill_name"] . "</li>";
            }
            ?>
        </ul>
    </section>

    <section id="projects">
        <h2>Projects</h2>
        <?php
        $result = $conn->query("SELECT * FROM projects");
        while ($row = $result->fetch_assoc()) {
            echo "<div class='card'>";
            echo "<h4>" . $row["title"] . "</h4>";
            echo "<p>" . $row["description"] . "</p>";
            echo "</div>";
        }
        ?>
    </section>

    <section id="contact">
        <h2>Contact Me</h2>
        <p><?php echo $sent; ?></p>
        <form action="index.php#contact" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="5" required></textarea>

            <input type="submit" value="Send">
        </form>
    </section>

    <footer>
        <p>2026 Saud Alshdayyid</p>
    </footer>

    <script src="script.js"></script>
</body>
</html>
<?php
$conn->close();
?>
