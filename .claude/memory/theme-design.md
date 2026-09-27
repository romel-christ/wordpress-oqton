---
name: theme-design
description: Design and licensing decisions for the oqton-tech block theme
metadata:
  type: project
---

`oqton-tech` is an **original** block theme that imitates the feel of the paid Webteck "IT Solution & Technology" ThemeForest theme. The user chose this (2026-09-26) instead of buying Webteck. No Webteck code, images or copy may be used.

- Palette: primary `#2d5bff`, accent `#00c2ff`, navy `#0b1532`, title `#141d38`, body `#6b7185`, light `#f2f5fd`.
- Fonts: Barlow (headings) + Roboto (body), bundled locally (OFL).
- Structure: one pattern per section in `patterns/`; pages are lists of `wp:pattern` references created by `tools/seed-content.php`.
- Images are generated placeholders (`tools/generate-images.php`, `generate-svgs.php`); swap in real photos with the same filenames.

**Why:** Licensing — Webteck is commercial; scraping the demo is not allowed.

**How to apply:** When asked to "match Webteck", reproduce layout/spacing/interaction ideas, never assets. Keep colors in `theme.json` presets. See [[project-stack]].
