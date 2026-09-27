# Oqton WordPress Site

Local WordPress site for **Oqton**, an IT solutions & technology company, built on a custom block theme (`oqton-tech`).

This repository contains only the project's own code: the theme, tooling, tests and Claude Code config. WordPress core, `wp-config.php`, uploads and credentials are not committed. You recreate them with the steps below.

## Requirements

- **PHP 8.1+** on your PATH, with the `mysqli`, `curl`, `gd`, `zip` and `openssl` extensions
- **MySQL/MariaDB**. The reference setup uses XAMPP MariaDB 10.4 on `127.0.0.1:3307`, user `root`, no password.
- **Node.js 18+** (for Playwright tests)
- Git

## Setup

Run these commands from the repository root in PowerShell.

1. **Clone the repository and install the Node dependencies.**
   ```powershell
   git clone git@github.com:romel-christ/wordpress-oqton.git
   cd wordpress-oqton
   npm install
   npx playwright install chromium
   ```

2. **Download WP-CLI.** It isn't committed. `wp.cmd` in the repo root is a shim that runs it.
   ```powershell
   Invoke-WebRequest -UseBasicParsing https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar -OutFile tools\wp-cli.phar
   .\wp.cmd --version
   ```

3. **Download WordPress core.** `--skip-content` keeps the committed `wp-content` folder as it is.
   ```powershell
   .\wp.cmd core download --skip-content
   ```

4. **Create the database.** Start MySQL in the XAMPP Control Panel first, then:
   ```powershell
   & "C:\xampp\mysql\bin\mysql.exe" --user=root --host=127.0.0.1 --port=3307 --execute="CREATE DATABASE IF NOT EXISTS wp_oqton CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
   ```

5. **Create `wp-config.php`.** If your database host, port, user or password differ, change the `--db*` values.
   ```powershell
   .\wp.cmd config create --dbname=wp_oqton --dbuser=root --dbpass= --dbhost=127.0.0.1:3307 --skip-check --extra-php="define( 'WP_DEBUG', true );`ndefine( 'WP_DEBUG_LOG', true );`ndefine( 'WP_DEBUG_DISPLAY', false );`ndefine( 'WP_ENVIRONMENT_TYPE', 'local' );"
   ```

6. **Install WordPress.** This saves the admin login to `.env.local`, which git ignores.
   ```powershell
   $pw = -join ((48..57)+(65..90)+(97..122) | Get-Random -Count 20 | ForEach-Object {[char]$_})
   .\wp.cmd core install --url=http://localhost:8080 --title=Oqton --admin_user=admin --admin_password=$pw --admin_email=you@example.com --skip-email
   Set-Content .env.local "WP_ADMIN_USER=admin`nWP_ADMIN_PASSWORD=$pw`nWP_ADMIN_URL=http://localhost:8080/wp-admin"
   ```

7. **Activate the theme and load the demo content.**
   ```powershell
   New-Item -ItemType Directory -Force wp-content\plugins | Out-Null
   .\wp.cmd theme activate oqton-tech
   npm run seed
   ```
   The seed script creates the pages (Home, About Us, Services, Projects, Our Team, Pricing, Contact, Blog) and 3 blog posts. It also sets Home as the front page and switches URLs to `/%postname%/`. You can safely run it again; it updates existing content instead of duplicating it.

8. **Start the server.**
   ```powershell
   npm start
   ```
   The site is at http://localhost:8080 and the admin area is at http://localhost:8080/wp-admin. The login is in `.env.local`.

## Everyday commands

| Task | Command |
|---|---|
| Start the dev server (port 8080) | `npm start` |
| Run the smoke tests (desktop and mobile) | `npm test` |
| Save full-page screenshots to `screenshots/` | `npm run screenshots` |
| Re-seed the demo content | `npm run seed` |
| Regenerate the placeholder images | `npm run images` |
| Run any WP-CLI command | `.\wp.cmd <command>` (PowerShell) or `php tools/wp-cli.phar <command>` (Bash) |
| Back up the database | `.\wp.cmd db export backups/wp_oqton.sql` |

The Playwright config starts `wp server` automatically if it isn't already running. The database must be up before you run the tests.

## Project structure

```
wp-content/themes/oqton-tech/   Block theme
  theme.json                    Colors, fonts, spacing, button styles
  templates/                    front-page, page, single, index, archive, search, 404
  parts/                        header, footer, page-banner
  patterns/                     One file per page section (hero, services, pricing, …)
  assets/css/extra.css          Block styles and hover effects
  assets/js/counter.js          Animated statistic counters
  assets/fonts/, assets/images/ Bundled fonts and placeholder art
tools/                          Image generators and the demo content seeder
tests/                          Playwright smoke and screenshot specs
.claude/                        Claude Code skills, project memory and settings
CLAUDE.md                       Project context for Claude Code
```

Each page is a list of references to theme patterns, so editing a file in `patterns/` changes every page that uses that section.

## Theme notes

- The design is **original**. It follows the style of modern IT-agency sites, but no code, images or text come from any commercial theme.
- The images are generated placeholders. To use real photos, replace the files in `assets/images/` and keep the same filenames.
- The fonts are Barlow (headings) and Roboto (body), under the SIL Open Font License, and are served from the theme folder.
- If you edit a template or part in the Site Editor, WordPress stores your version in the database, and it takes priority over the file. Delete the saved version to go back to the file.

## Troubleshooting

- **"Error establishing a database connection":** start MySQL in the XAMPP Control Panel. Check the database settings in `wp-config.php`.
- **PHP errors:** they go to `wp-content/debug.log`, not to the page.
- **`wp` not found:** use `.\wp.cmd`, or check that `tools\wp-cli.phar` exists (step 2).
