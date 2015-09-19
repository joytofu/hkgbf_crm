<?php

/* TwigBundle:Exception:traces.txt.twig */
class __TwigTemplate_25818cbd8a42b929785ab54887fcf74810256f1dc9abc314ef062b83db10f75e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_c6ce3dd45f7df37b3a045a3a2a8074c6443b9353aa3f36f34a6b0440e8f82608 = $this->env->getExtension("native_profiler");
        $__internal_c6ce3dd45f7df37b3a045a3a2a8074c6443b9353aa3f36f34a6b0440e8f82608->enter($__internal_c6ce3dd45f7df37b3a045a3a2a8074c6443b9353aa3f36f34a6b0440e8f82608_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:traces.txt.twig"));

        // line 1
        if (twig_length_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "trace", array()))) {
            // line 2
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "trace", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["trace"]) {
                // line 3
                $this->loadTemplate("TwigBundle:Exception:trace.txt.twig", "TwigBundle:Exception:traces.txt.twig", 3)->display(array("trace" => $context["trace"]));
                // line 4
                echo "
";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['trace'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        
        $__internal_c6ce3dd45f7df37b3a045a3a2a8074c6443b9353aa3f36f34a6b0440e8f82608->leave($__internal_c6ce3dd45f7df37b3a045a3a2a8074c6443b9353aa3f36f34a6b0440e8f82608_prof);

    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:traces.txt.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  30 => 4,  28 => 3,  24 => 2,  22 => 1,);
    }
}
