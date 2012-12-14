<?php
App::uses('ControllerActionAnnotation', 'Annotations.Annotation');

/**
 * Description of SomethingAnnotation
 *
 * @author kevinb
 */
class IDToDocumentAnnotation extends ControllerActionAnnotation
{
	public $param_index;
	public $field_name;
	
	public function invoke(Controller $controller)
	{
		$doc_id = $controller->request->params['pass'][$this->param_index];
		$controller->{$this->field_name} = "controller->Document->findById({$doc_id})";
	}
}

?>
