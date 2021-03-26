<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use JsonSerializable;

class DTO implements JsonSerializable {
	public $data;
	

	public function __construct() {
		$this->data = [];
	
	}

	public function jsonSerialize() {
        // return [
        //     'username' => $this->username,
        //     'password' => $this->password
        // ];
        return get_object_vars($this);
    }	
}