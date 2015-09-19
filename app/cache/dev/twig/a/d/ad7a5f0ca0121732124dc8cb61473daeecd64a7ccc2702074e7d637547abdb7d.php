<?php

/* FOSUserBundle:Notice:notice.html.twig */
class __TwigTemplate_ad7a5f0ca0121732124dc8cb61473daeecd64a7ccc2702074e7d637547abdb7d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("FOSUserBundle::layout_admin.html.twig", "FOSUserBundle:Notice:notice.html.twig", 1);
        $this->blocks = array(
            'private_css' => array($this, 'block_private_css'),
            'page_header' => array($this, 'block_page_header'),
            'content' => array($this, 'block_content'),
            'private_js' => array($this, 'block_private_js'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "FOSUserBundle::layout_admin.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_d22208e6bded06f0998df70f865f06174cd80d7da06f6f50ef49189182548521 = $this->env->getExtension("native_profiler");
        $__internal_d22208e6bded06f0998df70f865f06174cd80d7da06f6f50ef49189182548521->enter($__internal_d22208e6bded06f0998df70f865f06174cd80d7da06f6f50ef49189182548521_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "FOSUserBundle:Notice:notice.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_d22208e6bded06f0998df70f865f06174cd80d7da06f6f50ef49189182548521->leave($__internal_d22208e6bded06f0998df70f865f06174cd80d7da06f6f50ef49189182548521_prof);

    }

    // line 2
    public function block_private_css($context, array $blocks = array())
    {
        $__internal_cfd7dac00c2c153afa56a3d88ca0a5207d2b31130cc13c3453dd4f052e1f86dc = $this->env->getExtension("native_profiler");
        $__internal_cfd7dac00c2c153afa56a3d88ca0a5207d2b31130cc13c3453dd4f052e1f86dc->enter($__internal_cfd7dac00c2c153afa56a3d88ca0a5207d2b31130cc13c3453dd4f052e1f86dc_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "private_css"));

        // line 3
        echo "   <link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("css/boostrap-wysihtml5/bootstrap3-wysihtml5.min.css"), "html", null, true);
        echo "\">
";
        
        $__internal_cfd7dac00c2c153afa56a3d88ca0a5207d2b31130cc13c3453dd4f052e1f86dc->leave($__internal_cfd7dac00c2c153afa56a3d88ca0a5207d2b31130cc13c3453dd4f052e1f86dc_prof);

    }

    // line 5
    public function block_page_header($context, array $blocks = array())
    {
        $__internal_d88daafe1ef767f97ab6a4d100072c0bacd97a083784bfe5428f02d94cefd7b7 = $this->env->getExtension("native_profiler");
        $__internal_d88daafe1ef767f97ab6a4d100072c0bacd97a083784bfe5428f02d94cefd7b7->enter($__internal_d88daafe1ef767f97ab6a4d100072c0bacd97a083784bfe5428f02d94cefd7b7_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "page_header"));

        echo "通知公告";
        
        $__internal_d88daafe1ef767f97ab6a4d100072c0bacd97a083784bfe5428f02d94cefd7b7->leave($__internal_d88daafe1ef767f97ab6a4d100072c0bacd97a083784bfe5428f02d94cefd7b7_prof);

    }

    // line 6
    public function block_content($context, array $blocks = array())
    {
        $__internal_cba673af5fe0189da00a4fd4ca88348492709ef6ad6e05942e3f5ca17c46853d = $this->env->getExtension("native_profiler");
        $__internal_cba673af5fe0189da00a4fd4ca88348492709ef6ad6e05942e3f5ca17c46853d->enter($__internal_cba673af5fe0189da00a4fd4ca88348492709ef6ad6e05942e3f5ca17c46853d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        // line 7
        echo "    <div class=\"row\">
        <div class=\"col-md-12\">
            <div class=\"box\">
                <div class=\"box-header\">
                    <!-- tools box -->
                    <div class=\"pull-right box-tools\">
                        <button class=\"btn btn-default btn-sm\" data-widget=\"collapse\" data-toggle=\"tooltip\" title=\"Collapse\"><i class=\"fa fa-minus\"></i></button>
                    </div><!-- /. tools -->
                </div><!-- /.box-header -->
                <div class=\"box-body pad\">
                    <form method=\"post\" action=\"";
        // line 17
        echo $this->env->getExtension('routing')->getPath("createnotice");
        echo "\">
                        <input type=\"text\" placeholder=\"请输入标题\" style=\"width:300px;height:35px\" class=\"form-group\" id=\"Notice_title\" name=\"Notice[title]\">
                        <textarea id=\"Notice_content\" name=\"Notice[content]\" class=\"textarea\" placeholder=\"请输入内容......\" style=\"width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;\"></textarea>
                        <button class=\"btn btn-instagram\" type=\"submit\">提交</button>
                        ";
        // line 21
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "_token", array()), 'widget');
        echo "
                    </form>
                </div>
            </div>

        </div>
    </div>

";
        
        $__internal_cba673af5fe0189da00a4fd4ca88348492709ef6ad6e05942e3f5ca17c46853d->leave($__internal_cba673af5fe0189da00a4fd4ca88348492709ef6ad6e05942e3f5ca17c46853d_prof);

    }

    // line 31
    public function block_private_js($context, array $blocks = array())
    {
        $__internal_5c874e67de3928f17b66bef875fa0291711ec160298bc073c399346f7ca95d2b = $this->env->getExtension("native_profiler");
        $__internal_5c874e67de3928f17b66bef875fa0291711ec160298bc073c399346f7ca95d2b->enter($__internal_5c874e67de3928f17b66bef875fa0291711ec160298bc073c399346f7ca95d2b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "private_js"));

        // line 32
        echo "    <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("js/fastclick/fastclick.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 33
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("js/app.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 34
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("js/demo.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 35
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("js/boostrap-wysihtml5/bootstrap3-wysihtml5.all.js"), "html", null, true);
        echo "\"></script>
    <script>
        \$(function () {
            //bootstrap WYSIHTML5 - text editor
            \$(\".textarea\").wysihtml5();
        });
    </script>



";
        
        $__internal_5c874e67de3928f17b66bef875fa0291711ec160298bc073c399346f7ca95d2b->leave($__internal_5c874e67de3928f17b66bef875fa0291711ec160298bc073c399346f7ca95d2b_prof);

    }

    public function getTemplateName()
    {
        return "FOSUserBundle:Notice:notice.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  125 => 35,  121 => 34,  117 => 33,  112 => 32,  106 => 31,  90 => 21,  83 => 17,  71 => 7,  65 => 6,  53 => 5,  43 => 3,  37 => 2,  11 => 1,);
    }
}
