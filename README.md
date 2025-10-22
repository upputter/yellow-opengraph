# OpenGraph 0.1.0

Add [Open Graph Protocol](https://ogp.me/) meta tags to your website.

<p align="center"><img src="SCREENSHOT.png" alt="Screenshot of display examples for Open Graph Protocol meta tags (by opengraph.dev)"></p>

## How to install an extension

[Download ZIP file](https://github.com/upputter/yellow-opengraph/archive/refs/heads/main.zip) and copy it into your `system/extensions` folder. [Learn more about extensions](https://github.com/annaesvensson/yellow-update).

## How to use Open Graph

This extension adds Open Graph Protocol meta tags to every page of your website.
The information of the Open Graph tags will be used by search engines and displayed when sharing the page link in messengers or social media.

The following Open Grap tags will be set:

  * `og:description` - description of the page (`page:Description` **OR** first 150 chars of the pages text)  
  * `og:locale` - language location code (`de_DE`, `en_GB`, `sv_SE`, ... )
  * `og:sitename` - name of your website
  * `og:title` - title of the page
  * `og:type`- type will be `website`
  * `og:url` - public URL of the page
  * `og:image` - absolut URL of the image for the Open Graph thumbnail
  * `og:image:type` - MIME-Type of the given image
  * `og:image:width`- width of the given image
  * `og:image:height` - height of the given image

### How to set an image
You can use the page-meta tag `Image:` to set an image for each page / blog post.

Here is a simple example :

```
---
Title: My Blog Post
Published: 1970-01-01 12:00:00
Layout: blog
Image: my-blog-post-image.jpg
---
Here goes my blog post content ...

```

## Settings

You can configure the following settings in the file `system/extensions/yellow-system.ini`:

  * `openGraphDefaultImage`- set a default image, location relative to the yellow `CoreImageLocation`-setting; default value is `none`- no `og:image`-tag will be rendered

## Test your Open Graph tags
Try the following websites ...
  * https://opengraph.dev
  * https://www.opengraph.xyz

... or browser extensions ...

* https://addons.mozilla.org/en-US/firefox/addon/open-graph-preview-and-debug/
* https://chromewebstore.google.com/detail/open-graph-checker/lkjaebkedoblfeglnhbgbjbdodjdogpe

... to test the Open Graph Protocol meta tags of your website and pages.