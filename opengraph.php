<?php
class YellowOpengraph
{
    const VERSION = "0.1.0";
    public $yellow;

    public function onLoad($yellow)
    {
        $this->yellow = $yellow;
        $this->yellow->system->setDefault("openGraphDefaultImage", "none");
    }

    public function onParsePageExtra($page, $name)
    {
        if ($name == "header" && !$page->isError()) {
            $baseUrl =  $this->yellow->system->get("coreServerScheme") .
                '://' . $this->yellow->system->get("coreServerAddress") .
                $this->yellow->system->get("coreServerBase");

            $ogArray = [];
            $ogArray[] = '<meta property="og:title" content="' . $page->getHtml('title') . '" />';
            $ogArray[] = '<meta property="og:url" content="' . $page->getUrl(true) . '" />';
            $ogArray[] = '<meta property="og:locale" content="' . $this->yellow->language->getText('languageLocale', $page->get('language')) . '" />';
            $ogArray[] = '<meta property="og:type" content="website">';
            $ogArray[] = '<meta property="og:sitename" content="' . $page->getHtml("sitename") . '">';

            if (!$page->isExisting("description")) {
                $description = $this->yellow->toolbox->createTextDescription($page->parserData, 150);
                $description = (!is_string_empty($description)) ? $description : $page->getHtml("title");
            } else {
                $description = $page->getHtml('description');
            }
            $ogArray[] = '<meta property="og:description" content="' . $description . '" />';

            $pageImage = (!is_string_empty($page->get('image'))) ? $page->get('image') : $this->yellow->system->get('openGraphDefaultImage');
            if ($pageImage != 'none') {
                $imagePath = $this->yellow->lookup->findMediaDirectory("coreImageLocation") . ltrim($pageImage, '/');
                $imageUrl = rtrim($baseUrl, '/') . '/' . $imagePath;
                list($imageWidth, $imageHeight, $imageOrientation, $imageType) = $this->yellow->toolbox->detectImageInformation($imagePath);

                $ogArray[] = '<meta property="og:image" content="' . $imageUrl . '" />';
                $ogArray[] = '<meta property="og:image:type" content="' . $this->yellow->toolbox->getMimeContentType($imageUrl) . '" />';
                if ($imageWidth > 0 and $imageHeight > 0) {
                    $ogArray[] = '<meta property="og:image:width" content="' . $imageWidth . '" />';
                    $ogArray[] = '<meta property="og:image:height" content="' . $imageHeight . '" />';
                }
            }

            return implode("\n", $ogArray) . "\n";
        }
        return null;
    }
}
