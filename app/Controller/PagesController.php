<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('TestAnnotation', 'Annotation');
App::uses('AnotherAnnotation', 'Annotation');
App::uses('IDToDocumentAnnotation', 'Annotation');
App::uses('ParamConverter', 'Annotations.Annotation');
App::uses('AppController', 'Controller');
App::uses('NamedParamsToArgument', 'Annotations.Annotation');
App::uses('ControllerOptions', 'Annotations.Annotation');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Pages';
	
	public $components = array(
		'Annotations.ControllerAnnotation'=>array('disable'=>false) //set to true to disable annotations
	);

	//Set to true to disable annotations
	public $disable_annotations=false;
	public $Document;

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array();

	public function __construct($request = null, $response = null)
	{
		parent::__construct($request, $response);
		$this->Document = new TestDocument();
		$this->Widget = new TestWidget();
	}
	
	
	/**
	 * @TestAnnotation(value=' runs at both initialize and shutdown', stage={'initialize', 'shutdown'})
	 * @AnotherAnnotation('AnotherAnnotationValue')
	 * @ParamConverter(parameter='id', class='Document')
	 * @ParamConverter(parameter='value', class='Widget', method='getSomeValueById')
	 * @ParamConverter(parameter='empty', class='Widget', method='getSomeValueById', require_value=false)
	 */
	public function test_annotate($empty, $id=2, $value=9)
	{
		debug($id);
		debug($value);
		debug($empty);
	}
	
	/**
	 * @NamedParamsToArgument
	 * @ControllerOptions({autoRender=false})
	 * 
	 * //Request with a URL like /pages/test_annotate_named/valvar:12/id:21
	 */
	public function test_annotate_named($id=2, $valvar=9)
	{
		debug($id);
		debug($valvar);
	}
}

class TestWidget
{
	public function __construct()
	{
		
	}
	
	public function getSomeValueById($id)
	{
		return array("Some Value"=>$id);
	}
}


class TestDocument
{
	public function __construct()
	{
		
	}
	
	public function findById($id)
	{
		return array("Document"=>array("id"=>$id));
	}
}
