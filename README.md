# Oh Dear Health Check plugin for Craft CMS 5.x

## Requirements

This plugin requires Craft CMS 5.3.0 or later.

## Installation

To install the plugin, follow these instructions.

1. Open your terminal and go to your Craft project:

    ```bash
    cd /path/to/project
    ```

2. Add the following code to your `composer.json`:

    ```json
    "repositories": {
       "ohdear-health-check": {
          "type": "vcs",
          "url": "https://github.com/flowsa/ohdear.git"
       }
    }
    ```

3. Then, tell Composer to load the plugin:

    ```bash
    ddev composer require flowsa/craft-ohdear-health-check
    ```

4. Install the plugin using the following command:
   
    ```bash
    ddev php craft plugin/install ohdear-health-check
    ```

## Oh Dear Health Check Overview

The **Oh Dear Health Check** plugin for Craft CMS integrates with the **Oh Dear API** to monitor the health of your website. It allows you to check and report on various metrics (e.g., disk space, broken links, performance) to ensure your website is running optimally.

## Configuring Oh Dear Health Check

Before using the plugin, ensure that you have registered for **Oh Dear** and have access to the API. You'll need to configure the plugin to connect with the API by following these steps:

1. In the **Craft CMS Control Panel**, navigate to **Settings → Plugins** and configure the plugin settings.
2. Provide the necessary API credentials for Oh Dear to check your site. In Oh Dear, go to **Application Health**, navigate to **Settings**. In **Setttings**, provide a **Health Report URL** of your current site 'https://your-site-url/actions/ohdear-health-check/webhook/receive'. Copy the **Health Report URL** API credentials to your live .env file and save.

## Using Oh Dear Health Check

The plugin provides health check results that you can access through the following route: https://your-site-url/actions/ohdear-health-check/webhook/receive



This endpoint will receive a health check report and provide the results in the following JSON format:

```json
{
    "finishedAt": 1742425461,
    "checkResults": [
        {
            "name": "UsedDiskSpace",
            "label": "Used disk space",
            "notificationMessage": "Your disk is almost full (91%)",
            "shortSummary": "91%",
            "status": "failed",
            "meta": {
                "used_disk_space_percentage": 91
            }
        }
    ]
}



