<?php

/**
 * Ok, glad you are here
 * first we get a config instance, and set the settings
 * $config = HTMLPurifier_Config::createDefault();
 * $config->set('Core.Encoding', $this->config->get('purifier.encoding'));
 * $config->set('Cache.SerializerPath', $this->config->get('purifier.cachePath'));
 * if ( ! $this->config->get('purifier.finalize')) {
 *     $config->autoFinalize = false;
 * }
 * $config->loadArray($this->getConfig());
 *
 * You must NOT delete the default settings
 * anything in settings should be compacted with params that needed to instance HTMLPurifier_Config.
 *
 * @link http://htmlpurifier.org/live/configdoc/plain.html
 */

return [
  'encoding' => 'UTF-8',
  'finalize' => true,
  'ignoreNonStrings' => false,
  'settings' => [
    'default' => [
      'HTML.Doctype' => 'HTML 4.01 Transitional',
      'HTML.Allowed' => 'h1,h2,h3,h4,h5,h6,p,br,strong,em,u,ul,ol,li,a[href|target|title],img[src|alt|width|height],blockquote,pre,code,span,sub,sup,table,thead,tbody,tr,th,td',
      'CSS.AllowedProperties' => 'font,font-size,font-weight,font-style,font-family,text-decoration,padding,text-align',
      'AutoFormat.AutoParagraph' => false,
      'AutoFormat.RemoveEmpty' => true,
      'Attr.AllowedFrameTargets' => ['_blank'],
    ],
    'titles' => [
      'HTML.Allowed' => 'h1,h2,h3,h4,h5,h6',
    ],
    'simple' => [
      'HTML.Allowed' => 'p,br,strong,em,u,a[href]',
    ],
  ],
];
