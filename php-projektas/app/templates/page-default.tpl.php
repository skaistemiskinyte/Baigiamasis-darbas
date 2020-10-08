<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php print $data['title']; ?></title>
    <?php foreach ($data['css'] as $css): ?>
        <link rel="stylesheet" href="<?php print $css; ?>">
    <?php endforeach; ?>
    <?php foreach ($data['js'] as $js): ?>
        <script src="<?php print $js; ?>" defer></script>
    <?php endforeach; ?>
    <link rel="stylesheet" href="<?php print $data['font']; ?>">
</head>
<body>
<header>
    <?php print $data['header']; ?>
</header>
<main>
    <?php print $data['content']; ?>
</main>
<footer>
    <?php print $data['footer']; ?>
</footer>
</body>
</html>