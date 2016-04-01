<?php

class contour
{
	public function Blanc($couleurs, $params, $color_contour, $fractale)
	{
		for($i = 0; $i < $params[0]; $i++)
	    	$couleurs[$i] = imagecolorallocate($fractale, $i*255/$params[0], $i*255/$params[0], $i*255/$params[0]);
		return ($couleurs);
	}
	public function Rouge($couleurs, $params, $color_contour, $fractale)
	{
		for($i = 0; $i < $params[0]; $i++)
	   		$couleurs[$i] = imagecolorallocate($fractale, $i*255/$params[0], 0, 0);
	   	return ($couleurs);
	}
	public function Vert($couleurs, $params, $color_contour, $fractale)
	{
		for($i = 0; $i < $params[0]; $i++)
	   		$couleurs[$i] = imagecolorallocate($fractale, 0, $i*255/$params[0], 0);
	   	return ($couleurs);
	}
	public function Jaune($couleurs, $params, $color_contour, $fractale)
	{
		for($i = 0; $i < $params[0]; $i++)
	   		$couleurs[$i] = imagecolorallocate($fractale, $i*255/$params[0], $i*255/$params[0], 0);
	   	return ($couleurs);
	}
	public function Violet($couleurs, $params, $color_contour, $fractale)
	{
		for($i = 0; $i < $params[0]; $i++)
	   		$couleurs[$i] = imagecolorallocate($fractale, $i*255/$params[0], 0, $i*255/$params[0]);
	   	return ($couleurs);
	}
	public function Bleu_fonce($couleurs, $params, $color_contour, $fractale)
	{
		for($i = 0; $i < $params[0]; $i++)
	   		$couleurs[$i] = imagecolorallocate($fractale, 0, 0, $i*255/$params[0]);
	   	return ($couleurs);
	}
	public function Bleu_cyan($couleurs, $params, $color_contour, $fractale)
	{
		for($i = 0; $i < $params[0]; $i++)
	   		$couleurs[$i] = imagecolorallocate($fractale, 0, $i*255/$params[0], $i*255/$params[0]);
	   	return ($couleurs);
	}
}

?>