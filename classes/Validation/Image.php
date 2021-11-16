<?php

namespace TechStory\Classes\Validation;


class Image implements ValidationRule
{
    public function check(string $name, $value)
    {
        $allowedExt = ['png', 'jpg'];
        $ext = pathinfo($value['name'], PATHINFO_EXTENSION);

        if (!in_array($ext, $allowedExt)) {
            return "$name extension is not allowed, please upload jpg,png";
        }
        return false;
    }
}
