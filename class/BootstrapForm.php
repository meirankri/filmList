<?php 
 

/**
 * 
 */
	


class BootstrapForm extends Form
{
	public $classForm = 'form-control';

	




	public function input($text,$name,$type){

		return '<label>'.$text.' </label><input  class="'.$this->classForm.'" type="'.$type.'"  name="'.$name.'" value="'.$this->getValue($name).'" >  ';

	}

	 public function submit()
	{
		return $this->surround('<button type="submit" class="btn btn-primary">Envoyer</button>');
	}
	
}