<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?php echo $title; ?>
    </title>
    <?php echo $this->Html->meta('icon') ?>

    <?php echo $this->Html->css(['bootstrap.min']) ?>

    <?php echo $this->fetch('meta') ?>
    <?php echo $this->fetch('css') ?>
    <?php echo $this->fetch('script') ?>
</head>
<body>
    <?php echo $this->element('header');?>
    <main class="main">
        <div class="container">
            <?php echo $this->fetch('content') ?>
        </div>
    </main>
    <footer>
    </footer>
</body>
</html>