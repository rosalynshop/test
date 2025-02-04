<?php

namespace ExternalImporter\application\components\scrap;

use function ExternalImporter\prnx;

defined('\ABSPATH') || exit;

/**
 * ScraperapiScrap class file
 *
 * @author keywordrush.com <support@keywordrush.com>
 * @link https://www.keywordrush.com
 * @copyright Copyright &copy; 2024 keywordrush.com
 */
class ScraperapiScrap extends Scrap
{
    const SLUG = 'scraperapi';

    public function doAction($url, $args)
    {
        if (!$this->needSendThrough($url))
            return $url;

        $url = 'http://api.scraperapi.com?api_key=' . urlencode($this->getToken()) . '&url=' . urlencode($url) . '&keep_headers=false';
        $url = \apply_filters('ei_parse_url_' . $this->getSlug(), $url);

        return $url;
    }
}
