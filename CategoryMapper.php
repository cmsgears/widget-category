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

	public $levelList	= true;

	// The model using Category Trait
	public $model;

	public $binderModel	= 'Binder';

	public $notes		= 'Note: Choose at least one category to map.';

	public $template	= 'mapper-scroller';
	
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

		if( $this->levelList ) {

			$this->categories	= CategoryService::getLevelListByType( $this->type );	
		}
		else {

			$this->categories	= CategoryService::findByType( $this->type );
		}

        return $this->renderWidget();
    }

	// CategoryWidget

	public function renderWidget( $config = [] ) {

		$widgetHtml = $this->render( $this->template, [
			'type' => $this->type,
			'categories' => $this->categories,
			'levelList' => $this->levelList,
			'model' => $this->model,
			'binderModel' => $this->binderModel,
			'allDisabled' => $this->allDisabled,
			'notes' => $this->notes
		]);

        return Html::tag( 'div', $widgetHtml, $this->options );
	}
}

?>