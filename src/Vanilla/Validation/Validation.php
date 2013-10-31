<?php namespace Vanilla\Validation;

class Validation
{
    protected $errors = array();
    protected $rules = array();
    protected $data;
    protected $field;

    public function data($data)
    {
        $this->data = $data;

        return $this;
    }

    public function field($field)
    {
        $this->field = $field;

        return $this;
    }

    public function required()
    {
        if(empty($this->data) OR null) {
            $this->errors[$this->field][] = "The " . ucfirst($this->field) . " field is required.";
        }
        return $this;
    }

    public function email()
    {
        if( ! filter_var($this->data, FILTER_VALIDATE_EMAIL)) {
            $this->errors[$this->field][] = "The " . ucfirst($this->field) . " field needs to be a valid email format.";
        }

        return $this;
    }

    public function alpha()
    {
        if( ! preg_match('/^([-a-z_-\s])+$/i', $this->data)) {
            $this->errors[$this->field][] = ucfirst($this->field) . " needs to be just alpha characters, no numeric.";
        }

        return $this;
    }

    public function min($min = "10")
    {
        if(strlen($this->data) < $min) {
            $this->errors[$this->field][] = "The " . ucfirst($this->field) . " field needs to be longer than {$min} characters in length.";
        }

        return $this;
    }

    public function errors()
    {
        return $this->errors;
    }

    public function first($field)
    {
        if(count($this->errors()) > 0) {
            if(isset($this->errors[$field])) {
                return $this->errors[$field][0];
            }
        }
        
        return false;
    }

    public function passes()
    {
        if(count($this->errors()) == 0) {
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
