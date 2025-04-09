<?php

namespace ohdearhealthcheck\ohdearhealthcheck\models;


use craft\base\Model;
use craft\helpers\App;

class Settings extends Model
{
    public string $apiKey = '$OH_DEAR_API_KEY';

    public function getApiKey(): string
    {
        return App::parseEnv($this->apiKey);
    }

    public function rules(): array
    {
        return [
            [['apiKey'], 'string'],
            [['apiKey'], 'required'],
        ];
    }
}