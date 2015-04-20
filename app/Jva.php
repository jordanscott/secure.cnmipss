<?php

class Jva extends Eloquent {
	

    public function user(){

    	return $this->belongsTo('User');

    }

}



?>