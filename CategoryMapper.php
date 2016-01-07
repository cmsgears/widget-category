<?php
namespace cmsgears\widgets\category;

use \Yii;
use yii\helpers\Url;

use cmsgears\core\common\services\CategoryService;

class CategoryMapper extends \cmsgears\core\common\base\Widget {

	// Variables ---------------------------------------------------

	// Public Variables --------------------

	public $type;

	// Constructor and Initialisation ------------------------------

	// yii\base\Object

    public function init() {

        parent::init();
    }

	// Instance Methods --------------------------------------------

	// yii\base\Widget

    public function run() {

        return $this->renderWidget();
    }

	// CategoryWidget

	public function renderWidget() {

	}
}

?>