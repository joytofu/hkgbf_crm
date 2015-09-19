<?php

/* FOSUserBundle:Notice:notice_list.html.twig */
class __TwigTemplate_032ffe0b3cc75ed503aa402a6cc1aad287eecba32ebaef30d8fde1a922f8a523 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("FOSUserBundle::layout_admin.html.twig", "FOSUserBundle:Notice:notice_list.html.twig", 1);
        $this->blocks = array(
            'private_css' => array($this, 'block_private_css'),
            'hidden_username' => array($this, 'block_hidden_username'),
            'content' => array($this, 'block_content'),
            'page_header' => array($this, 'block_page_header'),
            'private_js' => array($this, 'block_private_js'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "FOSUserBundle::layout_admin.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_6d246ef6ef8a0dab4b7167c8e7763ac500eba3aa6a4f1bf947e5e2646725d03c = $this->env->getExtension("native_profiler");
        $__internal_6d246ef6ef8a0dab4b7167c8e7763ac500eba3aa6a4f1bf947e5e2646725d03c->enter($__internal_6d246ef6ef8a0dab4b7167c8e7763ac500eba3aa6a4f1bf947e5e2646725d03c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "FOSUserBundle:Notice:notice_list.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_6d246ef6ef8a0dab4b7167c8e7763ac500eba3aa6a4f1bf947e5e2646725d03c->leave($__internal_6d246ef6ef8a0dab4b7167c8e7763ac500eba3aa6a4f1bf947e5e2646725d03c_prof);

    }

    // line 2
    public function block_private_css($context, array $blocks = array())
    {
        $__internal_d525034c9ab76ecb9c8aaec3a3351f9d3c793a75f5898813298512ada89a67c4 = $this->env->getExtension("native_profiler");
        $__internal_d525034c9ab76ecb9c8aaec3a3351f9d3c793a75f5898813298512ada89a67c4->enter($__internal_d525034c9ab76ecb9c8aaec3a3351f9d3c793a75f5898813298512ada89a67c4_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "private_css"));

        // line 3
        echo "    <link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("js/dataTables/dataTables.bootstrap.css"), "html", null, true);
        echo "\">
    <script src=\"";
        // line 4
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("js/jQuery-2.1.4.min.js"), "html", null, true);
        echo "\"></script>
";
        
        $__internal_d525034c9ab76ecb9c8aaec3a3351f9d3c793a75f5898813298512ada89a67c4->leave($__internal_d525034c9ab76ecb9c8aaec3a3351f9d3c793a75f5898813298512ada89a67c4_prof);

    }

    // line 6
    public function block_hidden_username($context, array $blocks = array())
    {
        $__internal_5cc61291e99d205943b3c4c7f371c055d038cb0a69b205e3b55b29fa8d3f7f8f = $this->env->getExtension("native_profiler");
        $__internal_5cc61291e99d205943b3c4c7f371c055d038cb0a69b205e3b55b29fa8d3f7f8f->enter($__internal_5cc61291e99d205943b3c4c7f371c055d038cb0a69b205e3b55b29fa8d3f7f8f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "hidden_username"));

        echo twig_escape_filter($this->env, (isset($context["username"]) ? $context["username"] : $this->getContext($context, "username")), "html", null, true);
        
        $__internal_5cc61291e99d205943b3c4c7f371c055d038cb0a69b205e3b55b29fa8d3f7f8f->leave($__internal_5cc61291e99d205943b3c4c7f371c055d038cb0a69b205e3b55b29fa8d3f7f8f_prof);

    }

    // line 7
    public function block_content($context, array $blocks = array())
    {
        $__internal_bc470ea07147e9caea735172e86892dab37b9b4ea38f6998b2d97914a26dac62 = $this->env->getExtension("native_profiler");
        $__internal_bc470ea07147e9caea735172e86892dab37b9b4ea38f6998b2d97914a26dac62->enter($__internal_bc470ea07147e9caea735172e86892dab37b9b4ea38f6998b2d97914a26dac62_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        // line 8
        echo "    <div class=\"row\">
        <div class=\"col-xs-12\">
            <div class=\"box\">
                <div class=\"box-body\">
                    <table id=\"example1\" class=\"table table-bordered table-striped\">
                        <thead>
                        <tr>
                            <th>标题</th>
                            <th>创建时间</th>
                            <th>编辑</th>
                        </tr>
                        </thead>
                        <tbody>
                        ";
        // line 21
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")));
        foreach ($context['_seq'] as $context["_key"] => $context["notice"]) {
            // line 22
            echo "                            <tr>
                                <td><a href=\"";
            // line 23
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("editnotice", array("id" => $this->getAttribute($context["notice"], "id", array()))), "html", null, true);
            echo "\" target=\"_blank\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["notice"], "title", array()), "html", null, true);
            echo "</a></td>
                                <td>";
            // line 24
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["notice"], "createdAt", array()), "Y-m-d | H:m:s"), "html", null, true);
            echo "</td>
                                <td><a href=\"javascript:void(0)\" onclick=\"deletenotice(";
            // line 25
            echo twig_escape_filter($this->env, $this->getAttribute($context["notice"], "id", array()), "html", null, true);
            echo ")\"><button class=\"btn bg-red\">删除</button></a></td>
                            </tr>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['notice'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 28
        echo "                        </tbody>
                    </table>
                    <a href=\"";
        // line 30
        echo $this->env->getExtension('routing')->getPath("createnotice");
        echo "\"><button class=\"btn btn-primary btn-flat\">新通知</button></a>
                </div><!-- /.box-body -->
            </div>
        </div>
    </div>
";
        
        $__internal_bc470ea07147e9caea735172e86892dab37b9b4ea38f6998b2d97914a26dac62->leave($__internal_bc470ea07147e9caea735172e86892dab37b9b4ea38f6998b2d97914a26dac62_prof);

    }

    // line 36
    public function block_page_header($context, array $blocks = array())
    {
        $__internal_e8c9a3f7aa2b9be28f1f68bc8bd113a753013fdea41596377087a952e3d80514 = $this->env->getExtension("native_profiler");
        $__internal_e8c9a3f7aa2b9be28f1f68bc8bd113a753013fdea41596377087a952e3d80514->enter($__internal_e8c9a3f7aa2b9be28f1f68bc8bd113a753013fdea41596377087a952e3d80514_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "page_header"));

        echo "公告通知";
        
        $__internal_e8c9a3f7aa2b9be28f1f68bc8bd113a753013fdea41596377087a952e3d80514->leave($__internal_e8c9a3f7aa2b9be28f1f68bc8bd113a753013fdea41596377087a952e3d80514_prof);

    }

    // line 37
    public function block_private_js($context, array $blocks = array())
    {
        $__internal_00e862e212b5010b4085cbc772c92937102a4e72f1585e7a2cc79ba8ddfa514b = $this->env->getExtension("native_profiler");
        $__internal_00e862e212b5010b4085cbc772c92937102a4e72f1585e7a2cc79ba8ddfa514b->enter($__internal_00e862e212b5010b4085cbc772c92937102a4e72f1585e7a2cc79ba8ddfa514b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "private_js"));

        // line 38
        echo "    <!--DataTables-->
    <script src=\"";
        // line 39
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("js/dataTables/jquery.dataTables.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 40
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("js/dataTables/dataTables.bootstrap.min.js"), "html", null, true);
        echo "\"></script>
    <!--SlimScroll-->
    <script src=\"";
        // line 42
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("js/slimScroll/jquery.slimscroll.min.js"), "html", null, true);
        echo "\"></script>
    <!--FastClick-->
    <script src=\"";
        // line 44
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("js/fastclick/fastclick.min.js"), "html", null, true);
        echo "\"></script>

    <script src=\"";
        // line 46
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("js/demo.js"), "html", null, true);
        echo "\"></script>
    <script>
        \$(function () {
            \$(\"#example1\").DataTable({
                \"order\":[[1,\"desc\"]]
            });
            \$('#example2').DataTable({
                \"paging\": true,
                \"lengthChange\": true,
                \"searching\": true,
                \"ordering\": false,
                \"info\": true,
                \"autoWidth\": false
            });
        });
    </script>
    <script>
        function deletenotice(id){
            if(confirm('你确定删除该通知吗?')){
                window.location.href=";
        // line 65
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "baseurl", array()), "html", null, true);
        echo "\"/admin/deletenotice/\"+id;
            }
        }
    </script>

";
        
        $__internal_00e862e212b5010b4085cbc772c92937102a4e72f1585e7a2cc79ba8ddfa514b->leave($__internal_00e862e212b5010b4085cbc772c92937102a4e72f1585e7a2cc79ba8ddfa514b_prof);

    }

    public function getTemplateName()
    {
        return "FOSUserBundle:Notice:notice_list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  196 => 65,  174 => 46,  169 => 44,  164 => 42,  159 => 40,  155 => 39,  152 => 38,  146 => 37,  134 => 36,  121 => 30,  117 => 28,  108 => 25,  104 => 24,  98 => 23,  95 => 22,  91 => 21,  76 => 8,  70 => 7,  58 => 6,  49 => 4,  44 => 3,  38 => 2,  11 => 1,);
    }
}
