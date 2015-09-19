<?php

/* FOSUserBundle:Registration:register.html.twig */
class __TwigTemplate_e5c41c5a81142e978c316c7589e35100b96850519ad2dd26761c34011aedd259 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'fos_user_content' => array($this, 'block_fos_user_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_940f840e56f8832426e84df586c90835d8f80e2c1c664b995287708ef4ad4b9d = $this->env->getExtension("native_profiler");
        $__internal_940f840e56f8832426e84df586c90835d8f80e2c1c664b995287708ef4ad4b9d->enter($__internal_940f840e56f8832426e84df586c90835d8f80e2c1c664b995287708ef4ad4b9d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "FOSUserBundle:Registration:register.html.twig"));

        // line 1
        $this->displayBlock('fos_user_content', $context, $blocks);
        
        $__internal_940f840e56f8832426e84df586c90835d8f80e2c1c664b995287708ef4ad4b9d->leave($__internal_940f840e56f8832426e84df586c90835d8f80e2c1c664b995287708ef4ad4b9d_prof);

    }

    public function block_fos_user_content($context, array $blocks = array())
    {
        $__internal_f7a0851783e3989ce3fb24f45a9215ad8e2ac8abd29c6e9150ff65223027c032 = $this->env->getExtension("native_profiler");
        $__internal_f7a0851783e3989ce3fb24f45a9215ad8e2ac8abd29c6e9150ff65223027c032->enter($__internal_f7a0851783e3989ce3fb24f45a9215ad8e2ac8abd29c6e9150ff65223027c032_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "fos_user_content"));

        // line 2
        $this->loadTemplate("FOSUserBundle:Registration:register_content.html.twig", "FOSUserBundle:Registration:register.html.twig", 2)->display($context);
        
        $__internal_f7a0851783e3989ce3fb24f45a9215ad8e2ac8abd29c6e9150ff65223027c032->leave($__internal_f7a0851783e3989ce3fb24f45a9215ad8e2ac8abd29c6e9150ff65223027c032_prof);

    }

    public function getTemplateName()
    {
        return "FOSUserBundle:Registration:register.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  35 => 2,  23 => 1,);
    }
}
