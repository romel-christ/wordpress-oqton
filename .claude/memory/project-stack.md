---
name: project-stack
description: How the local Oqton WordPress site is hosted and run
metadata:
  type: project
---

The site runs on PHP 8.3's built-in server through WP-CLI (`wp server --port=8080`). The database is **XAMPP's MariaDB 10.4 at 127.0.0.1:3307**, user `root`, no password, DB `wp_oqton` (user's instruction, 2026-09-26). The separate MySQL 8.0 service `MYSQL80` on port 3306 is **not** used (its root has a password).

**Why:** The user already runs XAMPP MariaDB on 3307 for other local projects (drupal10, digital_artisans, …); no Docker on the machine.

**How to apply:** XAMPP MySQL must be running (XAMPP Control Panel → MySQL → Start) before `wp` commands or tests. WP-CLI is local only (`tools/wp-cli.phar`, `wp.cmd` shim). WordPress core sits directly in the project root. Admin credentials live in `.env.local` only. See [[workflow]].
