<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class LoginForm
{
    public $attributes = [];
    protected array $errors = [];

    public function __construct($attributes)
    {
        $this->attributes = $attributes;
        if (! Validator::email($this->attributes['email'])) {
            $this->errors['email'] = 'Email is not valid';
        }

        if (! Validator::string($this->attributes['password'])) {
            $this->errors['password'] = 'Password is not valid';
        }
    }
    public static function validate($attributes)
    {
        $instance = new static($attributes);

        return $instance->failed() ? $instance->throw() : $instance;
    }

    public function throw() {
        ValidationException::throw($this->errors, $this->attributes);
    }

    public function failed(): bool
    {
        return count($this->errors);
    }

    public function errors(): array
    {
        return $this->errors;
    }

    public function error($field, $message)
    {
        $this->errors[$field] = $message;

        return $this;
    }
}