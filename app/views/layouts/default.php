<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
	<?php if(!empty($canonical)): ?>
	<link rel="canonical" href="<?=$canonical;?>">
	<?php endif;?>
	<link rel="icon" type="image/png" href="images/star.png">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<?=$this->getMeta();?>
	<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<!--header-->
<div class="container">
	<button id="run" class="btn btn-primary" style="width: 100%;">Запуск скрипта</button>
</div>

<div class="container">
    <?=$content;?>
</div>

<!--spinner-->
<div id="spinner">
	<div class="loader"></div>
</div>

<!--scripts-->
<script src="js/jquery-1.11.0.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>