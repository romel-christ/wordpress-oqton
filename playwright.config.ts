import { defineConfig, devices } from '@playwright/test';
import { existsSync, readFileSync } from 'node:fs';

// Load KEY=value pairs from .env.local (git-ignored) without overriding real env vars.
if (existsSync('.env.local')) {
  for (const line of readFileSync('.env.local', 'utf8').split(/\r?\n/)) {
    const m = line.match(/^\s*([A-Z0-9_]+)\s*=\s*(.*)\s*$/);
    if (m && process.env[m[1]] === undefined) process.env[m[1]] = m[2];
  }
}

const baseURL = process.env.WP_BASE_URL ?? 'http://localhost:8080';

// HTTP basic auth for the Oqton Shield mu-plugin (only sent when configured).
const httpCredentials = process.env.SHIELD_USER
  ? { username: process.env.SHIELD_USER, password: process.env.SHIELD_PASS ?? '' }
  : undefined;

export default defineConfig({
  testDir: './tests',
  timeout: 30_000,
  fullyParallel: true,
  reporter: [['list'], ['html', { open: 'never' }]],
  use: {
    baseURL,
    httpCredentials,
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
