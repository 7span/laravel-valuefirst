import { defineConfig } from 'vitepress'

export default defineConfig({
  title: "Laravel ValueFirst",
  description: "Laravel package for ValueFirst WhatsApp API integration",
  srcDir: "src",
  base: "/open-source/laravel-valueFirst/",
  themeConfig: {
    siteTitle: "Laravel ValueFirst",
    logo: "/logo.svg",
    nav: [
      { text: 'Home', link: '/' },
    ],
    sidebar: [
      {
        text: 'Introduction',
        items: [
          { text: 'Why Laravel ValueFirst?', link: '/introduction/why-laravel-value-first' }
        ]
      },
      {
        text: 'Getting Started',
        items: [
          { text: 'Installation', link: '/getting-started/installation' },
          { text: 'Configuration', link: '/getting-started/configuration' }
        ]
      },
      {
        text: 'Usage',
        items: [
          { text: 'Simple Messages', link: '/usage/simple-messages.md' },
          { text: 'Template Messages', link: '/usage/template-messages' }
        ]
      }
    ],
    socialLinks: [
      { icon: "github", link: "https://github.com/7span/laravel-valuefirst" }
    ],
    footer: {
      message: "Released under the MIT License.",
      copyright: "Copyright © 2024"
    },
    search: {
      provider: "local"
    }
  }
})
