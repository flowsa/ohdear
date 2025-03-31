# Changelog

All notable changes to this project will be documented in this file.

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
