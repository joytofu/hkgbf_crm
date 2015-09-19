<?php

/* FOSUserBundle:Clients:clientsList.html.twig */
class __TwigTemplate_f08d610f317d292cb7690368dbed5492b75206c1a60bcfbc5549307c695931e3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("FOSUserBundle::layout_admin.html.twig", "FOSUserBundle:Clients:clientsList.html.twig", 1);
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
        $__internal_6d2c85dc6215b4e5f516022920a052164a937eb9bf8376da6b83db8868288c17 = $this->env->getExtension("native_profiler");
        $__internal_6d2c85dc6215b4e5f516022920a052164a937eb9bf8376da6b83db8868288c17->enter($__internal_6d2c85dc6215b4e5f516022920a052164a937eb9bf8376da6b83db8868288c17_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "FOSUserBundle:Clients:clientsList.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_6d2c85dc6215b4e5f516022920a052164a937eb9bf8376da6b83db8868288c17->leave($__internal_6d2c85dc6215b4e5f516022920a052164a937eb9bf8376da6b83db8868288c17_prof);

    }

    // line 2
    public function block_private_css($context, array $blocks = array())
    {
        $__internal_6f5ca562212fb666088dd3f715a5699076bf7681e27ceee76cce895b2cc8e23f = $this->env->getExtension("native_profiler");
        $__internal_6f5ca562212fb666088dd3f715a5699076bf7681e27ceee76cce895b2cc8e23f->enter($__internal_6f5ca562212fb666088dd3f715a5699076bf7681e27ceee76cce895b2cc8e23f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "private_css"));

        // line 3
        echo "    <link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("js/dataTables/dataTables.bootstrap.css"), "html", null, true);
        echo "\">
    <script src=\"";
        // line 4
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("js/jQuery-2.1.4.min.js"), "html", null, true);
        echo "\"></script>
";
        
        $__internal_6f5ca562212fb666088dd3f715a5699076bf7681e27ceee76cce895b2cc8e23f->leave($__internal_6f5ca562212fb666088dd3f715a5699076bf7681e27ceee76cce895b2cc8e23f_prof);

    }

    // line 6
    public function block_hidden_username($context, array $blocks = array())
    {
        $__internal_110eb109d9e4899795523977b15d412d7350779b9018fb908d9bb1021b1de60f = $this->env->getExtension("native_profiler");
        $__internal_110eb109d9e4899795523977b15d412d7350779b9018fb908d9bb1021b1de60f->enter($__internal_110eb109d9e4899795523977b15d412d7350779b9018fb908d9bb1021b1de60f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "hidden_username"));

        echo twig_escape_filter($this->env, (isset($context["username"]) ? $context["username"] : $this->getContext($context, "username")), "html", null, true);
        
        $__internal_110eb109d9e4899795523977b15d412d7350779b9018fb908d9bb1021b1de60f->leave($__internal_110eb109d9e4899795523977b15d412d7350779b9018fb908d9bb1021b1de60f_prof);

    }

    // line 7
    public function block_content($context, array $blocks = array())
    {
        $__internal_64208b14383b33489f429ca9d19ad3f07db8b0d936c2e0a63a05e91c40fcbe9f = $this->env->getExtension("native_profiler");
        $__internal_64208b14383b33489f429ca9d19ad3f07db8b0d936c2e0a63a05e91c40fcbe9f->enter($__internal_64208b14383b33489f429ca9d19ad3f07db8b0d936c2e0a63a05e91c40fcbe9f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        // line 8
        echo "<div class=\"row\">
    <div class=\"col-xs-12\">
    <div class=\"box\">
        <div class=\"box-header\">
            <h3 class=\"box-title\">客户个人信息</h3>
        </div><!-- /.box-header -->
        <div class=\"box-body\">
            <table id=\"example1\" class=\"table table-bordered table-striped\">
                <thead>
                <tr>
                    <th>用户名</th>
                    <th>姓名</th>
                    <th>手机号码</th>
                    <th>电子邮件</th>
                    <th>公司名称</th>
                    <th>联系地址</th>
                    <th>会员级别</th>
                    <th>会员状态</th>

                </tr>
                </thead>
                <tbody>
                ";
        // line 30
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")));
        foreach ($context['_seq'] as $context["_key"] => $context["value"]) {
            // line 31
            echo "                <tr>
                    <td><a href=\"";
            // line 32
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("productdetail", array("id" => $this->getAttribute($context["value"], "id", array()))), "html", null, true);
            echo "\" target=\"_blank\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["value"], "username", array()), "html", null, true);
            echo "</a>
                        ";
            // line 33
            if ($this->env->getExtension('security')->isGranted("ROLE_SUPER_ADMIN")) {
                echo "|<a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("edituserprofile", array("id" => $this->getAttribute($context["value"], "id", array()))), "html", null, true);
                echo "\"><i class=\"fa fa-wrench\"></i></a>";
            }
            echo "</td>
                    <td>";
            // line 34
            echo twig_escape_filter($this->env, $this->getAttribute($context["value"], "name", array()), "html", null, true);
            echo "</td>
                    <td>";
            // line 35
            echo twig_escape_filter($this->env, $this->getAttribute($context["value"], "cellphone", array()), "html", null, true);
            echo "</td>
                    <td>";
            // line 36
            echo twig_escape_filter($this->env, $this->getAttribute($context["value"], "email", array()), "html", null, true);
            echo "</td>
                    <td>";
            // line 37
            echo twig_escape_filter($this->env, $this->getAttribute($context["value"], "company", array()), "html", null, true);
            echo "</td>
                    <td>";
            // line 38
            echo twig_escape_filter($this->env, $this->getAttribute($context["value"], "province", array()), "html", null, true);
            echo twig_escape_filter($this->env, $this->getAttribute($context["value"], "city", array()), "html", null, true);
            echo twig_escape_filter($this->env, $this->getAttribute($context["value"], "district", array()), "html", null, true);
            if ($this->getAttribute($context["value"], "address_detail", array(), "any", true, true)) {
                echo twig_escape_filter($this->env, $this->getAttribute($context["value"], "address_detail", array()), "html", null, true);
            }
            echo "</td>
                    <td>
                        ";
            // line 40
            if (($this->getAttribute($context["value"], "groupid", array()) == 1)) {
                echo "普通会员
                        ";
            } elseif (($this->getAttribute(            // line 41
$context["value"], "groupid", array()) == 2)) {
                echo "<b style=\"color:#f39c12\">金卡会员</b>
                            ";
            } elseif (($this->getAttribute(            // line 42
$context["value"], "groupid", array()) == 3)) {
                echo "<b style=\"color:#c7254e\">钻石会员</b>
                        ";
            } elseif (($this->getAttribute(            // line 43
$context["value"], "groupid", array()) == 4)) {
                echo "<b style=\"color:darkblue\">渠道代理</b>";
            }
            // line 44
            echo "                    </td>
                    <td>
                        ";
            // line 46
            if (($this->getAttribute($context["value"], "enabled", array()) == 1)) {
                // line 47
                echo "                        <span class=\"label label-success\">已审核</span>
                        ";
            } else {
                // line 49
                echo "                        <button id=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["value"], "id", array()), "html", null, true);
                echo "\" value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["value"], "id", array()), "html", null, true);
                echo "\" class=\"btn btn-warning\" style=\"padding: 1px 5px;font-size:13px\"><b>未审核</b></button>
                            <script>
                                \$(document).ready(function(){
                                    \$(\"#";
                // line 52
                echo twig_escape_filter($this->env, $this->getAttribute($context["value"], "id", array()), "html", null, true);
                echo "\").click(function(){
                                        \$.ajax({
                                            type:\"POST\",
                                            url:\"/admin/setenabled/\"+\$(\"#";
                // line 55
                echo twig_escape_filter($this->env, $this->getAttribute($context["value"], "id", array()), "html", null, true);
                echo "\").val(),
                                            success:function(data){
                                                var \$verified = \"<span class='label label-success'>已审核</span>\";
                                                    \$(\"#";
                // line 58
                echo twig_escape_filter($this->env, $this->getAttribute($context["value"], "id", array()), "html", null, true);
                echo "\").replaceWith(\$verified);

                                             }
                                        });
                                    });
                                });
                            </script>
                        ";
            }
            // line 66
            echo "                    </td>
                </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['value'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 69
        echo "                </tbody>
            </table>
        </div><!-- /.box-body -->
    </div>
    </div>
    </div>
";
        
        $__internal_64208b14383b33489f429ca9d19ad3f07db8b0d936c2e0a63a05e91c40fcbe9f->leave($__internal_64208b14383b33489f429ca9d19ad3f07db8b0d936c2e0a63a05e91c40fcbe9f_prof);

    }

    // line 76
    public function block_page_header($context, array $blocks = array())
    {
        $__internal_4bda643c9e785157269babf62c6c21112996da66fb1377a2b7bc3f8bab0f5458 = $this->env->getExtension("native_profiler");
        $__internal_4bda643c9e785157269babf62c6c21112996da66fb1377a2b7bc3f8bab0f5458->enter($__internal_4bda643c9e785157269babf62c6c21112996da66fb1377a2b7bc3f8bab0f5458_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "page_header"));

        if ($this->env->getExtension('security')->isGranted("ROLE_SUPER_ADMIN")) {
            echo "所有用户";
        } else {
            echo "我的客户";
        }
        
        $__internal_4bda643c9e785157269babf62c6c21112996da66fb1377a2b7bc3f8bab0f5458->leave($__internal_4bda643c9e785157269babf62c6c21112996da66fb1377a2b7bc3f8bab0f5458_prof);

    }

    // line 77
    public function block_private_js($context, array $blocks = array())
    {
        $__internal_e3513f9736201d53b84ce72938de1c2af52fb5d7f393caf7e82f0227d72c22df = $this->env->getExtension("native_profiler");
        $__internal_e3513f9736201d53b84ce72938de1c2af52fb5d7f393caf7e82f0227d72c22df->enter($__internal_e3513f9736201d53b84ce72938de1c2af52fb5d7f393caf7e82f0227d72c22df_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "private_js"));

        // line 78
        echo "    <!--DataTables-->
    <script src=\"";
        // line 79
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("js/dataTables/jquery.dataTables.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 80
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("js/dataTables/dataTables.bootstrap.min.js"), "html", null, true);
        echo "\"></script>
    <!--SlimScroll-->
    <script src=\"";
        // line 82
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("js/slimScroll/jquery.slimscroll.min.js"), "html", null, true);
        echo "\"></script>
    <!--FastClick-->
    <script src=\"";
        // line 84
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("js/fastclick/fastclick.min.js"), "html", null, true);
        echo "\"></script>

    <script src=\"";
        // line 86
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("js/demo.js"), "html", null, true);
        echo "\"></script>
    <script>
        \$(function () {
            \$(\"#example1\").DataTable();
            \$('#example2').DataTable({
                \"paging\": true,
                \"lengthChange\": false,
                \"searching\": false,
                \"ordering\": true,
                \"info\": true,
                \"autoWidth\": false
            });
        });
    </script>

";
        
        $__internal_e3513f9736201d53b84ce72938de1c2af52fb5d7f393caf7e82f0227d72c22df->leave($__internal_e3513f9736201d53b84ce72938de1c2af52fb5d7f393caf7e82f0227d72c22df_prof);

    }

    public function getTemplateName()
    {
        return "FOSUserBundle:Clients:clientsList.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  270 => 86,  265 => 84,  260 => 82,  255 => 80,  251 => 79,  248 => 78,  242 => 77,  226 => 76,  213 => 69,  205 => 66,  194 => 58,  188 => 55,  182 => 52,  173 => 49,  169 => 47,  167 => 46,  163 => 44,  159 => 43,  155 => 42,  151 => 41,  147 => 40,  137 => 38,  133 => 37,  129 => 36,  125 => 35,  121 => 34,  113 => 33,  107 => 32,  104 => 31,  100 => 30,  76 => 8,  70 => 7,  58 => 6,  49 => 4,  44 => 3,  38 => 2,  11 => 1,);
    }
}
