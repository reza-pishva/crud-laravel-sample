<?php

namespace App\Rules;

use libphonenumber\PhoneNumberUtil;
use Illuminate\Contracts\Validation\Rule;

class PhoneValidationRule implements Rule
{
    public function passes($attribute, $value)
    {
        $phoneUtil = PhoneNumberUtil::getInstance();
        try {
            $numberProto = $phoneUtil->parse($value, 'NL');
            return $phoneUtil->isValidNumber($numberProto);
        } catch (\libphonenumber\NumberParseException $e) {
            return false;
        }
    }

    public function message()
    {
        return 'The :attribute is not a valid phone number.';
    }
}