<?php
namespace cmsgears\widgets\category;

use \Yii;
use yii\helpers\Html;

use cmsgears\core\common\services\resources\CategoryService;

class OptionMapper extends \cmsgears\core\common\base\Widget {

	// Variables ---------------------------------------------------

	// Globals -------------------------------

	// Constants --------------

	// Public -----------------

	// Protected --------------

	// Variables -----------------------------

	// Public -----------------

	public $categoryType	= null;
	public $categorySlug	= null;

	// The model using Option Trait
	public $model;

	public $binderModel	= 'Binder';

	public $notes		= 'Note: Choose at least one option to map.';

    public $inputType   = 'checkbox';

	public $disabled	= false;

	public $templateDir	= '@cmsgears/widget-category/views/option';
	public $template	= 'scroller';

	// Optional to use category in case type and slug are not given.
	public $category;

	public $categoryOptions;

	// Protected --------------

	// Private ----------------

	private $categoryService;

	// Traits ------------------------------------------------------

	// Constructor and Initialisation ------------------------------

    public function init() {

        parent::init();

		$this->categoryService	= Yii::$app->factory->get( 'categoryService' );
    }

	// Instance methods --------------------------------------------

	// Yii interfaces ------------------------

	// Yii parent classes --------------------

	// yii\base\Widget --------

    public function run() {

		// Find category for given slug and type in case category is not provided.
		if( !isset( $this->category ) ) {

			$this->category			= $this->categoryService->getBySlugType( $this->categorySlug, $this->categoryType );
			$this->categoryOptions 	= $this->category->options;
		}

        return $this->renderWidget();
    }

	// CMG interfaces ------------------------

	// CMG parent classes --------------------

	// Widget --------------------------------

	public function renderWidget( $config = [] ) {

		$widgetHtml = $this->render( $this->template, [ 'widget' => $this ] );

        return Html::tag( 'div', $widgetHtml, $this->options );
	}
}
