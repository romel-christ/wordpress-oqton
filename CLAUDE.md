# Oqton WordPress site

Local WordPress 7.1 site for **Oqton** (IT solutions & technology company) using a custom block theme, `oqton-tech`, whose look is modelled on the Webteck ThemeForest demo but written from scratch.

- Site: http://localhost:8080 · Admin: http://localhost:8080/wp-admin (credentials in `.env.local`, git-ignored)
- Stack: PHP 8.3 built-in server via WP-CLI (`wp server`) + XAMPP MariaDB 10.4 at `127.0.0.1:3307` (root, no password), DB `wp_oqton`
- WP-CLI: `.\wp.cmd …` (PowerShell) or `php tools/wp-cli.phar …` (Bash) — not installed globally
- Theme: `wp-content/themes/oqton-tech` (theme.json, templates/, parts/, patterns/, assets/)

## Commands
- Start server: `npm start` (port 8080)
- Tests: `npx playwright test` · Screenshots: `npm run screenshots`
- Re-seed demo content: `npm run seed` · Regenerate placeholder images: `npm run images`
- DB backup: `.\wp.cmd db export backups/<name>.sql`

## Skills
- `.claude/skills/wordpress` — server, WP-CLI, theme conventions
- `.claude/skills/playwright` — tests, screenshots, visual review

## Project memory
@.claude/memory/MEMORY.md
