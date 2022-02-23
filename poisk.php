<?php

require 'admin/search.php';

form();

$SearchClient = filter_var(trim($_POST['user']), FILTER_SANITIZE_STRING);

function search($i) {

global $SearchClient, $ListClients, $i;

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
		echo "<tr>";
		echo '<th scope="row">'.$i.'</th>';	
		echo "<td>".$ListClients[$i][0]."</td><td>".$ListClients[$i][1]."</td><td>".$ListClients[$i][2]."</td></tr>\n";
?>
			 </tbody>
		</table>
	</div>
<?php

}

function variants() {

global $SearchClient, $ListClients, $i;

$text = mb_strtolower($SearchClient , "UTF-8"); 

	if ($text == 'альфа' ||
		$text == 'альфа ооо' ||
		$text == 'альфа, ооо' ||
		$text == 'ооо альфа' ) 
{ 
	search($i = 0);
}
	elseif (
		$text == 'бета' ||
		$text == 'бета ооо' ||
		$text == 'бета, ооо' ||
		$text == 'ооо бета' )
{ 
	search($i = 1);	
}
	elseif (
		$text == 'гамма' ||
		$text == 'гамма ооо' ||
		$text == 'гамма, ооо' ||
		$text == 'ооо гамма'  )
{
	search($i = 2);	
}
	elseif (
		$text == 'дельта' ||
		$text == 'дельта ооо' ||
		$text == 'дельта, ооо' ||
		$text == 'ооо дельта'  )
{
	search($i = 3);
}
else {
	echo '<div class="table">'."Ваш запрос  по слову <b>\"$text\"</b> не найден". '</div>';
}}


function progress() {

global $SearchClient, $ListClients, $i;

if ('POST' == $_SERVER['REQUEST_METHOD']) {
	if (isset($_POST)) {   
		if (mb_strlen(trim($_POST['user'])) < 3 ) {  
			echo '<div class="table">'."Ваш запрос слишком короткий". '</div>';
			table();
		return ;
		} else {
			variants();
			table();
		return;
		}
}}
else {

	header('Location: /03_Yroki_Poisk/');
}
}


//ЧЕКБОКС
function check() {

global $ListClients, $i;

	if (isset($_REQUEST['option'])) {
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
	for ($w = 0, $numClient = count($ListClients); $w < $numClient; $w++) {
		if ($ListClients[$w][2] == 'ЧС') {

 			echo "<tr>";
			echo '<th scope="row">'.$w.'</th>';
			echo "<td>".$ListClients[$w][0]."</td><td>".$ListClients[$w][1]."</td><td>".$ListClients[$w][2]."</td></tr>\n";
			}}

}
}

progress();

check();


function foo_03() {
?>
	<script>
		function foo_1() { 
			var chbox = document.getElementById('option');
			var elem = document.getElementById("blacklist");
if (chbox.checked) { 

<?php
			function foo_02() {

?>	<div class="search-client">				<?php
?>		<table class="table">				<?php
?>		  <thead class="thead-light">		<?php
?>		  	<tr>							<?php
?>		      <th scope="col">#</th>		<?php
?>		      <th scope="col">Сайт</th>		<?php
?>		      <th scope="col">Известное название юр.лица</th>		<?php
?>		      <th scope="col">Чёрный список</th>					<?php
?>		    </tr>							<?php
?>		  </thead>							<?php
?>		<tbody> 							<?php

$ListClientsJS = array ( 
	array ('Альфа', 'ИП-1', 'ОК'),
	array ('Бета', 'ИП-2', 'ЧС'),
	array ('Гамма', 'ИП-3', 'ОК'),
	array ('Дельта, ООО', 'ИП-4', 'ЧС'));

			for ($w = 0, $numClient = count($ListClientsJS); $w < $numClient; $w++) {
				if ($ListClientsJS[$w][2] == 'ЧС') {
			echo "<tr>";
			echo '<th scope="row">'.$w.'</th>';
			echo "<td>".$ListClientsJS[$w][0]."</td><td>".$ListClientsJS[$w][1]."</td><td>".$ListClientsJS[$w][2]."</td></tr>";
			}}
?>		</tbody>			<?php
?>		</table>			<?php
?>	</div>					<?php

} ?>

			elem.innerHTML = '<?php  foo_02() ?>';
} else {elem.innerHTML = "" }
}
		</script>


<?php }
foo_03();

?>
	</body>
</html>