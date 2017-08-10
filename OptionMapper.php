<?php
namespace cmsgears\widgets\category;

use Yii;
use yii\helpers\Html;

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

	// The model name used to submit request
	public $binderModel	= 'Binder';

	// Notes displayed as hints
	public $notes		= 'Note: Choose at least one option to map.';

	// Flag to show notes
	public $showNotes		= true;

	// The input type to be used for mapping. It can be either checkbox or radio.
	public $inputType	= 'checkbox';

	public $disabled	= false;

	public $templateDir	= '@cmsgears/widget-category/views/option';
	public $template	= 'simple';

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

			$this->category	= $this->categoryService->getBySlugType( $this->categorySlug, $this->categoryType );
		}

		// Retrieve category options
		$this->categoryOptions	= $this->category->options;

		return $this->renderWidget();
	}

	// CMG interfaces ------------------------

	// CMG parent classes --------------------

	// OptionMapper --------------------------

	public function renderWidget( $config = [] ) {

		$widgetHtml = $this->render( $this->template, [ 'widget' => $this ] );

		if( $this->wrap ) {

			return Html::tag( $this->wrapper, $widgetHtml, $this->options );
		}

		return $widgetHtml;
	}
}
