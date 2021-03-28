<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use JsonSerializable;


class DTO implements JsonSerializable {
	public $data;
	public $errorCode;
	public $errorMessage;

	public function __construct($errorCode, $errorMessage, $data)
    {
        $this->errorCode = $errorCode;
        $this->errorMessage = $errorMessage;
        $this->data = $data;
    }

	 public function jsonSerialize()
    {
       return get_object_vars($this);
    }


    //getters


    /**
     * @return mixed
     */
    public function getErrorCode()
    {
        return $this->errorCode;
    }

    /**
     * @return mixed
     */
    public function getErrorMessage()
    {
        return $this->errorMessage;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }
}