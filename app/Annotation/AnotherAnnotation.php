<?php
App::uses('ControllerActionAnnotation', 'Annotation');

/**
 * Example Annotation
 *
 * @author kevbry
 */
class AnotherAnnotation extends ControllerActionAnnotation
{
	public function invoke(Controller $controller)
	{
		debug("AnotherAnnotation " . $this->value);
	}
}

?>
