<?php
namespace cmsgears\widgets\category;

// Yii Imports
use \Yii;
use yii\helpers\Html;

// CMG Imports
use cmsgears\core\common\config\CoreGlobal;

class CategoryMapper extends \cmsgears\core\common\base\Widget {

	// Variables ---------------------------------------------------

	// Public Variables --------------------

	// Category models
	public $categories		= [];

	// Type to be used to search categories.
	public $type			= CoreGlobal::TYPE_SYSTEM;

	public $parentType		= null;

	// Flag to search category for given type in case Category models not provided or empty.
	public $searchByType	= true;

	// Flag to search categories following parent child relationship.
	public $levelList		= true;

	// The model using Category Trait
	public $model;

	public $binderModel		= 'Binder';

	// Notes to help user in choosing categories.
	public $notes			= 'Note: Choose at least one category to map.';

	// Flag to show notes
	public $showNotes		= true;

	// Input type among checkbox, radio to render the chooser.
	public $inputType		= 'checkbox';

	// Disable all the rendered categories.
	public $disabled		= false;

	// Override default view path
	public $templateDir		= '@cmsgears/widget-category/views/category';

	// Use form view only when levelList is set to false.
	public $template		= 'scroller';

	// Serach using model category service instead of trait
	public $service			= false;

	// Private Variables -------------------

	private $categoryService;

	// Constructor and Initialisation ------------------------------

	// yii\base\Object

	public function init() {

		parent::init();

		$this->categoryService	= Yii::$app->factory->get( 'categoryService' );
	}

	// Instance Methods --------------------------------------------

	// yii\base\Widget

	public function run() {

		// Execute query only if categories are not provided and search by type is enabled.
		if( count( $this->categories ) == 0 && $this->searchByType ) {

			// Generate category following parent child relationship.
			if( $this->levelList ) {

				$this->categories	= $this->categoryService->getLevelListByType( $this->type );
			}
			// Generat flat list irrespective of parent child relationship.
			else {

				$this->categories	= $this->categoryService->getByType( $this->type );
			}
		}

		// Configure parent type
		$this->parentType	= isset( $this->parentType ) ? $this->parentType : $this->type;

		return $this->renderWidget();
	}

	// CategoryWidget

	public function renderWidget( $config = [] ) {

		$widgetHtml = $this->render( $this->template, [ 'widget' => $this ] );

		return Html::tag( 'div', $widgetHtml, $this->options );
	}
}

?>