<?php

/* FOSUserBundle:Form:fields.html.twig */
class __TwigTemplate_e76a8e3d025aeec412b044e54f089c8b0f276871cc58f391f1365c7bae6b25b1 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'vich_file_widget' => array($this, 'block_vich_file_widget'),
            'vich_image_widget' => array($this, 'block_vich_image_widget'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_bdf180fc199d48de026c66d6185a3da10e7a99935fe12bc3ce5c59f9119da1ae = $this->env->getExtension("native_profiler");
        $__internal_bdf180fc199d48de026c66d6185a3da10e7a99935fe12bc3ce5c59f9119da1ae->enter($__internal_bdf180fc199d48de026c66d6185a3da10e7a99935fe12bc3ce5c59f9119da1ae_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "FOSUserBundle:Form:fields.html.twig"));

        // line 1
        $this->displayBlock('vich_file_widget', $context, $blocks);
        // line 15
        echo "
";
        // line 16
        $this->displayBlock('vich_image_widget', $context, $blocks);
        
        $__internal_bdf180fc199d48de026c66d6185a3da10e7a99935fe12bc3ce5c59f9119da1ae->leave($__internal_bdf180fc199d48de026c66d6185a3da10e7a99935fe12bc3ce5c59f9119da1ae_prof);

    }

    // line 1
    public function block_vich_file_widget($context, array $blocks = array())
    {
        $__internal_d1917e6ed515c0f630d5ff5ab21c10218aef6d4c9cdb49152a6158c3052e60ee = $this->env->getExtension("native_profiler");
        $__internal_d1917e6ed515c0f630d5ff5ab21c10218aef6d4c9cdb49152a6158c3052e60ee->enter($__internal_d1917e6ed515c0f630d5ff5ab21c10218aef6d4c9cdb49152a6158c3052e60ee_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "vich_file_widget"));

        // line 2
        ob_start();
        // line 3
        echo "    <div class=\"vich-file\">
        ";
        // line 4
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "file", array()), 'row');
        echo "
        ";
        // line 5
        if ($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "delete", array(), "any", true, true)) {
            // line 6
            echo "        ";
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "delete", array()), 'row');
            echo "
        ";
        }
        // line 8
        echo "
        ";
        // line 9
        if ((array_key_exists("download_uri", $context) && (isset($context["download_uri"]) ? $context["download_uri"] : $this->getContext($context, "download_uri")))) {
            // line 10
            echo "        <a href=\"";
            echo twig_escape_filter($this->env, (isset($context["download_uri"]) ? $context["download_uri"] : $this->getContext($context, "download_uri")), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("download", array(), "VichUploaderBundle"), "html", null, true);
            echo "</a>
        ";
        }
        // line 12
        echo "    </div>
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        
        $__internal_d1917e6ed515c0f630d5ff5ab21c10218aef6d4c9cdb49152a6158c3052e60ee->leave($__internal_d1917e6ed515c0f630d5ff5ab21c10218aef6d4c9cdb49152a6158c3052e60ee_prof);

    }

    // line 16
    public function block_vich_image_widget($context, array $blocks = array())
    {
        $__internal_cffec46e2a5adb26fd3e112b879616ec9a63967bfe6b2a11541dfc2ded29eaaa = $this->env->getExtension("native_profiler");
        $__internal_cffec46e2a5adb26fd3e112b879616ec9a63967bfe6b2a11541dfc2ded29eaaa->enter($__internal_cffec46e2a5adb26fd3e112b879616ec9a63967bfe6b2a11541dfc2ded29eaaa_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "vich_image_widget"));

        // line 17
        ob_start();
        // line 18
        echo "    <div class=\"vich-image\">
        ";
        // line 19
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "file", array()), 'row');
        echo "
       ";
        // line 23
        echo "
        ";
        // line 24
        if ((array_key_exists("download_uri", $context) && (isset($context["download_uri"]) ? $context["download_uri"] : $this->getContext($context, "download_uri")))) {
            // line 25
            echo "         <a href=\"";
            echo twig_escape_filter($this->env, (isset($context["download_uri"]) ? $context["download_uri"] : $this->getContext($context, "download_uri")), "html", null, true);
            echo "\"><img width=\"100px\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["download_uri"]) ? $context["download_uri"] : $this->getContext($context, "download_uri")), "html", null, true);
            echo "\" alt=\"\" /></a>
        ";
        }
        // line 27
        echo "        ";
        // line 30
        echo "    </div>
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        
        $__internal_cffec46e2a5adb26fd3e112b879616ec9a63967bfe6b2a11541dfc2ded29eaaa->leave($__internal_cffec46e2a5adb26fd3e112b879616ec9a63967bfe6b2a11541dfc2ded29eaaa_prof);

    }

    public function getTemplateName()
    {
        return "FOSUserBundle:Form:fields.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  111 => 30,  109 => 27,  101 => 25,  99 => 24,  96 => 23,  92 => 19,  89 => 18,  87 => 17,  81 => 16,  72 => 12,  64 => 10,  62 => 9,  59 => 8,  53 => 6,  51 => 5,  47 => 4,  44 => 3,  42 => 2,  36 => 1,  29 => 16,  26 => 15,  24 => 1,);
    }
}
