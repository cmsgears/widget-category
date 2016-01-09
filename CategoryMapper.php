<?php
namespace cmsgears\widgets\category;

use \Yii;
use yii\helpers\Html;

use cmsgears\core\common\services\CategoryService;

class CategoryMapper extends \cmsgears\core\common\base\Widget {

	// Variables ---------------------------------------------------

	// Public Variables --------------------
	
	// Type to be used to form the Category Map
	public $type;
	
	// The model using Category Trait
	public $model;
	
	public $notes		= 'Note: Choose at least one category to map.';

	public $template	= 'mapper';
	
	public $allDisabled	= false;

	// Private Variables -------------------

	private $categories;
	
	// Constructor and Initialisation ------------------------------

	// yii\base\Object

    public function init() {

        parent::init();
    }

	// Instance Methods --------------------------------------------

	// yii\base\Widget

    public function run() {

		$this->categories	= CategoryService::getLevelListByType( $this->type );

        return $this->renderWidget();
    }

	// CategoryWidget

	public function renderWidget() {

		$widgetHtml = $this->render( $this->template, [
			'categories' => $this->categories,
			'model' => $this->model,
			'allDisabled' => $this->allDisabled,
			'notes' => $this->notes
		]);

        return Html::tag( 'div', $widgetHtml, $this->options );
	}
}

?>