<?php

class complexe
{

	public $reel = 0;
	public $imaginaire = 0;

	//Retourne le produit de deux complexes
	public function produit($complexe2)
	{
		$resultat = new complexe();
		$resultat->reel = ($this->reel*$complexe2->reel) - ($this->imaginaire*$complexe2->imaginaire);
		$resultat->imaginaire = ($this->reel*$complexe2->imaginaire) + ($this->imaginaire*$complexe2->reel);
		return $resultat;
	}

	//Retourne la somme de deux complexes
	public function somme($complexe2)
	{
    	$resultat = new complexe();
		$resultat->reel = $this->reel+$complexe2->reel;
		$resultat->imaginaire = $this->imaginaire+$complexe2->imaginaire;
		return $resultat;
	}

	public function power($times)
	{
		$resultat = array();
		$resultat[0] = $this;
		for ($i=1; $i < $times; $i++)
		{ 
			$resultat[$i] = $resultat[$i - 1]->produit($this);
		}
		return $resultat[$times - 1];
	}

	//Retourne le module du nombre complexe
	public function module()
	{
        return sqrt(pow($this->reel, 2)+pow($this->imaginaire, 2));	
	}
}

?>