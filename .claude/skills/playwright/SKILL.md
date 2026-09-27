---
name: playwright
description: Browser-test and visually verify the local Oqton WordPress site with Playwright. Use after any theme/content change, when asked to screenshot pages, check mobile layout, compare against the reference design, or debug front-end issues.
---

# Playwright (Oqton site)

Config: `playwright.config.ts` — baseURL `http://localhost:8080` (override with `WP_BASE_URL`), projects `desktop` (1440×900) and `mobile` (Pixel 7). The `webServer` block starts `wp server` automatically and reuses one that's already running. XAMPP MariaDB (port 3307) must be running.

## Commands
| Goal | Command |
|---|---|
| Full smoke suite | `npx playwright test` |
| One project | `npx playwright test --project=mobile` |
| One file / test | `npx playwright test tests/smoke.spec.ts -g "home page"` |
| Full-page screenshots → `screenshots/<project>/*.png` | `npx playwright test tests/screenshots.spec.ts` |
| HTML report | `npx playwright show-report` |
| Debug interactively | `npx playwright test --ui` or `--debug` |
| Install/repair browser | `npx playwright install chromium` |

## Visual review workflow
1. Run the screenshots spec for desktop and mobile.
2. Open the PNGs with the Read tool and check: section order, spacing between sections (no white seams between colored full-width bands), header stickiness, card hover styles, text contrast on dark sections, no horizontal overflow on mobile.
3. Reference look: Webteck IT Solutions demo (https://preview.themeforest.net/item/webteck-it-solution-and-technology-wordpress-theme/full_screen_preview/50460704). Match the *feel* (dark hero, overlapping feature cards, eyebrow sub-titles, service cards, counters band, case studies, team, testimonials, pricing, blog, CTA). Never copy its assets or code.
4. Fix, re-run, repeat.

## Interactive browsing (MCP)
`.mcp.json` registers the Playwright MCP server (`@playwright/mcp`). When its tools are available, use them for ad-hoc navigation, clicking, and accessibility snapshots of the running site.

## Writing tests
- Put specs in `tests/`. Prefer role/text locators (`getByRole('heading', { name })`) over CSS; theme hooks like `.oq-hero`, `.oq-header`, `.oq-footer`, `.oq-blog` are stable.
- Assert no PHP output: body text must not match `Fatal error|Warning:|Notice:|Deprecated:`.
- Mobile nav: click the `Open menu` button before clicking links.
- Admin tests: log in at `/wp-login.php` with credentials from `.env.local` (read at runtime via `process.env`, never hard-code).
