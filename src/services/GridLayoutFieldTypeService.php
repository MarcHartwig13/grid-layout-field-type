<?php
/**
 * Grid Layout Field Type plugin for Craft CMS 3.x
 *
 * User controlled grid layout
 *
 * @link      marchartwig.com
 * @copyright Copyright (c) 2018 Marc Hartwig
 */

namespace mhartwig\gridlayoutfieldtype\services;

use mhartwig\gridlayoutfieldtype\GridLayoutFieldType;

use Craft;
use craft\base\Component;
use craft\web\View;

/**
 * GridLayoutFieldTypeService Service
 *
 * All of your plugin’s business logic should go in services, including saving data,
 * retrieving data, etc. They provide APIs that your controllers, template variables,
 * and other plugins can interact with.
 *
 * https://craftcms.com/docs/plugins/services
 *
 * @author    Marc Hartwig
 * @package   GridLayoutFieldType
 * @since     1.0.0
 */
class GridLayoutFieldTypeService extends Component
{
    // Public Methods
    // =========================================================================

    /**
     * This function can literally be anything you want, and you can have as many service
     * functions as you want
     *
     * From any other plugin file, call it like this:
     *
     *     GridLayoutFieldType::$plugin->gridLayoutFieldTypeService->exampleService()
     *
     * @return mixed
     */
    public function renderGridLayoutTemplate($params = []):string
    {
        $variables = [
            'matrix' => $params['matrix'],
            'userCode' => $params['userCode']
        ];
        $oldMode = Craft::$app->view->getTemplateMode();
        Craft::$app->view->setTemplateMode(View::TEMPLATE_MODE_CP);
        $html = Craft::$app->view->renderTemplate('grid-layout-field-type/_grid_output/output', $variables);
        Craft::$app->view->setTemplateMode($oldMode);

        return $html;
        //return Craft::$app->view->renderTemplate('grid-layout-field-type/_grid_output/output', $user_code);
    }
}
