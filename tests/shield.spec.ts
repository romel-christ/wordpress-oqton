import { test, expect } from '@playwright/test';

// Oqton Shield (wp-content/mu-plugins/oqton-shield.php): HTTP basic auth for the whole site.
// Plain fetch is used for the negative checks: Playwright's request contexts inherit
// httpCredentials from the config, which would hide a missing prompt.
test.describe('Oqton Shield', () => {
  test.skip(!process.env.SHIELD_USER, 'Shield not configured in .env.local');

  const basic = (user: string, pass: string) =>
    'Basic ' + Buffer.from(`${user}:${pass}`).toString('base64');

  test('rejects requests without credentials', async ({ baseURL }) => {
    for (const path of ['/', '/wp-login.php', '/wp-json/']) {
      const res = await fetch(new URL(path, baseURL), { redirect: 'manual' });
      expect(res.status, path).toBe(401);
      expect(res.headers.get('www-authenticate')).toContain('Basic realm=');
    }
  });

  test('rejects a wrong password', async ({ baseURL }) => {
    const res = await fetch(new URL('/', baseURL), {
      headers: { Authorization: basic(process.env.SHIELD_USER!, 'wrong') },
    });
    expect(res.status).toBe(401);
  });

  test('lets the REST API through with credentials (block editor needs it)', async ({ request }) => {
    // Without stripping the shield header, WordPress would treat it as an
    // Application Password login and answer 401 here.
    const res = await request.get('/wp-json/wp/v2/pages?per_page=1');
    expect(res.status()).toBe(200);
  });
});
