<?php

/* @FOSUser/Clients/edit_stock.html.twig */
class __TwigTemplate_94b5a6635db0fbefc5d0358d8a53884c6197b117c137669d5d1dcd459287ebde extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("FOSUserBundle::layout_admin.html.twig", "@FOSUser/Clients/edit_stock.html.twig", 1);
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
        $__internal_b8fe08a5cab0248075b53eac5d66b2cc4dc82407814594b6a720e98eb432fa7e = $this->env->getExtension("native_profiler");
        $__internal_b8fe08a5cab0248075b53eac5d66b2cc4dc82407814594b6a720e98eb432fa7e->enter($__internal_b8fe08a5cab0248075b53eac5d66b2cc4dc82407814594b6a720e98eb432fa7e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@FOSUser/Clients/edit_stock.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_b8fe08a5cab0248075b53eac5d66b2cc4dc82407814594b6a720e98eb432fa7e->leave($__internal_b8fe08a5cab0248075b53eac5d66b2cc4dc82407814594b6a720e98eb432fa7e_prof);

    }

    // line 2
    public function block_private_css($context, array $blocks = array())
    {
        $__internal_c1438f92f3f74e25284675bab1bcc52ea009702a983d2211c3073e76436ff212 = $this->env->getExtension("native_profiler");
        $__internal_c1438f92f3f74e25284675bab1bcc52ea009702a983d2211c3073e76436ff212->enter($__internal_c1438f92f3f74e25284675bab1bcc52ea009702a983d2211c3073e76436ff212_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "private_css"));

        // line 3
        echo "    <link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("js/dataTables/dataTables.bootstrap.css"), "html", null, true);
        echo "\">
";
        
        $__internal_c1438f92f3f74e25284675bab1bcc52ea009702a983d2211c3073e76436ff212->leave($__internal_c1438f92f3f74e25284675bab1bcc52ea009702a983d2211c3073e76436ff212_prof);

    }

    // line 5
    public function block_page_header($context, array $blocks = array())
    {
        $__internal_1cc39b675df16821b43688acea1e36f2c344e109241be57f05fb8657df0d0bc6 = $this->env->getExtension("native_profiler");
        $__internal_1cc39b675df16821b43688acea1e36f2c344e109241be57f05fb8657df0d0bc6->enter($__internal_1cc39b675df16821b43688acea1e36f2c344e109241be57f05fb8657df0d0bc6_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "page_header"));

        echo "修改客户股票信息";
        
        $__internal_1cc39b675df16821b43688acea1e36f2c344e109241be57f05fb8657df0d0bc6->leave($__internal_1cc39b675df16821b43688acea1e36f2c344e109241be57f05fb8657df0d0bc6_prof);

    }

    // line 6
    public function block_content($context, array $blocks = array())
    {
        $__internal_78ddf40cb441ed281d8286709afcb69ce84dd088f6e53049494d69aeb3532b2f = $this->env->getExtension("native_profiler");
        $__internal_78ddf40cb441ed281d8286709afcb69ce84dd088f6e53049494d69aeb3532b2f->enter($__internal_78ddf40cb441ed281d8286709afcb69ce84dd088f6e53049494d69aeb3532b2f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        // line 7
        echo "
    <div class=\"col-md-7\" style=\"margin-left: 19%\">
        
        <div class=\"box box-primary\">
            <div class=\"box-header with-border\">
                <h3 class=\"box-title\">输入客户股票产品信息</h3>
                <div class=\"pull-right\"><a href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("productdetail", array("id" => (isset($context["user_id"]) ? $context["user_id"] : $this->getContext($context, "user_id")))), "html", null, true);
        echo "\" class=\"text-muted\"><i class=\"fa fa-arrow-left\">返回股票列表</i></a></div>
            </div>
            <form role=\"form\" method=\"post\" action=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("editstock", array("id" => (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")))), "html", null, true);
        echo "\">
                <div class=\"box-body\">
                    <div class=\"form-group\">";
        // line 17
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'widget');
        echo "</div>
                </div>
                <div class=\"box-footer\">
                    <button class=\"btn btn-primary\" style=\"padding-top: 3px;font-size:14px\" type=\"submit\">提交</button>
                    ";
        // line 21
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'rest');
        echo "
                    ";
        // line 22
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_end');
        echo "

                    ";
        // line 24
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["delete_form"]) ? $context["delete_form"] : $this->getContext($context, "delete_form")), 'form_start', array("attr" => array("style" => "display:inline")));
        echo "
                    <button class=\"btn btn-danger\" type=\"submit\" style=\"padding-top: 3px;font-size:14px\">删除</button>
                    ";
        // line 26
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["delete_form"]) ? $context["delete_form"] : $this->getContext($context, "delete_form")), 'form_end');
        echo "

                </div>
            </form>

        </div>
    </div>
";
        
        $__internal_78ddf40cb441ed281d8286709afcb69ce84dd088f6e53049494d69aeb3532b2f->leave($__internal_78ddf40cb441ed281d8286709afcb69ce84dd088f6e53049494d69aeb3532b2f_prof);

    }

    // line 38
    public function block_private_js($context, array $blocks = array())
    {
        $__internal_f2ad44790e43877ce64275ea850166a1c60a80bed772dbf7fcacc540d62f7d35 = $this->env->getExtension("native_profiler");
        $__internal_f2ad44790e43877ce64275ea850166a1c60a80bed772dbf7fcacc540d62f7d35->enter($__internal_f2ad44790e43877ce64275ea850166a1c60a80bed772dbf7fcacc540d62f7d35_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "private_js"));

        // line 39
        echo "    <!--DataTables-->
    <script src=\"";
        // line 40
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("js/dataTables/jquery.dataTables.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 41
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("js/dataTables/dataTables.bootstrap.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 42
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("js/slimScroll/jquery.slimscroll.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 43
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("js/fastclick/fastclick.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 44
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("js/demo.js"), "html", null, true);
        echo "\"></script>
    <script>
        \$(function () {
            \$(\"#products_list1\").DataTable();
            \$('#products_list2').DataTable({
                \"paging\": true,
                \"lengthChange\": true,
                \"searching\": false,
                \"ordering\": true,
                \"info\": true,
                \"autoWidth\": false
            });
        });
    </script>
";
        
        $__internal_f2ad44790e43877ce64275ea850166a1c60a80bed772dbf7fcacc540d62f7d35->leave($__internal_f2ad44790e43877ce64275ea850166a1c60a80bed772dbf7fcacc540d62f7d35_prof);

    }

    public function getTemplateName()
    {
        return "@FOSUser/Clients/edit_stock.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  150 => 44,  146 => 43,  142 => 42,  138 => 41,  134 => 40,  131 => 39,  125 => 38,  110 => 26,  105 => 24,  100 => 22,  96 => 21,  89 => 17,  84 => 15,  79 => 13,  71 => 7,  65 => 6,  53 => 5,  43 => 3,  37 => 2,  11 => 1,);
    }
}
