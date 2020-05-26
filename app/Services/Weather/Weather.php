<?php


namespace App\Services\Weather;

use KubAT\PhpSimple\HtmlDomParser;

class Weather
{
    protected $parseUrl = 'https://www.gismeteo.ua/weather-zaporizhia-5093/';

    protected $dom;

    public function __construct()
    {
        $this->setDom();
    }

    /**
     * Parse styles
     *
     * @return string
     */
    public function getStyles()
    {
        if (!$this->dom) return '';

        $stylesArray = $this->dom->find('script[type="style"]');

        $styles = '<style>';
        foreach ($stylesArray as $style) {
            $styles .= $style->innertext;
        }
        $styles .= '</style>';

        return $styles;
    }

    /**
     * Parse HTML
     *
     * @return string
     */
    public function getHtml()
    {
        if (!$this->dom) return '<h1>Weather did not parsed</h1>';

        $tab = $this->dom->find('.forecast_frame.hw_wrap .tabs div.tab')[0]->outertext;
        $tab = '<div class="tabs _center">'.$tab.'</div>';

        $widget = $this->dom->find('.forecast_frame.hw_wrap .widget__wrap')[0]->outertext;

        return str_replace('tooltip','tooltip show', $tab.$widget);
    }

    /**
     * Initialize dom object
     *
     * @return void
     */
    protected function setDom()
    {
        $ch = curl_init($this->parseUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
        $content = curl_exec($ch);
        curl_close($ch);

        $this->dom = HtmlDomParser::str_get_html($content);
    }

}
