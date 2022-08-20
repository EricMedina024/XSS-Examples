<html>
    <body>
        <a href="/">Home</a>
        <form method="get" action="vulnerable.php">
            <label for="name">Enter your name:</label>
            <input type="text" id="name" name="name">
            <input type="submit">
        </form>
        <?php if (isset($_GET['name'])) { ?>
            <p>Hello there, <?=$_GET['name']?>!</p>
        <?php } ?>
    </body>
</html>
