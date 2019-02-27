<?php
/**
 * This file is part of CMSGears Framework. Please view License file distributed
 * with the source code for license details.
 *
 * @link https://www.cmsgears.org/
 * @copyright Copyright (c) 2015 VulpineCode Technologies Pvt. Ltd.
 */

namespace cmsgears\widgets\category;

// Yii Imports
use Yii;
use yii\helpers\Html;

// CMG Imports
use cmsgears\core\common\config\CoreGlobal;

use cmsgears\core\common\base\Widget;

/**
 * CategoryMapper maps categories to models.
 *
 * @since 1.0.0
 */
class CategoryMapper extends Widget {

	// Variables ---------------------------------------------------

	// Globals -------------------------------

	// Constants --------------

	// Public -----------------

	// Protected --------------

	// Variables -----------------------------

	// Public -----------------

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

	public $binderModel		= 'CategoryBinder';
	public $mapToColumn		= false;
	public $columnName		= null;

	// Notes to help user in choosing categories.
	public $notes			= '<b>Notes</b>: Choose at least one category to map.';

	// Flag to show notes
	public $showNotes		= true;

	// Input type among checkbox, radio to render the chooser.
	public $inputType		= 'checkbox';

	// Disable all the rendered categories.
	public $disabled		= false;

	// Override default view path
	public $templateDir		= '@cmsgears/widget-category/views/category';

	// Use form view only when levelList is set to false.
	public $template		= 'level';

	// Serach using model category service instead of trait
	public $service			= false;

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

		// Execute query only if categories are not provided and search by type is enabled.
		if( count( $this->categories ) == 0 && $this->searchByType ) {

			// Generate category following parent child relationship.
			if( $this->levelList ) {

				$this->categories = $this->categoryService->getLevelListByType( $this->type );
			}
			// Generat flat list irrespective of parent child relationship.
			else {

				$this->categories = $this->categoryService->getByType( $this->type );
			}
		}

		// Configure parent type
		$this->parentType = isset( $this->parentType ) ? $this->parentType : $this->type;

		return $this->renderWidget();
	}

	// CMG interfaces ------------------------

	// CMG parent classes --------------------

	// CategoryMapper ------------------------

	public function renderWidget( $config = [] ) {

		$widgetHtml = $this->render( $this->template, [ 'widget' => $this ] );

		if( $this->wrap ) {

			return Html::tag( $this->wrapper, $widgetHtml, $this->options );
		}

		return $widgetHtml;
	}

}
