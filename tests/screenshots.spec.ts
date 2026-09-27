import { test } from '@playwright/test';

// Full-page screenshots for visual review. Output: screenshots/<project>/<name>.png
const pages: Record<string, string> = {
  home: '/',
  about: '/about/',
  services: '/services/',
  contact: '/contact/',
  blog: '/blog/',
};

for (const [name, path] of Object.entries(pages)) {
  test(`screenshot ${name}`, async ({ page }, testInfo) => {
    await page.goto(path);
    // Trigger lazy content / counters, then let animations settle.
    await page.evaluate(async () => {
      for (let y = 0; y < document.body.scrollHeight; y += 600) {
        window.scrollTo(0, y);
        await new Promise((r) => setTimeout(r, 60));
      }
      window.scrollTo(0, 0);
    });
    await page.waitForTimeout(1800);
    await page.screenshot({ path: `screenshots/${testInfo.project.name}/${name}.png`, fullPage: true });
  });
}
