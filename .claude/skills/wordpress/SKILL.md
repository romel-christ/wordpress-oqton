---
name: wordpress
description: Run, administer and develop the local Oqton WordPress site and its oqton-tech block theme. Use for starting the server, WP-CLI tasks (options, users, content, DB export/import), editing theme.json/templates/parts/patterns, seeding demo content, or debugging PHP/block errors in this project.
---

# WordPress (Oqton local site)

## Environment
- Root: `C:\mysql\WordPress-oqton` (WordPress core lives here, not in a subfolder).
- PHP 8.3 on PATH; database is XAMPP MariaDB 10.4 on 127.0.0.1:3307 (user `root`, no password), DB `wp_oqton`. The MySQL 8.0 service `MYSQL80` on 3306 is NOT used.
- WP-CLI is **not** global. Use `.\wp.cmd <args>` (PowerShell) or `php tools/wp-cli.phar <args>` (Bash).
- Site URL: http://localhost:8080 — admin at http://localhost:8080/wp-admin (credentials in `.env.local`, never commit or echo them into docs).
- **Oqton Shield** (`wp-content/mu-plugins/oqton-shield.php`) puts HTTP basic auth on every request when `OQTON_SHIELD_USER`/`OQTON_SHIELD_PASS` are defined in `wp-config.php`. Credentials are also in `.env.local` as `SHIELD_USER`/`SHIELD_PASS`. Use `curl -u user:pass` for manual requests. WP-CLI and cron bypass it. It strips the auth headers after checking them so the REST API doesn't mistake them for an Application Password login — keep that behaviour if you edit the plugin.

## Start / stop
- Start (background): `php tools/wp-cli.phar server --host=localhost --port=8080` (also `npm start`). It uses PHP's built-in server with WP-CLI's router, so pretty permalinks work.
- Check: `.\wp.cmd core is-installed; .\wp.cmd option get siteurl`
- If the DB is down ("Error establishing a database connection"): start MySQL in the XAMPP Control Panel (`C:\xampp\xampp-control.exe`) or run `C:\xampp\mysql_start.bat`.

## Common WP-CLI recipes
| Task | Command |
|---|---|
| Theme status | `.\wp.cmd theme list` |
| Re-seed demo pages/posts (idempotent) | `.\wp.cmd eval-file tools/seed-content.php` |
| Regenerate placeholder art | `php tools/generate-images.php; php tools/generate-svgs.php` |
| Backup DB | `.\wp.cmd db export backups/wp_oqton-$(Get-Date -f yyyyMMdd-HHmm).sql` |
| Restore DB | `.\wp.cmd db import backups/<file>.sql` |
| Clear user template overrides | `.\wp.cmd post list --post_type=wp_template,wp_template_part --format=ids` then `.\wp.cmd post delete <ids> --force` |
| Flush rewrites | `.\wp.cmd rewrite flush` |
| Tail errors | `Get-Content wp-content/debug.log -Tail 50` |

## Theme: `wp-content/themes/oqton-tech`
Block (FSE) theme, original design styled after IT-agency sites (Webteck-like look). **Do not copy code, images or text from the paid Webteck theme or its demo** — build originals.

- `theme.json` — single source of truth for palette (`primary #2d5bff`, `navy #0b1532`, `title`, `body`, `light`, `border`, `accent`), fonts (Barlow headings / Roboto body, bundled woff2 in `assets/fonts`), font sizes, spacing scale `20`–`70`, button styles. Prefer presets (`var:preset|color|primary`) over hex in markup.
- `templates/` — `front-page`, `page` (uses `parts/page-banner`), `page-no-title`, `single`, `index`, `archive`, `search`, `404`.
- `parts/` — `header` (top bar + sticky header with inline nav links), `footer`, `page-banner`.
- `patterns/*.php` — one section per file, category `oqton`. Pages are composed of `<!-- wp:pattern {"slug":"oqton-tech/<name>"} /-->` references (see `tools/seed-content.php`), so editing a pattern file updates every page that references it.
- `assets/css/extra.css` — block styles (`is-style-card`, `is-style-card-hover`, `is-style-eyebrow`, `is-style-checklist`, `is-style-outline-light`) and section helpers (`oq-*` classes). `assets/js/counter.js` animates `.oq-counter-num` text like `250+`.
- Image URLs in patterns: `<?php echo oqton_tech_img( 'file.jpg' ); ?>` (defined in `functions.php`).

## Rules when editing blocks
1. Block comment JSON attributes must match the saved HTML exactly (classes, inline styles) or the editor reports "unexpected or invalid content". Copy the structure of an existing pattern when adding sections.
2. Full-width sections: outer `group` with `"align":"full"` + `layout.contentSize: 1240px` and vertical padding `var:preset|spacing|70`.
3. Don't put custom `data-*` attributes on core blocks (breaks validation); put behaviour in CSS/JS keyed by `className`.
4. After changing templates/parts, check for DB overrides created via the Site Editor (they win over files) — see recipe above.
5. Run `php -l` on edited PHP, then use the **playwright** skill to verify visually.
