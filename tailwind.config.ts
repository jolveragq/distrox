// tailwind.config.ts
import type { Config } from 'tailwindcss';

export default {
  content: [
    './src/**/*.{html,ts}',  // MUY importante incluir .html y .ts para Angular
  ],
  theme: {
    extend: {},
  },
  plugins: [],
} satisfies Config;
