<?php

/* TwigBundle:Exception:exception_full.html.twig */
class __TwigTemplate_5ef347d04aafae4528114bb093ed7f353d4701ef239f15631e40ddd3018a9641 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("TwigBundle::layout.html.twig", "TwigBundle:Exception:exception_full.html.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "TwigBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_59f1e6ca5e24abfaedb6e82b5b5cbe7e47d636520592d93a2bd32fd37f9257ee = $this->env->getExtension("native_profiler");
        $__internal_59f1e6ca5e24abfaedb6e82b5b5cbe7e47d636520592d93a2bd32fd37f9257ee->enter($__internal_59f1e6ca5e24abfaedb6e82b5b5cbe7e47d636520592d93a2bd32fd37f9257ee_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_59f1e6ca5e24abfaedb6e82b5b5cbe7e47d636520592d93a2bd32fd37f9257ee->leave($__internal_59f1e6ca5e24abfaedb6e82b5b5cbe7e47d636520592d93a2bd32fd37f9257ee_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_264984fb4c28c2b494e4fe13d3aa192266d10d7e999c0260d8bc7e3e01bb7a19 = $this->env->getExtension("native_profiler");
        $__internal_264984fb4c28c2b494e4fe13d3aa192266d10d7e999c0260d8bc7e3e01bb7a19->enter($__internal_264984fb4c28c2b494e4fe13d3aa192266d10d7e999c0260d8bc7e3e01bb7a19_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('request')->generateAbsoluteUrl($this->env->getExtension('asset')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_264984fb4c28c2b494e4fe13d3aa192266d10d7e999c0260d8bc7e3e01bb7a19->leave($__internal_264984fb4c28c2b494e4fe13d3aa192266d10d7e999c0260d8bc7e3e01bb7a19_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_d91c0c9003c20f56df414c98955b62d52ed5fdc28216808ac3b9ffbfa8915f2e = $this->env->getExtension("native_profiler");
        $__internal_d91c0c9003c20f56df414c98955b62d52ed5fdc28216808ac3b9ffbfa8915f2e->enter($__internal_d91c0c9003c20f56df414c98955b62d52ed5fdc28216808ac3b9ffbfa8915f2e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_d91c0c9003c20f56df414c98955b62d52ed5fdc28216808ac3b9ffbfa8915f2e->leave($__internal_d91c0c9003c20f56df414c98955b62d52ed5fdc28216808ac3b9ffbfa8915f2e_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_bc16646c4716697fff0571dacbf9d0151f30644aa4ed855a0eafaa19b15cdbad = $this->env->getExtension("native_profiler");
        $__internal_bc16646c4716697fff0571dacbf9d0151f30644aa4ed855a0eafaa19b15cdbad->enter($__internal_bc16646c4716697fff0571dacbf9d0151f30644aa4ed855a0eafaa19b15cdbad_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("TwigBundle:Exception:exception.html.twig", "TwigBundle:Exception:exception_full.html.twig", 12)->display($context);
        
        $__internal_bc16646c4716697fff0571dacbf9d0151f30644aa4ed855a0eafaa19b15cdbad->leave($__internal_bc16646c4716697fff0571dacbf9d0151f30644aa4ed855a0eafaa19b15cdbad_prof);

    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:exception_full.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 12,  72 => 11,  58 => 8,  52 => 7,  42 => 4,  36 => 3,  11 => 1,);
    }
}
