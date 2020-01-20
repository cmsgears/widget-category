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
 * OptionAuto maps category options to models using auto-suggest.
 *
 * @since 1.0.0
 */
class OptionAuto extends OptionMapper {

	// Variables ---------------------------------------------------

	// Globals -------------------------------

	// Constants --------------

	// Public -----------------

	// Protected --------------

	// Variables -----------------------------

	// Public -----------------

	public $template	= 'auto';

	// Application
	public $app			= 'core';

	// Controller where mapping request need to be triggered
	public $controller	= 'modelMapper';

	// Controller action to handle the search request
	public $action		= 'toggleItem';

	// Explicit URL to handle the controller search action request
	public $actionUrl	= null;

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
