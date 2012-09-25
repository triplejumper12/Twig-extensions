<?php
/**
 * Twig Extension to add the eval function to evaluate twig code passed into a template
 */
class Twig_Extensions_Extension_Eval extends Twig_Extension
{
    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'eval';
    }

    /**
     * Returns a list of functions to add to the existing list.
     *
     * @return array An array of functions
     */
    public function getFunctions()
    {
        return array(
            'eval' => new Twig_Function_Method($this, 'evaluateString', array(
                'needs_context' => true,
            )),
        );
    }

    /**
     * Loads a string template and returns the evaluated result
     *
     * @param  array   $context
     * @param  string  $string  The string template to evaluate
     * @return string
     */
    public function evaluateString($context, $string)
    {
        $env = new Twig_Environment(new Twig_Loader_String());
        return $env->loadTemplate($string)->render($context);
    }
}