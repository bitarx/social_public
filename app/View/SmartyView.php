<?php
class SmartyView extends View {
	function __construct (&$controller) {
		parent::__construct($controller);
		if (is_object($controller)) {
			$count = count($this->_passedVars);
			for ($j = 0; $j < $count; $j++) {
				$var = $this->_passedVars[$j];
				$this->{$var} = $controller->{$var};
			}
		}

		if(!App::import('Vendor', 'Smarty', array('file' => 'smarty'.DS.'Smarty.class.php')))
			die('error Loading Smarty Class');
		$this->Smarty = new Smarty();

		//$this->subDir = 'smarty'.DS;
		$this->ext= '.tpl';
		//$this->Smarty->plugins_dir[] = VENDORS.DS.'smarty'.DS.'plugins';
        //$this->Smarty->autoload_filters['pre'][] = 'replace_href';

		$this->Smarty->compile_dir = TMP.'smarty'.DS.'compile'.DS;
		$this->Smarty->cache_dir = TMP.'smarty'.DS.'cache'.DS;
		$this->Smarty->error_reporting = 'E_ALL';
		$this->Smarty->debugging = false;
		$this->Smarty->compile_check = true;
		$this->viewVars['params'] = $this->params;

        // デリミタ変更(js,cssとの混在時を考慮)
        $this->Smarty->left_delimiter  = "<{";
        $this->Smarty->right_delimiter = "}>";

        // プリフィルタ
        if ( 'waku' == PLATFORM_ENV ) {
//            $this->Smarty->registerFilter('pre','replace_href');
        }

		$this->Helpers = new HelperCollection($this);
	}


	protected function _render($___viewFn, $___dataForView = array()) {
		$trace = debug_backtrace();
		$caller = array_shift($trace);
		if ($caller === "element") parent::_render($___viewFn, $___dataForView);

		if (empty($___dataForView)) {
			$___dataForView = $this->viewVars;
        }

		extract($___dataForView, EXTR_SKIP);

		foreach($___dataForView as $data => $value) {
			if(!is_object($data)) {
				$this->Smarty->assign($data, $value);
			}
		}

		$this->Smarty->assign('View', new View(null));

		ob_start();
		$this->Smarty->display($___viewFn);
		return ob_get_clean();
	}

	public function loadHelpers() {
		$helpers = HelperCollection::normalizeObjectArray($this->helpers);
		foreach ($helpers as $name => $properties) {
			list($plugin, $class) = pluginSplit($properties['class']);
			$this->{$class} = $this->Helpers->load($properties['class'], $properties['settings']);
			$this->Smarty->assign($name, $this->{$class});
		}
		$this->_helpersLoaded = true;
    }
}

?>

