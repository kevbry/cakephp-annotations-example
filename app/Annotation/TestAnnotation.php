<?php
App::uses('ControllerActionAnnotation', 'Annotations.Annotation');

/**
 * Description of TestAnnotation
 *
 * @author kevinb
 */
class TestAnnotation extends ControllerActionAnnotation
{
	public function invoke(Controller $controller)
	{
		debug("TestAnnotations " . $this->value);
	}
	
}

?>
