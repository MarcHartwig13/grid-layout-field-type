<?php
/**
 * Grid Layout Field Type plugin for Craft CMS 3.x
 *
 * User controlled grid layout
 *
 * @link      marchartwig.com
 * @copyright Copyright (c) 2018 Marc Hartwig
 */

namespace mhartwig\gridlayoutfieldtype\twigextensions;

use mhartwig\gridlayoutfieldtype\GridLayoutFieldType;

use Craft;

/**
 * Twig can be extended in many ways; you can add extra tags, filters, tests, operators,
 * global variables, and functions. You can even extend the parser itself with
 * node visitors.
 *
 * http://twig.sensiolabs.org/doc/advanced.html
 *
 * @author    Marc Hartwig
 * @package   GridLayoutFieldType
 * @since     1.0.0
 */
class GridLayoutFieldTypeTwigExtension extends \Twig_Extension
{
    // Public Methods
    // =========================================================================

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'GridLayoutFieldType';
    }

    /**
     * Returns an array of Twig filters, used in Twig templates via:
     *
     *      {{ 'something' | someFilter }}
     *
     * @return array
     */
    /*public function getFilters()
    {
        return [
            new \Twig_SimpleFilter('someFilter', [$this, 'someInternalFunction']),
        ];
    }*/

    /**
     * Returns an array of Twig functions, used in Twig templates via:
     *
     *      {% set this = someFunction('something') %}
     *
    * @return array
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('gridLayout', [$this, 'renderGridLayoutTemplate'], ['is_safe' => array('html')]),
        ];
    }

    /**
     * Our function called via Twig; it can do anything you want
     *
     * @param null $text
     *
     * @return string
     */
    public function renderGridLayoutTemplate($params = [])
    {
        return GridLayoutFieldType::$plugin->gridlayoutfieldtype->renderGridLayoutTemplate($params);
    }
}
