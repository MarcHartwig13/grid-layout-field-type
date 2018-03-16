<?php
/**
 * Grid Layout Field Type plugin for Craft CMS 3.x
 *
 * User controlled grid layout
 *
 * @link      marchartwig.com
 * @copyright Copyright (c) 2018 Marc Hartwig
 */

namespace mhartwig\gridlayoutfieldtype\models;

use mhartwig\gridlayoutfieldtype\GridLayoutFieldType;

use Craft;
use craft\base\Model;

/**
 * GridLayoutFieldType Settings Model
 *
 * This is a model used to define the plugin's settings.
 *
 * Models are containers for data. Just about every time information is passed
 * between services, controllers, and templates in Craft, it’s passed via a model.
 *
 * https://craftcms.com/docs/plugins/models
 *
 * @author    Marc Hartwig
 * @package   GridLayoutFieldType
 * @since     1.0.0
 */
class Settings extends Model
{
    // Public Properties
    // =========================================================================

    /**
     * Some field model attribute
     *
     * @var string
     */
    public $numberOfRows = 1;
    public $numberOfColumns = 1;
    public $matrixSelect = ['One','Two','Three'];

    // Public Methods
    // =========================================================================

    /**
     * Returns the validation rules for attributes.
     *
     * Validation rules are used by [[validate()]] to check if attribute values are valid.
     * Child classes may override this method to declare different validation rules.
     *
     * More info: http://www.yiiframework.com/doc-2.0/guide-input-validation.html
     *
     * @return array
     */
    public function rules()
    {
        return [
            ['numberOfRows', 'number'],
            ['numberOfRows', 'default', 'value' => 1],
            ['numberOfColumns', 'number'],
            ['numberOfColumns', 'default', 'value' => 1],
        ];
    }
}
