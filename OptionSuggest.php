<?php
/**
 * This file is part of CMSGears Framework. Please view License file distributed
 * with the source code for license details.
 *
 * @link https://www.cmsgears.org/
 * @copyright Copyright (c) 2015 VulpineCode Technologies Pvt. Ltd.
 */

namespace cmsgears\widgets\category;

/**
 * OptionSuggest maps category options to models using auto-suggest.
 *
 * @since 1.0.0
 */
class OptionSuggest extends OptionAuto {

	// Variables ---------------------------------------------------

	// Globals -------------------------------

	// Constants --------------

	// Public -----------------

	// Protected --------------

	// Variables -----------------------------

	// Public -----------------

	public $template = 'suggest';

	public $mapperClass = 'mapper mapper-layout mapper-layout-inline mapper-auto mapper-auto-items';

	public $label;

	// Application
	public $app = 'core';

	// Controller where mapping request need to be triggered
	public $controller = 'modelMapper';

	// Controller action to handle the search request
	public $action = 'autoSearch';

	// Explicit URL to handle the controller search action request
	public $actionUrl = 'core/option/auto-search';

	// Controller action to handle the mapping request
	public $mapAction = 'mapItem';

	// Explicit URL to handle the controller mapping action request
	public $mapActionUrl = null;

	// Controller action to handle the delete request
	public $deleteAction = 'deleteItem';

	// Explicit URL to handle the controller delete action request
	public $deleteActionUrl	= null;

	// Protected --------------

	// Private ----------------

	// Traits ------------------------------------------------------

	// Constructor and Initialisation ------------------------------

	// Instance methods --------------------------------------------

	// Yii interfaces ------------------------

	// Yii parent classes --------------------

	// yii\base\Widget --------

	// CMG interfaces ------------------------

	// CMG parent classes --------------------

	// OptionAuto ----------------------------

}
