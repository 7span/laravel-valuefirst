---
layout: home
hero:
  name: "Laravel ValueFirst"
  text: "WhatsApp Integration Made Easy"
  tagline: A powerful Laravel package for integrating ValueFirst WhatsApp API
  image:
    src: /hero.svg
    alt: Laravel ValueFirst Hero
  actions:
    - theme: brand
      text: Get Started
      link: /introduction/why-laravel-value-first
    - theme: alt
      text: View on GitHub
      link: https://github.com/7span/laravel-valuefirst

features:
  - icon:  🚀
    title: Easy Integration
    details: Simple installation and configuration process for ValueFirst WhatsApp API
  - icon:  💬
    title: Text Messaging
    details: Send basic WhatsApp text messages easily using the ValueFirst API
  - icon: 🧩
    title: Template Support
    details: Full support for WhatsApp template messages and dynamic content
---

<script setup>
import { VPTeamMembers } from 'vitepress/theme'

const members = [
  {
    avatar: 'https://github.com/7span.png',
    name: '7Span',
    title: 'Sponsor',
    links: [
      { icon: 'github', link: 'https://github.com/7span' },
      { icon: 'x', link: 'https://x.com/7SpanHQ' }
    ]
  },
  {
    avatar: 'https://github.com/hemratna.png',
    name: 'Hemratna Bhimani',
    title: 'Creator',
    links: [
      { icon: 'github', link: 'https://github.com/hemratna' },
    ]
  },
  {
    avatar: 'https://github.com/kajal-7span.png',
    name: 'Kajal Pandya',
    title: 'Contributor',
    links: [
      { icon: 'github', link: 'https://github.com/kajal-7span' },
    ]
  },
  {
    avatar: 'https://github.com/binal-7span.png',
    name: 'Binal Patel',
    title: 'Contributor',  
    links: [
      { icon: 'github', link: 'https://github.com/binal-7span' },
    ]
  },  {
    avatar: 'https://github.com/urvashi-7span.png',
    name: 'Urvashi Thakar',
    title: 'Contributor',
    links: [
      { icon: 'github', link: 'https://github.com/urvashi-7span' },
    ]
  },
  {
    avatar: 'https://github.com/trushal-7span.png',
    name: 'Trushal Thummar',
    title: 'Contributor',
    links: [
      { icon: 'github', link: 'https://github.com/trushal-7span' }, 
    ]
  },
  {
      avatar: 'https://github.com/darshandomadiya7022.png',
      name: 'Darshan',
      title: 'Contributor',
      links: [
          { icon: 'github', link: 'https://github.com/darshandomadiya7022' },
      ]  
  }
]
</script>

### 🙌 Credits

> Big thanks to everyone who contributed to making **Laravel ValueFirst** a powerful and easy-to-use package for integrating WhatsApp Cloud API with Laravel applications. This package helps developers seamlessly implement WhatsApp messaging features in their Laravel projects.

<VPTeamMembers size="small" :members />
