<?php

namespace ohdearhealthcheck\ohdearhealthcheck\controllers;

use Craft;
use craft\web\Controller;
use yii\web\Response;
use DateTime;
use OhDear\HealthCheckResults\CheckResults;
use OhDear\HealthCheckResults\CheckResult;

class WebhookController extends Controller
{
    protected array|int|bool $allowAnonymous = true;

    public function actionReceive(): Response
    {
        $checkResults = new CheckResults(new DateTime());

        $directory = '/';
        $totalSpace = disk_total_space($directory);
        $freeSpace = disk_free_space($directory);
        $usedSpace = $totalSpace - $freeSpace;
        $usedPercentage = round(($usedSpace / $totalSpace) * 100, 2);
        $status = ($usedPercentage > 90) ? CheckResult::STATUS_FAILED : CheckResult::STATUS_OK;


        $checkResult = new CheckResult(
            name: 'UsedDiskSpace',
            label: 'Used disk space',
            notificationMessage: "Your disk is almost full ({$usedPercentage}%)",
            shortSummary: "{$usedPercentage}%",
            status: $status,
            meta: ['used_disk_space_percentage' => $usedPercentage]
        );

        $checkResults->addCheckResult($checkResult);

        return $this->asJson(json_decode($checkResults->toJson(), true));
    }
}
