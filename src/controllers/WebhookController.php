<?php

namespace ohdearhealthcheck\ohdearhealthcheck\controllers;

use Craft;
use craft\web\Controller;
use yii\web\Response;
use DateTime;
use OhDear\HealthCheckResults\CheckResults;
use OhDear\HealthCheckResults\CheckResult;
use craft\helpers\App;

class WebhookController extends Controller
{
    protected array|int|bool $allowAnonymous = true;

    public function actionReceive(): Response
    {
        $request = Craft::$app->getRequest();
        $ohdearSecret = $request->getHeaders()->get('oh-dear-health-check-secret');
        $plugin = Craft::$app->plugins->getPlugin('ohdear-health-check');

        $checkResults = new CheckResults(new DateTime());
        $directory = '/';
        $totalSpace = disk_total_space($directory);
        $freeSpace = disk_free_space($directory);
        $usedSpace = $totalSpace - $freeSpace;
        $usedPercentage = round(($usedSpace / $totalSpace) * 100, 2);
        $status = ($usedPercentage > 90) ? CheckResult::STATUS_FAILED : CheckResult::STATUS_OK;
        $usedPercentageResponse = ($usedPercentage > 90)
            ? "Your disk is almost full ({$usedPercentage}%)"
            : "Your disk usage is at {$usedPercentage}%";

        $checkResult = new CheckResult(
            name: 'UsedDiskSpace',
            label: 'Used disk space',
            notificationMessage: $usedPercentageResponse,
            shortSummary: "{$usedPercentage}%",
            status: $status,
            meta: ['used_disk_space_percentage' => $usedPercentage]
        );

        $checkResults->addCheckResult($checkResult);
        return $this->asJson(json_decode($checkResults->toJson(), true));
    }
}
