import { defineConfig, devices } from '@playwright/test';

const baseURL = process.env.WP_BASE_URL ?? 'http://localhost:8080';

export default defineConfig({
  testDir: './tests',
  timeout: 30_000,
  fullyParallel: true,
  reporter: [['list'], ['html', { open: 'never' }]],
  use: {
    baseURL,
    trace: 'retain-on-failure',
    screenshot: 'only-on-failure',
  },
  projects: [
    { name: 'desktop', use: { ...devices['Desktop Chrome'], viewport: { width: 1440, height: 900 } } },
    { name: 'mobile', use: { ...devices['Pixel 7'] } },
  ],
  webServer: {
    command: 'php tools/wp-cli.phar server --host=localhost --port=8080',
    url: baseURL,
    reuseExistingServer: true,
    timeout: 60_000,
  },
});
