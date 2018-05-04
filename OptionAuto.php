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
	public $app			= 'mapper';

	// Controller where mapping request need to be triggered
	public $controller	= 'option';

	// Controller action to handle the search request
	public $action		= 'map';

	// Explicit URL to handle the controller search action request
	public $actionUrl	= 'core/option/map';

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
