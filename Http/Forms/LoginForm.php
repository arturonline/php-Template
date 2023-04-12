<?php

namespace Http\Forms;

use Core\Validator;

class LoginForm
{
    protected array $errors = [];
    public function validate($email, $password): bool
    {
        if (! Validator::email($email)) {
            $this->errors['email'] = 'Email is not valid';
        }

        if (! Validator::string($password)) {
            $this->errors['password'] = 'Password is not valid';
        }

        return empty($this->errors);
    }

    public function errors(): array
    {
        return $this->errors;
    }

    public function error($field, $message): void
    {
        $this->errors[$field] = $message;
    }
}