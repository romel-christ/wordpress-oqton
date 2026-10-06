---
name: shield
description: Site-wide HTTP basic auth via the Oqton Shield mu-plugin
metadata:
  type: project
---

The user wanted Drupal-Shield-style HTTP basic auth (2026-10-05). It's implemented as a must-use plugin, `wp-content/mu-plugins/oqton-shield.php`, active only when `OQTON_SHIELD_USER`/`OQTON_SHIELD_PASS` are defined in `wp-config.php`. Credentials are in `.env.local` (`SHIELD_USER`/`SHIELD_PASS`), and Playwright reads them from there.

**Why:** No good WordPress equivalent exists. `.htaccess` doesn't work with PHP's built-in server, and form-based plugins like "Password Protected" aren't real basic auth.

**How to apply:** Manual HTTP checks need `curl -u`. Negative tests must use plain `fetch`, because Playwright request contexts inherit `httpCredentials` from the config. The plugin must keep unsetting `PHP_AUTH_*`/`HTTP_AUTHORIZATION` after it validates them; otherwise REST treats them as an Application Password login and the block editor breaks. See [[project-stack]], [[workflow]].
