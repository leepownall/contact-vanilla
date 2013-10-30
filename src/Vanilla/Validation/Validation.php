<?php namespace Vanilla\Validation;

class Validation
{
    protected $errors = [];
    protected $rules = [];
    protected $data;

    public function data($data)
    {
        $this->data = $data;

        return $this;
    }

    public function required()
    {
        if(empty($this->data) OR null) {
            $this->errors[] = "All fields are required.";
            throw new \Exception();
            return false;
        }

        return $this;
    }

    public function email()
    {
        if( ! filter_var($this->data, FILTER_VALIDATE_EMAIL)) {
            $this->errors[] = "The email field needs to be a valid email format.";
            return false;
        }

        return $this;
    }

    public function alpha()
    {
        if( ! preg_match('/^([-a-z_-\s])+$/i', $this->data)) {
            $this->errors[] = "Name needs to be just alpha characters, no numeric.";
            return false;
        }

        return $this;
    }

    public function min($min = "10")
    {
        if(strlen($this->data) < $min) {
            $this->errors[] = "The field needs to be longer than {$min} characters in length.";
            return false;
        }

        return $this;
    }

    public function errors()
    {
        return $this->errors;
    }

    public function passes()
    {
        if($this->errors() === 0) {
            return true;
        }

        return false;
    }

    public function fails()
    {
        if(count($this->errors()) > 0) {
            return true;
        }

        return false;
    }
}
