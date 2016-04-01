<?php
require 'class_calcul.php';
require 'class_color.php';

function create_fractale($fractale, $taille_image, $coordonnees, $calc, $couleurs, $params)
{
	$blanc = imagecolorallocate($fractale, 255, 255, 255);
	$y = 0;
	for ($x = 0; $x <= $taille_image['x']; $x++)
	{
		$c = new complexe();
	    $c->reel = $coordonnees['x_min']+$calc['r']*$x;
	    $c->imaginaire = $coordonnees['y_min']+$calc['i']*$y;
	    $z = new complexe();
		for ($i = 0; $i < $params[0]; $i++)
	    {
	      $new1=$z->power($params[1])->reel+$c->reel;
	      $new2=$z->power($params[1])->imaginaire+$c->imaginaire;
	      $z->reel=$new1;
	      $z->imaginaire=$new2;
	      if ($z->reel*$z->reel+$z->imaginaire*$z->imaginaire >= 4)
	      	break;
	      ++$i;
	    }
	    if ($x == $taille_image['x'])
	    {
	    	$x = 0;
	    	$y++;
	    	if ($y == $taille_image['y'])
	    		$x = $taille_image['x'];
	    }
	    if ($i == $params[0] || $i > $params[0])
	    	imagesetpixel($fractale, $x, $y, $blanc);
	    else
	        imagesetpixel($fractale, $x, $y, $couleurs[$i]);
	}
	return ($fractale);
}
function create_image($params, $color_contour)
{
	$taille_image = array(
		'x' => 640,
		'y' => 480,
		 );
	$coordonnees = array(
		'x_min' => -2,
		'x_max' => 1.6,
		'y_min' => -1.2,
		'y_max' => 1.2,
		 );
	$calc = array(
		'r' => ($coordonnees['x_max']-$coordonnees['x_min'])/$taille_image['x'],
		'i' => ($coordonnees['y_max']-$coordonnees['y_min'])/$taille_image['y'],
		 );
	$fractale = imagecreate($taille_image['x'], $taille_image['y']);
	imagejpeg($fractale, "mandelbrot.png");
	header("Content-Type: image/png");
	if ($color_contour == "Bleu fonce")
		$color_contour = "Bleu_fonce";
	else if ($color_contour == "Bleu cyan")
		$color_contour = "Bleu_cyan";
	$contour = new contour;
	$couleurs = array();
	$couleurs = $contour->$color_contour($couleurs, $params, $color_contour, $fractale);
	$fractale = create_fractale($fractale, $taille_image, $coordonnees, $calc, $couleurs, $params);
	imagepng($fractale, "mandelbrot.png");
	imagedestroy($fractale);
	header('Location: index.php?fractal=true');
}
?>