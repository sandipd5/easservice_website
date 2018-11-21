<?php

namespace App\Validators;

use Illuminate\Contracts\Validation\Factory as Validator;

class ContactValidator
{
    protected $validator;

    public function __construct(Validator $validator)
    {
        $this->validator = $validator;
    }

    public function validate(array $params)
    {
        $validator = $this->validator->make($params, [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'details' => 'required',
        ]);

        if ($validator->fails()) {
            throw new \Exception('Validation Fails');
        }
    }
}
