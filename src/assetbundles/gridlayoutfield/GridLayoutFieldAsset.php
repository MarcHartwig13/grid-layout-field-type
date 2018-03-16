<?php
/**
 * Grid Layout Field Type plugin for Craft CMS 3.x
 *
 * User controlled grid layout
 *
 * @link      marchartwig.com
 * @copyright Copyright (c) 2018 Marc Hartwig
 */

namespace mhartwig\gridlayoutfieldtype\assetbundles\gridlayoutfield;

use Craft;
use craft\vue\Asset as VueAsset;
use craft\web\AssetBundle;
use craft\web\assets\cp\CpAsset;

/**
 * GridLayoutFieldAsset AssetBundle
 *
 * AssetBundle represents a collection of asset files, such as CSS, JS, images.
 *
 * Each asset bundle has a unique name that globally identifies it among all asset bundles used in an application.
 * The name is the [fully qualified class name](http://php.net/manual/en/language.namespaces.rules.php)
 * of the class representing it.
 *
 * An asset bundle can depend on other asset bundles. When registering an asset bundle
 * with a view, all its dependent asset bundles will be automatically registered.
 *
 * http://www.yiiframework.com/doc-2.0/guide-structure-assets.html
 *
 * @author    Marc Hartwig
 * @package   GridLayoutFieldType
 * @since     1.0.0
 */
class GridLayoutFieldAsset extends AssetBundle
{
    // Public Methods
    // =========================================================================
    public $depends = [
        VueAsset::class,
    ];


    /**
     * Initializes the bundle.
     */
    public function init()
    {
        // define the path that your publishable resources live
        $this->sourcePath = "@mhartwig/gridlayoutfieldtype/assetbundles/gridlayoutfield/dist";

        // define the dependencies
        $this->depends = [
            CpAsset::class,
            'craft\web\assets\vue\VueAsset'
        ];

        // define the relative path to CSS/JS files that should be registered with the page
        // when this asset bundle is registered
        $this->js = [
            'js/GridLayout.js',
            'js/vue-components.js',
        ];

        $this->css = [
            'css/GridLayout.css',
        ];

        parent::init();
    }
}
