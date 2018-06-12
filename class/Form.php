<?php

	/*
		class Form
		permet de generer un form facilement
	*/

class Form{
	/*
	* @var array donnes utilisé par le formulaire
	*/

	protected $data;
	public $tag = 'div';

	//dans le construct on assigne une variable data si on veut lui faire parvenir des donnes, en tant que tableau 
	public function __construct($data = array()){

		$this->data = $data;

	}
	//pour entourer $html avec das balises $tag
	protected function surround($html)
	{
		//on utilise des accolades pour mettre une propriete entre crochet
		return "<{$this->tag}>{$html}</{$this->tag}>";
	}
	//pour recuperer la valeur de la $data definit dans acceuil.php
	protected function getValue($index)
	{
		return isset($this->data[$index]) ? $this->data[$index] : null;
		
	}

	// pour creer un input avec le name qu'on veut en parametre, et la valeur par default qui est la $data
	public function input($text,$name,$type){
		return $this->surround('<input type="text" name="'.$name.'" value="'.$this->getValue($name).'" >  ');

	}
	//creer bouton submit
	 public function submit()
	{
		return $this->surround('<button type="submit">Envoyer</button>');
	}


}