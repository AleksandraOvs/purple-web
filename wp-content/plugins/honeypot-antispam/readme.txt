=== Honeypot Anti-Spam ===
Contributors: RaiolaNetworks, soymgomez
Donate link: https://raiolanetworks.com/
Tags: comment spam, honeypot, spam protection, akismet, anti-spam
Requires at least: 6.5
Requires PHP: 7.4
Tested up to: 7.0
Stable tag: 1.1.1
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.html

Stop comment spam in WordPress with the honeypot technique. No captcha, no setup, lightweight and invisible to your visitors.

== Description ==

**Honeypot Anti-Spam** stops comment spam in WordPress using the honeypot technique - with **no captcha**, no puzzles and nothing for your visitors to solve.

Spam bots automatically fill in a hidden field that real visitors never see. The moment they do, the comment is flagged as spam. The result: cleaner comments, zero friction for genuine users and no annoying CAPTCHA.

= Why Honeypot Anti-Spam? =

* **No captcha** - completely invisible to visitors, nothing to type or click.
* **Zero configuration** - install, activate, done. There are no settings to touch.
* **Lightweight and fast** - a tiny script with no bloat and no impact on page speed.
* **Privacy friendly** - no external services, no tracking, no data leaves your site.
* **Native WordPress comments** - works out of the box with the standard comment form.

= How the honeypot technique works =

The honeypot antispam technique adds a hidden field to your comment form via JavaScript. A legitimate visitor never sees this field and therefore never fills it in. Spam bots, however, detect it and fill it in, so the comment or submission is immediately classified as spam.

Honeypot Anti-Spam has NO options and NO configuration. To get it working you only have to install and activate it. Nothing else.

* **[More information and support](https://raiolanetworks.com/blog/anti-spam-wordpress/ "Information and support")**

== Installation ==

1. Install and activate the plugin from your WordPress dashboard.
2. That's it! There is nothing else to do.

== Frequently Asked Questions ==

= Is the honeypot technique effective against comment spam? =

Yes, it is very effective against spam bots, although it does NOT work against manual spam. In any case, in 99.99% of cases spam is sent automatically by bots.

= Does it really work without a captcha? =

Yes. There is no CAPTCHA, no math question and nothing for your visitors to solve. The protection is a hidden field that only spam bots interact with, so the experience for real users is completely transparent.

= Will it slow down or affect my WordPress site? =

No. The system is completely automatic and does not affect the normal operation of WordPress: it is transparent and extremely lightweight. In very rare cases a plugin may conflict with the JavaScript used to insert the honeypot field, but this happens very rarely.

= Does it work with caching plugins? =

Yes. The honeypot field is handled with client-side JavaScript, so it works fine alongside full-page caching plugins.

= Does it collect or send any data? =

No. Honeypot Anti-Spam does not track visitors and does not send any data to external services. Everything happens on your own site.

= Can I use Honeypot Anti-Spam with Disqus or wpDiscuz? =

No, Honeypot Anti-Spam is not compatible with comment systems other than the native WordPress one.

== Bundled by default with ==

Raiola Networks WordPress hosting service.

== Upgrade Notice ==

= 1.1.1 =
Fixes and completes the Spanish translation, unifies the translatable strings and corrects the support URL.

= 1.1.0 =
Recommended update: compatibility with WordPress 7.0 and PHP 8, plus security improvements. Requires WordPress 6.5+ and PHP 7.4+.

== Changelog ==
= 1.1.1 - 2026-05-28 =
* Fixed and completed the Spanish translation (notices, messages and settings that were shown in English).
* Unified the statistics text into a single translatable string with placeholders.
* Fixed a typo in the translation ("Guadar" -> "Guardar").
* Fixed the support page URL (.es -> .com).

= 1.1.0 - 2026-05-28 =
* Compatibility with WordPress 7.0 and PHP 7.4-8.x.
* Security: escaping of all output, nonce and capability checks on the screen options, and input sanitization ($_POST/$_SERVER with wp_unslash).
* Settings API: register_setting with sanitize_callback and removal of the unnecessary option write on every admin load.
* Admin notices migrated to wp_admin_notice() (replaces the deprecated update-nag class).
* Fixed an undefined variable and replaced date() with gmdate().
* Updated plugin headers: Requires at least, Requires PHP, License/License URI.

= 1.0.5 - 2024-08-01 =
* JS code linting.
* PHP JS code linting.
* Prepare plugin for new major version.

= 1.0.4 - 2022-10-20 =
* Added a conditional for webmention comment types.
* Refactored conditional with strict operators.
* Fixed a wrong URL on the settings page.
* Thanks: @danidub (https://wordpress.org/support/topic/algunos-errores-encontrados/)

= 1.0.3 - 2021-12-14 =
* Fixed minor issues.

= 1.0.2 - 2020-05-01 =
* Improved the spam detection logic.

= 1.0.1 - 2020-04-30 =
* Fixed a JS issue.

= 1.0 - 2020-04-24 =
* First version.
