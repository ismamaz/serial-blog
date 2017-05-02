<?php

class BootstrapForm extends Form{


	public function input($name){

		return '<br><div class="form-group">
		<label>Votre '.$name.' : </label><input type="text" name="'.$name.'" value="'.$this->getValue($name).'" class="form-control"></div>';
	}


}

?>