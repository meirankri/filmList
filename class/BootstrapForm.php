<?php 
 

/**bootstram form et une class qui hérite de Form,
pour mettre plus en forme et à l'aide de bootstrap les éléments que contiennent un formulaire.
 * 
 */
	


class BootstrapForm extends Form
{
	public $classForm = 'form-control';

	//méthode pour générer des inputs sans required
	public function inputWrequired($text,$name,$type = 'text'){

		return '<label>'.$text.'  </label><input  class="'.$this->classForm.'" type="'.$type.'"  name="'.$name.'"  >  ';

	}

	//méthode pour générer des inputs avec un texte en label, un attribut name et un type optionnel
	public function input($text,$name,$type = 'text'){

		return '<label>'.$text.'<span>*</span> </label><input  class="'.$this->classForm.'" type="'.$type.'"  name="'.$name.'"  required>  ';

	}

	 public function submit($class='')
	{
		return $this->surround('<button type="submit" class="btn btn-primary '.$class.'">Envoyer</button>');
	}
	
}