CakePHP Annotations Example Project
===================================

An example project using CakePHP. Forked from CakePHP master branch.

Includes cakephp-annotations as a submodule, which includes a fork of 
addendum annotations for php. Make sure to run `git submodule init` and
`git submodule update` to get all required modules.

There are three example annotations in the app/Annotations directory:
- TestAnnotation/SomethingAnnotation, which print their name and the value argument when invoked.
- IDToDocumentAnnotation, an example of how to have a find run on a model when the annotation is invoked.

The PagesController at app/Controller/PagesController, with a single annotated method showing:
- Importing local and plugin annotations (`App::uses('TestAnnotation', 'Annotation')`, `App::uses('ParamConverter', 'Annotation')` )
- Using a basic annotation ( `@AnotherAnnotation('AnotherAnnotationValue')` )
- Running an annotation at specific callback points ( `@TestAnnotation(value='TestAnnotationValue', stage={'initialize', 'shutdown'})` )
- Using the ParamConverter for two different controller parameters
