<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8";>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Форма регистрации и авторизации</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>





<?php 
function form() { ?>

	<div class="search-form">
		<h3> ВВЕДИТЕ ИМЯ КОНРТАГЕНТА:</h3>
		<form method="POST" action="poisk.php">
		 	<input placeholder="Ввод" autofocus type="text" name="user"/>
		 	<br />		
			<button class="btn btn-primary" type="submit">Ввести</button>
		</form>
			<input type="checkbox" id="option" name="options" value="" style="padding: 15px; font-size: 15px; margin: 10px" onchange="foo_1()">ЧС</button>
			<!-- onclick
			  <input type="checkbox" id="option" name="option" value="" style="padding: 15px; font-size: 15px; margin: 10px" onclick="foo_1()">ЧС</button> -->
	</div>

<div id="blacklist"> </div>



<?php }

$ListClients = array ( 
	array ('Альфа', 'ИП-1', 'ОК'),
	array ('Бета', 'ИП-2', 'ЧС'),
	array ('Гамма', 'ИП-3', 'ОК'),
	array ('Дельта, ООО', 'ИП-4', 'ЧС'));

$i = 0;

function table() { 
	global $ListClients, $i;
?>
	<div class="search-client">
		<table class="table">
		  <thead class="thead-light">
		  	<tr>
		      <th scope="col">#</th>
		      <th scope="col">Сайт</th>
		      <th scope="col">Известное название юр.лица</th>
		      <th scope="col">Чёрный список</th>
		    </tr>
		  </thead>
		  <tbody>
<?php

			for ($i = 0, $numClient = count($ListClients); $i < $numClient; $i++) {
			echo "<tr>";
			echo '<th scope="row">'.$i.'</th>';
			echo "<td>".$ListClients[$i][0]."</td><td>".$ListClients[$i][1]."</td><td>".$ListClients[$i][2]."</td></tr>\n";
			}
}

?>
		  </tbody>
		</table>
	</div>
