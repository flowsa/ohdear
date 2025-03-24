<?php

namespace ohdearhealthcheck\ohdearhealthcheck\models;

use craft\base\Model;

class Settings extends Model
{
    public string $apiKey = '';

    public function rules(): array
    {
        return [
            [['apiKey'], 'string'],
            [['apiKey'], 'required'],
        ];
    }
}
