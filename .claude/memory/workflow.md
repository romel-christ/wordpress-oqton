---
name: workflow
description: Required verification steps after changing the theme or content
metadata:
  type: feedback
---

After any change to the theme or seeded content: `php -l` edited PHP files, run `npx playwright test`, and for visual changes run the screenshots spec and review the PNGs (desktop + mobile).

**Why:** Block markup mistakes don't fail loudly — they show up as editor validation errors or layout gaps only visible in a browser.

**How to apply:** Use the `playwright` skill; don't report a theme change as done without a passing smoke run. See [[theme-design]].
