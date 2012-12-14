<?php
App::uses('ControllerActionAnnotation', 'Annotations.Annotation');

/**
 * Description of SomethingAnnotation
 *
 * @author kevinb
 */
class SomethingAnnotation extends ControllerActionAnnotation
{
	public function invoke(Controller $controller)
	{
		debug("SomethingAnnotation " . $this->value);
	}
}

?>
