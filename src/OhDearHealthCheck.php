<?php
namespace ohdearhealthcheck\ohdearhealthcheck;

use ohdearhealthcheck\ohdearhealthcheck\models\Settings;

use Craft;
use craft\base\Plugin;
use craft\events\RegisterUrlRulesEvent;
use craft\web\UrlManager;
use yii\base\Event;

class Ohdearhealthcheck extends Plugin
{
    public bool $hasCpSettings = true;

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

    public function settingsHtml(): ?string
    {
        return Craft::$app->view->renderTemplate(
            'ohdear-health-check/settings',
            ['settings' => $this->getSettings()]
        );
    }

    protected function createSettingsModel(): ?\craft\base\Model
    {
        return new Settings();
    }
}
