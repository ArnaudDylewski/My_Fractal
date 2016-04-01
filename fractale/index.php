<html>
<head>
    <meta charset="UTF-8">
    <title>Etape 3 - Fractales</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="wrap">
	<div class="fract-form">
		<div class="fract-form-header">
        	<img src="img/Fractale.png">
    	</div>
        <div class="fract-form-content">
			<form class="form" method="post" action="index.php">
				<input name="nbr_iteration" type="text" placeholder="Nombre d'iteration">
				<input name="degres" type="text" placeholder="Degre">
				<img src="img/Choix_contour.png">
				<select name="select"class="styled-select">
					<option >Blanc</option>
					<option >Vert</option>
					<option >Bleu fonce</option>
					<option >Bleu cyan</option>
					<option >Jaune</option>
					<option >Violet</option>
					<option >Rouge</option>
				</select>
				<button type="submit" class="submit">Envoyer</button>
			</form>
		</div>
	</div> 
		<?php
		if (isset($_POST['nbr_iteration']) && isset($_POST['degres']))
		{
			require 'fractale.php';
			$params = array();
			$params[0] = $_POST['nbr_iteration'];
			$params[1] = $_POST['degres'];
			$couleur = $_POST['select'];
			if ($params[0] == '' && $params[1] == '')
			{
				$params[0] = 50;
				$params[1] = 2;
			}
			else if ($params[0] == '' && $params[1] != '')
				$params[0] = 50;
			else if ($params[1] == '' && $params[0] != '')
				$params[1] = 2;
			if (is_numeric($params[0]) && is_numeric($params[1]))
				create_image($params, $couleur);
			else
			{
				echo "Veuillez rentrer un chiffre, ou rien du tout</br>";
				return;
			}
		}		
		?>
	<?php
		if ($_GET['fractal'] == true)
		echo '<div><img id="fractal" src="mandelbrot.png"</div>'; 
		?>
</body>
</html>