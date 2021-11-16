<?php

namespace TechStory\Classes\Validation;


class Validator
{
    private $errors = [];

    public function validate(string $name, $value, array $rules)
    {
        foreach ($rules as $rule) {
            $className = "TechStory\\Classes\\Validation\\" . $rule; 
            $obj = new $className;
            // if ($rule == "required") {
            //     $obj = new Required;
            // }
            $error = $obj->check($name, $value);
            if ($error !== false) {
                $this->errors[] = $error;
                break;
            };
        }
    }
    public function getErrors(): array
    {
        return $this->errors;
    }
    public function hasErrors(): bool
    {
        return !empty($this->errors);
    }
}
