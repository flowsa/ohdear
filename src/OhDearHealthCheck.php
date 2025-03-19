<?php
namespace ohdearhealthcheck\ohdearhealthcheck;

use Craft;
use craft\base\Plugin;
use craft\events\RegisterUrlRulesEvent;
use craft\web\UrlManager;
use yii\base\Event;

class Ohdearhealthcheck extends Plugin
{
    public function init()
    {
        parent::init();

        Event::on(
            UrlManager::class,
            UrlManager::EVENT_REGISTER_SITE_URL_RULES,
            function (RegisterUrlRulesEvent $event) {
                $event->rules['ohdearhealthcheck/webhook/receive'] = 'ohdearhealthcheck/webhook/receive';
            }
        );

        Craft::info('Oh Dear Health Check Plugin loaded', __METHOD__);
    }
}
