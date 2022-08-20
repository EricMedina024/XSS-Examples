<?php
    $config = parse_ini_file('/usr/local/config.ini', true);
    $dbconfig = $config['database'];
    $source = "mysql:host=" . $dbconfig['host'] .";dbname=" . $dbconfig['database'] . ";charset=" . $dbconfig['charset'];
    $pdo = new PDO($source, $dbconfig['user'], $dbconfig['password']);
    if (isset($_POST['name']) && isset($_POST['comment'])) {
        $stmt = $pdo->prepare('INSERT INTO comments VALUES (?, ?)');
        $stmt->execute([$_POST['name'], $_POST['comment']]);
    }
?>

<html>
    <body>
        <a href="/">Home</a>
        <form method="post" action="remediated.php">
            <label for="name">Enter your name:</label>
            <input type="text" id="name" name="name">
            <label for="comment">Enter a comment:</label>
            <input type="text" id="comment" name="comment">
            <input type="submit">
        </form>
        <ol>
            <?php
            $stmt = $pdo->query('SELECT name, comment FROM comments');
            while ($row = $stmt->fetch()) {
                echo "<li>" . htmlspecialchars($row['name']) . " says: " . htmlspecialchars($row['comment']) . "</li>";
            }
            ?>
        </ol>
    </body>
</html>
