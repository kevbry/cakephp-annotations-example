<?php
App::uses('ControllerActionAnnotation', 'Annotation');

/**
 * Example annotation
 *
 * @author kevbry
 */
class TestAnnotation extends ControllerActionAnnotation
{
	public function invoke(Controller $controller)
	{
		debug("TestAnnotations " . $this->value);
	}
	
}

?>
