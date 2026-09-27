import { test, expect } from '@playwright/test';

const pages = ['/', '/about/', '/services/', '/projects/', '/team/', '/pricing/', '/contact/', '/blog/'];

for (const path of pages) {
  test(`${path} renders without PHP errors`, async ({ page }) => {
    const response = await page.goto(path);
    expect(response?.status(), `status for ${path}`).toBe(200);

    const body = await page.locator('body').innerText();
    expect(body).not.toMatch(/(Fatal error|Warning:|Notice:|Deprecated:|Parse error)/);

    await expect(page.locator('header .oq-header')).toBeVisible();
    await expect(page.locator('footer.oq-footer')).toBeVisible();
    // Block validation leftovers show up as raw comments in some failure modes.
    expect(await page.content()).not.toContain('<!-- wp:pattern');
  });
}

test('home page shows the key sections', async ({ page }) => {
  await page.goto('/');
  await expect(page.locator('.oq-hero h1')).toContainText('Smart Technology');
  for (const heading of ['IT Services Built Around Your Business', 'Our Latest Case Studies', 'What Our Clients Say', 'Simple Plans for Every Stage', 'Latest From Our Blog']) {
    await expect(page.getByRole('heading', { name: heading })).toBeVisible();
  }
  await expect(page.locator('.oq-blog .wp-block-post')).toHaveCount(3);
});

test('no broken theme images on home', async ({ page }) => {
  await page.goto('/');
  const broken = await page.$$eval('img', (imgs) =>
    imgs
      .filter((img) => { img.scrollIntoView(); return img.complete && img.naturalWidth === 0; })
      .map((img) => img.src),
  );
  expect(broken).toEqual([]);
});

test('navigation works (desktop menu or mobile overlay)', async ({ page, isMobile }) => {
  await page.goto('/');
  if (isMobile) {
    await page.getByRole('button', { name: /open menu/i }).click();
  }
  await page.getByRole('link', { name: 'Contact', exact: true }).first().click();
  await expect(page).toHaveURL(/\/contact\/$/);
  await expect(page.getByRole('heading', { level: 1 })).toHaveText('Contact');
});

test('404 page', async ({ page }) => {
  const response = await page.goto('/this-page-does-not-exist/');
  expect(response?.status()).toBe(404);
  await expect(page.getByRole('heading', { name: 'Page not found' })).toBeVisible();
});
