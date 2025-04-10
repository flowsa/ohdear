# Changelog

All notable changes to this project will be documented in this file.

## [1.1.0] - 2025-04-10

### Added
- Replaced the `textField` for the **API Key** in the plugin settings with an **autosuggestField**.
  - The new field now suggests environment variables, improving configuration ease.
  
### Improved
- Enhanced API key validation by checking for empty values and verifying the key more securely.
  - The plugin now uses `Craft::parseEnv()` to correctly handle the API key from environment variables.
  
### Fixed
- Improved error handling when the secret key is missing or invalid, returning a `403 Forbidden` response with a clear error message.

This update ensures better security and an improved user experience when setting up the API key. 🚀

---

## [1.0.1] - 2025-04-01

### Added
- Added verification for the `oh-dear-health-check-secret` header.

### Improved
- Improved API security by validating incoming requests.

### Fixed
- Minor fixes and optimizations for better performance and reliability.

This update enhances security and ensures a more reliable integration with Oh Dear. 🚀

---

## [1.0.0] - 2025-03-20

### Added
- Initial release of the **Oh Dear Health Check plugin** for Craft CMS 5.x.
- Webhook endpoint to receive health check results.
- Disk space check functionality, with results provided in JSON format.
- Health check results can be accessed via the endpoint `/actions/ohdear-health-check/webhook/receive`.

### Fixed
- Resolved issues with the webhook integration to correctly handle and return the expected JSON format for Oh Dear health checks.

---

*Note: This changelog will be updated for future releases.*
