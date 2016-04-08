<?php
namespace cmsgears\widgets\category;

use \Yii;
use yii\helpers\Html;

use cmsgears\core\common\services\resources\CategoryService;

class OptionMapper extends \cmsgears\core\common\base\Widget {

	// Variables ---------------------------------------------------

	// Public Variables --------------------

	public $categoryType	= null;
	public $categorySlug	= null;

	// The model using Option Trait
	public $model;

	public $binderModel	= 'Binder';

	public $notes		= 'Note: Choose at least one option to map.';

    public $inputType   = 'checkbox';

	public $allDisabled	= false;

	public $templateDir	= '@cmsgears/widget-category/views/option';
	public $template	= 'scroller';

	// Private Variables -------------------

	private $category;
	private $categoryOptions;

	// Constructor and Initialisation ------------------------------

	// yii\base\Object

    public function init() {

        parent::init();
    }

	// Instance Methods --------------------------------------------

	// yii\base\Widget

    public function run() {

		$this->category			= CategoryService::findBySlugType( $this->categorySlug, $this->categoryType );
		$this->categoryOptions 	= $this->category->options;

        return $this->renderWidget();
    }

	// CategoryWidget

	public function renderWidget( $config = [] ) {

		$widgetHtml = $this->render( $this->template, [
			'category' => $this->category,
			'options' => $this->categoryOptions,
			'model' => $this->model,
			'binderModel' => $this->binderModel,
			'allDisabled' => $this->allDisabled,
			'notes' => $this->notes,
			'inputType' => $this->inputType
		]);

        return Html::tag( 'div', $widgetHtml, $this->options );
	}
}

?>