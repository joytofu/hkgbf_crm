<?php

/* FOSUserBundle:Clients:group.html.twig */
class __TwigTemplate_a941dfd59e39938a80070389089d0071df95730a1710152c8b9e6c61e37eb8af extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("FOSUserBundle::layout_admin.html.twig", "FOSUserBundle:Clients:group.html.twig", 1);
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
        $__internal_ea517df9039d98fcd05e131fb92c4456cfbf08e394054e424b3b44784bab5532 = $this->env->getExtension("native_profiler");
        $__internal_ea517df9039d98fcd05e131fb92c4456cfbf08e394054e424b3b44784bab5532->enter($__internal_ea517df9039d98fcd05e131fb92c4456cfbf08e394054e424b3b44784bab5532_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "FOSUserBundle:Clients:group.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_ea517df9039d98fcd05e131fb92c4456cfbf08e394054e424b3b44784bab5532->leave($__internal_ea517df9039d98fcd05e131fb92c4456cfbf08e394054e424b3b44784bab5532_prof);

    }

    // line 2
    public function block_private_css($context, array $blocks = array())
    {
        $__internal_ceffa37253fe2041389000152f07e6da74a9680bcaf38f000277c1a463022b8e = $this->env->getExtension("native_profiler");
        $__internal_ceffa37253fe2041389000152f07e6da74a9680bcaf38f000277c1a463022b8e->enter($__internal_ceffa37253fe2041389000152f07e6da74a9680bcaf38f000277c1a463022b8e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "private_css"));

        // line 3
        echo "    <link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("js/dataTables/dataTables.bootstrap.css"), "html", null, true);
        echo "\">
";
        
        $__internal_ceffa37253fe2041389000152f07e6da74a9680bcaf38f000277c1a463022b8e->leave($__internal_ceffa37253fe2041389000152f07e6da74a9680bcaf38f000277c1a463022b8e_prof);

    }

    // line 5
    public function block_page_header($context, array $blocks = array())
    {
        $__internal_62c720649ee1c796f1bbce2a2d96b05e7cc086db936031795f7d44d4a5e6b8ba = $this->env->getExtension("native_profiler");
        $__internal_62c720649ee1c796f1bbce2a2d96b05e7cc086db936031795f7d44d4a5e6b8ba->enter($__internal_62c720649ee1c796f1bbce2a2d96b05e7cc086db936031795f7d44d4a5e6b8ba_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "page_header"));

        echo "用户分组";
        
        $__internal_62c720649ee1c796f1bbce2a2d96b05e7cc086db936031795f7d44d4a5e6b8ba->leave($__internal_62c720649ee1c796f1bbce2a2d96b05e7cc086db936031795f7d44d4a5e6b8ba_prof);

    }

    // line 6
    public function block_content($context, array $blocks = array())
    {
        $__internal_9187558084b028398d1712697f8b5c85c97c841209ccb5062e201c257fdd8e2f = $this->env->getExtension("native_profiler");
        $__internal_9187558084b028398d1712697f8b5c85c97c841209ccb5062e201c257fdd8e2f->enter($__internal_9187558084b028398d1712697f8b5c85c97c841209ccb5062e201c257fdd8e2f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        // line 7
        echo "    <div class=\"row\">
        <div class=\"col-md-7\" style=\"margin-left: 20%\">
            <!-- Custom Tabs -->
            <div class=\"nav-tabs-custom\">
                <ul class=\"nav nav-tabs\">
                    <li class=\"active\"><a href=\"#tab_1\" data-toggle=\"tab\">普通会员</a></li>
                    <li><a href=\"#tab_2\" data-toggle=\"tab\" style=\"color:#f39c12\">金卡会员</a></li>
                    <li><a href=\"#tab_3\" data-toggle=\"tab\" style=\"color:#c7254e\">钻石会员</a></li>
                    <li><a href=\"#tab_4\" data-toggle=\"tab\" style=\"color:darkblue\">渠道代理</a></li>
                </ul>
                <div class=\"tab-content\">
                    <div class=\"tab-pane active\" id=\"tab_1\">
                        <div class=\"box-body\">
                            <table id=\"products_list1\" class=\"table table-bordered table-striped\">
                                <thead>
                                <tr>
                                    <th>用户名</th>
                                    <th>姓名</th>
                                    <th>所属代理</th>
                                    <th>修改会员级别</th>
                                    <th>修改会员信息</th>
                                </tr>
                                </thead>
                                ";
        // line 30
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["regular"]) ? $context["regular"] : $this->getContext($context, "regular")));
        foreach ($context['_seq'] as $context["_key"] => $context["content"]) {
            // line 31
            echo "                                    <tr>
                                        <td>";
            // line 32
            echo twig_escape_filter($this->env, $context["content"], "html", null, true);
            echo "</td>
                                        <td>";
            // line 33
            echo twig_escape_filter($this->env, $this->getAttribute($context["content"], "name", array()), "html", null, true);
            echo "</td>
                                        <td>
                                            ";
            // line 35
            if (($this->getAttribute($context["content"], "invitation", array()) == "24bb2a5a71")) {
                echo "agent001
                                            ";
            } elseif (($this->getAttribute(            // line 36
$context["content"], "invitation", array()) == "ea9834405a")) {
                echo "agent002
                                            ";
            } elseif (($this->getAttribute(            // line 37
$context["content"], "invitation", array()) == "c355eca4e1")) {
                echo "agent003
                                            ";
            } else {
                // line 38
                echo "无";
            }
            // line 39
            echo "                                        </td>
                                        <td>
                                            <div class=\"btn-group\">
                                            <button type=\"button\" class=\"dropdown-toggle btn btn-vk\" data-toggle=\"dropdown\">
                                                设置会员级别<b class=\"caret\"></b>
                                            </button>
                                            <ul class=\"dropdown-menu\" role=\"menu\">
                                                <li><a href=\"";
            // line 46
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("modify_role", array("id" => $this->getAttribute($context["content"], "id", array()), "role" => "ROLE_GOLDEN")), "html", null, true);
            echo "\">设为金卡会员</a></li>
                                                <li><a href=\"";
            // line 47
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("modify_role", array("id" => $this->getAttribute($context["content"], "id", array()), "role" => "ROLE_DIAMOND")), "html", null, true);
            echo "\">设为钻石会员</a></li>
                                            </ul>
                                            </div>
                                        </td>
                                        <td>
                                            <a href=\"";
            // line 52
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("edituserprofile", array("id" => $this->getAttribute($context["content"], "id", array()))), "html", null, true);
            echo "\"><button class=\"btn btn-primary\">修改用户信息</button></a>
                                            <a href=\"javascript:void(0)\" onclick=\"deleteuser(";
            // line 53
            echo twig_escape_filter($this->env, $this->getAttribute($context["content"], "id", array()), "html", null, true);
            echo ")\"><button class=\"btn btn-pinterest\">删除用户</button></a>

                                        </td>
                                    </tr>
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['content'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 58
        echo "                            </table>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                    <div class=\"tab-pane\" id=\"tab_2\">
                        <div class=\"box-body\">
                            <table id=\"products_list2\" class=\"table table-bordered table-striped\">
                                <thead>
                                <tr>
                                    <th>用户名</th>
                                    <th>姓名</th>
                                    <th>所属代理</th>
                                    <th>修改会员级别</th>
                                    <th>修改会员信息</th>
                                </tr>
                                </thead>
                                ";
        // line 73
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["golden"]) ? $context["golden"] : $this->getContext($context, "golden")));
        foreach ($context['_seq'] as $context["_key"] => $context["content"]) {
            // line 74
            echo "                                    <tr>
                                        <td>";
            // line 75
            echo twig_escape_filter($this->env, $context["content"], "html", null, true);
            echo "</td>
                                        <td>";
            // line 76
            echo twig_escape_filter($this->env, $this->getAttribute($context["content"], "name", array()), "html", null, true);
            echo "</td>
                                        <td>
                                            ";
            // line 78
            if (($this->getAttribute($context["content"], "invitation", array()) == "24bb2a5a71")) {
                echo "agent001
                                            ";
            } elseif (($this->getAttribute(            // line 79
$context["content"], "invitation", array()) == "ea9834405a")) {
                echo "agent002
                                            ";
            } elseif (($this->getAttribute(            // line 80
$context["content"], "invitation", array()) == "c355eca4e1")) {
                echo "agent003
                                            ";
            } else {
                // line 81
                echo "无";
            }
            // line 82
            echo "                                        </td>
                                        <td>
                                            <div class=\"btn-group\">
                                                <button type=\"button\" class=\"dropdown-toggle btn btn-vk\" data-toggle=\"dropdown\">
                                                    设置会员级别<b class=\"caret\"></b>
                                                </button>
                                            <ul class=\"dropdown-menu\" role=\"menu\">
                                                <li><a href=\"";
            // line 89
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("modify_role", array("id" => $this->getAttribute($context["content"], "id", array()), "role" => "ROLE_REGULAR")), "html", null, true);
            echo "\">设为普通会员</a></li>
                                                <li><a href=\"";
            // line 90
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("modify_role", array("id" => $this->getAttribute($context["content"], "id", array()), "role" => "ROLE_DIAMOND")), "html", null, true);
            echo "\">设为钻石会员</a></li>
                                            </ul>
                                            </div>
                                        </td>
                                        <td>
                                            <a href=\"";
            // line 95
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("edituserprofile", array("id" => $this->getAttribute($context["content"], "id", array()))), "html", null, true);
            echo "\"><button class=\"btn btn-primary\">修改用户信息</button></a>
                                            <a href=\"javascript:void(0)\" onclick=\"deleteuser(";
            // line 96
            echo twig_escape_filter($this->env, $this->getAttribute($context["content"], "id", array()), "html", null, true);
            echo ")\"><button class=\"btn btn-pinterest\">删除用户</button></a>
                                        </td>
                                    </tr>
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['content'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 100
        echo "                            </table>
                        </div>
                    </div><!-- /.tab-pane -->
                    <div class=\"tab-pane\" id=\"tab_3\">
                        <div class=\"box-body\">
                            <table id=\"products_list3\" class=\"table table-bordered table-striped\">
                                <thead>
                                <tr>
                                    <th>用户名</th>
                                    <th>姓名</th>
                                    <th>所属代理</th>
                                    <th>修改会员级别</th>
                                    <th>修改会员信息</th>
                                </tr>
                                </thead>
                                ";
        // line 115
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["diamond"]) ? $context["diamond"] : $this->getContext($context, "diamond")));
        foreach ($context['_seq'] as $context["_key"] => $context["content"]) {
            // line 116
            echo "                                    <tr>
                                        <td>";
            // line 117
            echo twig_escape_filter($this->env, $context["content"], "html", null, true);
            echo "</td>
                                        <td>";
            // line 118
            echo twig_escape_filter($this->env, $this->getAttribute($context["content"], "name", array()), "html", null, true);
            echo "</td>
                                        <td>
                                            ";
            // line 120
            if (($this->getAttribute($context["content"], "invitation", array()) == "24bb2a5a71")) {
                echo "agent001
                                            ";
            } elseif (($this->getAttribute(            // line 121
$context["content"], "invitation", array()) == "ea9834405a")) {
                echo "agent002
                                            ";
            } elseif (($this->getAttribute(            // line 122
$context["content"], "invitation", array()) == "c355eca4e1")) {
                echo "agent003
                                            ";
            } else {
                // line 123
                echo "无";
            }
            // line 124
            echo "                                        </td>
                                        <td>
                                            <div class=\"btn-group\">
                                            <button type=\"button\" class=\"dropdown-toggle btn btn-vk\" data-toggle=\"dropdown\">
                                                设置会员级别<b class=\"caret\"></b>
                                            </button>
                                            <ul class=\"dropdown-menu\" role=\"menu\">
                                                <li><a href=\"";
            // line 131
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("modify_role", array("id" => $this->getAttribute($context["content"], "id", array()), "role" => "ROLE_REGULAR")), "html", null, true);
            echo "\">设为普通会员</a></li>
                                                <li><a href=\"";
            // line 132
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("modify_role", array("id" => $this->getAttribute($context["content"], "id", array()), "role" => "ROLE_GOLDEN")), "html", null, true);
            echo "\">设为金卡会员</a></li>
                                            </ul>
                                                </div>
                                        </td>
                                        <td>
                                            <a href=\"";
            // line 137
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("edituserprofile", array("id" => $this->getAttribute($context["content"], "id", array()))), "html", null, true);
            echo "\"><button class=\"btn btn-primary\">修改用户信息</button></a>
                                            <a href=\"javascript:void(0)\" onclick=\"deleteuser(";
            // line 138
            echo twig_escape_filter($this->env, $this->getAttribute($context["content"], "id", array()), "html", null, true);
            echo ")\"><button class=\"btn btn-pinterest\">删除用户</button></a>
                                        </td>
                                    </tr>
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['content'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 142
        echo "                            </table>
                        </div>
                    </div><!-- /.tab-pane -->
                    <div class=\"tab-pane\" id=\"tab_4\">
                        <div class=\"box-body\">
                            <table id=\"products_list4\" class=\"table table-bordered table-striped\">
                                <thead>
                                <tr>
                                    <th>用户名</th>
                                    <th>姓名</th>
                                    <th>修改会员信息</th>
                                </tr>
                                </thead>
                                ";
        // line 155
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["agent"]) ? $context["agent"] : $this->getContext($context, "agent")));
        foreach ($context['_seq'] as $context["_key"] => $context["content"]) {
            // line 156
            echo "                                    <tr>
                                        <td>";
            // line 157
            echo twig_escape_filter($this->env, $context["content"], "html", null, true);
            echo "</td>
                                        <td>";
            // line 158
            echo twig_escape_filter($this->env, $this->getAttribute($context["content"], "name", array()), "html", null, true);
            echo "</td>
                                        <td>
                                            <a href=\"";
            // line 160
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("edituserprofile", array("id" => $this->getAttribute($context["content"], "id", array()))), "html", null, true);
            echo "\"><button class=\"btn btn-primary\">修改代理信息</button></a>
                                            <a href=\"javascript:void(0)\" onclick=\"deleteuser(";
            // line 161
            echo twig_escape_filter($this->env, $this->getAttribute($context["content"], "id", array()), "html", null, true);
            echo ")\"><button class=\"btn btn-pinterest\">删除用户</button></a>
                                        </td>
                                    </tr>
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['content'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 165
        echo "                            </table>
                        </div>
                    </div><!-- /.tab-pane -->
                </div><!-- /.tab-content -->
            </div><!-- nav-tabs-custom -->
        </div>
    </div>
";
        
        $__internal_9187558084b028398d1712697f8b5c85c97c841209ccb5062e201c257fdd8e2f->leave($__internal_9187558084b028398d1712697f8b5c85c97c841209ccb5062e201c257fdd8e2f_prof);

    }

    // line 174
    public function block_private_js($context, array $blocks = array())
    {
        $__internal_fe96037732ecb9f4aab8c019b06cc0e4cc59bab3a558d082772b7d34b3f7b836 = $this->env->getExtension("native_profiler");
        $__internal_fe96037732ecb9f4aab8c019b06cc0e4cc59bab3a558d082772b7d34b3f7b836->enter($__internal_fe96037732ecb9f4aab8c019b06cc0e4cc59bab3a558d082772b7d34b3f7b836_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "private_js"));

        // line 175
        echo "    <!--DataTables-->
    <script src=\"";
        // line 176
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("js/dataTables/jquery.dataTables.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 177
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("js/dataTables/dataTables.bootstrap.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 178
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("js/slimScroll/jquery.slimscroll.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 179
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("js/fastclick/fastclick.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 180
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("js/demo.js"), "html", null, true);
        echo "\"></script>
    <script>
        \$(function () {
            \$(\"#products_list1\").DataTable();
            \$('#products_list2').DataTable({
                \"paging\": true,
                \"lengthChange\": true,
                \"searching\": true,
                \"ordering\": true,
                \"info\": true,
                \"autoWidth\": true
            });
            \$('#products_list3').DataTable();
            \$('#products_list4').DataTable();
        });
    </script>
    <script>
        function deletestock(id){
            if(confirm('你确定删除该股票信息吗？')){
                window.location.href=";
        // line 199
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "baseurl", array()), "html", null, true);
        echo "\"/admin/delete_stock_2/\"+id;
            }
        }

        function deleteinsurance(id){
            if(confirm('你确定删除该保险信息吗？')){
                window.location.href=";
        // line 205
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "baseurl", array()), "html", null, true);
        echo "\"/admin/delete_insurance_2/\"+id;
            }
        }

        function deleteuser(id){
            if(confirm('你确定删除该用户吗？')){
                window.location.href=";
        // line 211
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "baseurl", array()), "html", null, true);
        echo "\"/admin/delete_user/\"+id;
            }
        }

    </script>
";
        
        $__internal_fe96037732ecb9f4aab8c019b06cc0e4cc59bab3a558d082772b7d34b3f7b836->leave($__internal_fe96037732ecb9f4aab8c019b06cc0e4cc59bab3a558d082772b7d34b3f7b836_prof);

    }

    public function getTemplateName()
    {
        return "FOSUserBundle:Clients:group.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  456 => 211,  447 => 205,  438 => 199,  416 => 180,  412 => 179,  408 => 178,  404 => 177,  400 => 176,  397 => 175,  391 => 174,  377 => 165,  367 => 161,  363 => 160,  358 => 158,  354 => 157,  351 => 156,  347 => 155,  332 => 142,  322 => 138,  318 => 137,  310 => 132,  306 => 131,  297 => 124,  294 => 123,  289 => 122,  285 => 121,  281 => 120,  276 => 118,  272 => 117,  269 => 116,  265 => 115,  248 => 100,  238 => 96,  234 => 95,  226 => 90,  222 => 89,  213 => 82,  210 => 81,  205 => 80,  201 => 79,  197 => 78,  192 => 76,  188 => 75,  185 => 74,  181 => 73,  164 => 58,  153 => 53,  149 => 52,  141 => 47,  137 => 46,  128 => 39,  125 => 38,  120 => 37,  116 => 36,  112 => 35,  107 => 33,  103 => 32,  100 => 31,  96 => 30,  71 => 7,  65 => 6,  53 => 5,  43 => 3,  37 => 2,  11 => 1,);
    }
}
