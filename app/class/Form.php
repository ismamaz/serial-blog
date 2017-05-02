<?php



class Form{

	protected $data;

	public function __construct($data=array()){
		$this->data=$data;
	}
	
	protected function getValue($index){
		return isset ($this->data[$index]) ? $this->data[$index]:null;
	}

	public function input($name){
		return '<br><label for="'.$name.'">Votre '.$name.' : </label><input type="text" name="'.$name.'" value="'.$this->getValue($name).'">';
	}

	public function submit(){
		return '<br><br><input type="submit" value="Envoyer">';
}



}

?>