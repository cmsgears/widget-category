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
use cmsgears\core\common\base\Widget;

/**
 * OptionMapper maps category options to models.
 *
 * @since 1.0.0
 */
class OptionMapper extends Widget {

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
	public $binderModel	= 'OptionBinder';

	// Notes displayed as hints
	public $notes		= 'Note: Choose at least one option to map.';

	// Flag to show notes
	public $showNotes	= true;

	// The input type to be used for mapping. It can be checkbox, radio or switch.
	public $inputType	= 'checkbox';

	public $disabled	= false;

	public $templateDir	= '@cmsgears/widget-category/views/option';
	public $template	= 'default';

	// Optional to use category in case type and slug are not given.
	public $category;

	public $categoryOptions;

	public $siteId;

	// Protected --------------

	// Private ----------------

	private $categoryService;

	// Traits ------------------------------------------------------

	// Constructor and Initialisation ------------------------------

	public function init() {

		parent::init();

		$this->categoryService	= Yii::$app->factory->get( 'categoryService' );

		if( !isset( $this->siteId ) ){

			$this->siteId = Yii::$app->core->siteId;
		}
	}

	// Instance methods --------------------------------------------

	// Yii interfaces ------------------------

	// Yii parent classes --------------------

	// yii\base\Widget --------

	public function run() {

		// Find category for given slug and type in case category is not provided.
		if( !isset( $this->category ) ) {

			$this->category	= $this->categoryService->getBySlugType( $this->categorySlug, $this->categoryType, [ 'siteId' => $this->siteId ] );
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
