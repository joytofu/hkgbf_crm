<?php

/* FOSUserBundle:Clients:products_detail.html.twig */
class __TwigTemplate_1997bf87ec98f3cd7aa818a80a061380fb935dce47ac01b0c13ee19c41ac2c42 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("FOSUserBundle::layout_admin.html.twig", "FOSUserBundle:Clients:products_detail.html.twig", 1);
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
        $__internal_d6fc544f72b679c63cb4e2b199c85e5da79fdcc71ded3464b647c75ea59c392f = $this->env->getExtension("native_profiler");
        $__internal_d6fc544f72b679c63cb4e2b199c85e5da79fdcc71ded3464b647c75ea59c392f->enter($__internal_d6fc544f72b679c63cb4e2b199c85e5da79fdcc71ded3464b647c75ea59c392f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "FOSUserBundle:Clients:products_detail.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_d6fc544f72b679c63cb4e2b199c85e5da79fdcc71ded3464b647c75ea59c392f->leave($__internal_d6fc544f72b679c63cb4e2b199c85e5da79fdcc71ded3464b647c75ea59c392f_prof);

    }

    // line 2
    public function block_private_css($context, array $blocks = array())
    {
        $__internal_076584a1a817aa9c03da55b3311cf291796e143862955fa1da6e869a23edb384 = $this->env->getExtension("native_profiler");
        $__internal_076584a1a817aa9c03da55b3311cf291796e143862955fa1da6e869a23edb384->enter($__internal_076584a1a817aa9c03da55b3311cf291796e143862955fa1da6e869a23edb384_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "private_css"));

        // line 3
        echo "    <link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("js/dataTables/dataTables.bootstrap.css"), "html", null, true);
        echo "\">
";
        
        $__internal_076584a1a817aa9c03da55b3311cf291796e143862955fa1da6e869a23edb384->leave($__internal_076584a1a817aa9c03da55b3311cf291796e143862955fa1da6e869a23edb384_prof);

    }

    // line 5
    public function block_page_header($context, array $blocks = array())
    {
        $__internal_7ea5f4b540cd8e133abd0d47ddfc3fbac094af966c5b51d2417987bb05ae2d95 = $this->env->getExtension("native_profiler");
        $__internal_7ea5f4b540cd8e133abd0d47ddfc3fbac094af966c5b51d2417987bb05ae2d95->enter($__internal_7ea5f4b540cd8e133abd0d47ddfc3fbac094af966c5b51d2417987bb05ae2d95_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "page_header"));

        echo twig_escape_filter($this->env, (isset($context["username"]) ? $context["username"] : $this->getContext($context, "username")), "html", null, true);
        echo "购买产品详情";
        
        $__internal_7ea5f4b540cd8e133abd0d47ddfc3fbac094af966c5b51d2417987bb05ae2d95->leave($__internal_7ea5f4b540cd8e133abd0d47ddfc3fbac094af966c5b51d2417987bb05ae2d95_prof);

    }

    // line 6
    public function block_content($context, array $blocks = array())
    {
        $__internal_f623f11c363618aeab638b503902dbc794285715586a193cbabb37898c661499 = $this->env->getExtension("native_profiler");
        $__internal_f623f11c363618aeab638b503902dbc794285715586a193cbabb37898c661499->enter($__internal_f623f11c363618aeab638b503902dbc794285715586a193cbabb37898c661499_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        // line 7
        echo "    <div class=\"row\">
        <div class=\"col-md-12\">
            <!-- Custom Tabs -->
            <div class=\"nav-tabs-custom\">
                <ul class=\"nav nav-tabs\">
                    <li class=\"active\"><a href=\"#tab_1\" data-toggle=\"tab\">股票</a></li>
                    <li><a href=\"#tab_2\" data-toggle=\"tab\">保险</a></li>
                    <li><a href=\"#tab_3\" data-toggle=\"tab\">环球基金</a></li>
                    <li class=\"dropdown\">
                        <a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\">
                            产品资料上传 <span class=\"caret\"></span>
                        </a>
                        <ul class=\"dropdown-menu\">
                            <li role=\"presentation\">
                                ";
        // line 21
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["upload_form"]) ? $context["upload_form"] : $this->getContext($context, "upload_form")), 'form_start', array("attr" => array("style" => "margin-left:10px")));
        echo "
                                ";
        // line 22
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["upload_form"]) ? $context["upload_form"] : $this->getContext($context, "upload_form")), "productFile", array()), 'widget');
        echo "
                                <button type=\"submit\">提交</button>
                                ";
        // line 24
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["upload_form"]) ? $context["upload_form"] : $this->getContext($context, "upload_form")), 'form_end');
        echo "
                            </li>
                        </ul>
                    </li>
                    <li class=\"dropdown\">
                        <a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\">
                            添加产品信息 <span class=\"caret\"></span>
                        </a>
                        <ul class=\"dropdown-menu\">
                            <li role=\"presentation\"><a href=\"";
        // line 33
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("addstocks", array("id" => (isset($context["user_id"]) ? $context["user_id"] : $this->getContext($context, "user_id")))), "html", null, true);
        echo "\" role=\"menuitem\" tabindex=\"-1\">添加股票信息</a></li>
                            <li role=\"presentation\"><a href=\"";
        // line 34
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("addinsurance", array("id" => (isset($context["user_id"]) ? $context["user_id"] : $this->getContext($context, "user_id")))), "html", null, true);
        echo "\" role=\"menuitem\" tabindex=\"-1\">添加保险信息</a></li>
                            <li role=\"presentation\"><a href=\"#\" role=\"menuitem\" tabindex=\"-1\">添加基金信息</a></li>
                        </ul>
                    </li>
                    <li class=\"pull-right\"><a href=\"";
        // line 38
        echo $this->env->getExtension('routing')->getPath("clientslist");
        echo "\" class=\"text-muted\"><i class=\"fa fa-arrow-left\">返回客户列表</i></a></li>
                </ul>
                <div class=\"tab-content\">
                    <div class=\"tab-pane active\" id=\"tab_1\">
                        <div class=\"box-body\">
                            <table id=\"products_list1\" class=\"table table-bordered table-striped\">
                                <thead>
                                <tr>
                                    <th>持仓股票代码</th>
                                    <th>持仓股票名称</th>
                                    <th>购买日期</th>
                                    <th>持仓手数</th>
                                    <th>购买价格(元/股)</th>
                                    <th>当前价格(元/股)</th>
                                    <th>浮动盈亏(元)</th>
                                    <th>当前状态</th>
                                    ";
        // line 54
        if ($this->env->getExtension('security')->isGranted("ROLE_SUPER_ADMIN")) {
            // line 55
            echo "                                    <th>修改</th>
                                    ";
        }
        // line 57
        echo "
                                </tr>
                                </thead>
                                ";
        // line 60
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["stock_data"]) ? $context["stock_data"] : $this->getContext($context, "stock_data")));
        foreach ($context['_seq'] as $context["_key"] => $context["data"]) {
            // line 61
            echo "                                <tr>
                                    <td>";
            // line 62
            echo twig_escape_filter($this->env, $this->getAttribute($context["data"], "stockId", array()), "html", null, true);
            echo "</td>
                                    <td>";
            // line 63
            echo twig_escape_filter($this->env, $this->getAttribute($context["data"], "stockName", array()), "html", null, true);
            echo "</td>
                                    <td>";
            // line 64
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["data"], "buyDate", array()), "Y-m-d"), "html", null, true);
            echo "</td>
                                    <td>";
            // line 65
            echo twig_escape_filter($this->env, $this->getAttribute($context["data"], "position", array()), "html", null, true);
            echo "</td>
                                    <td>";
            // line 66
            echo twig_escape_filter($this->env, $this->getAttribute($context["data"], "buyingPrice", array()), "html", null, true);
            echo "</td>
                                    <td>";
            // line 67
            echo twig_escape_filter($this->env, $this->getAttribute($context["data"], "currentPrice", array()), "html", null, true);
            echo "</td>
                                    <td>";
            // line 68
            echo twig_escape_filter($this->env, $this->getAttribute($context["data"], "calculateProfitAndLoss", array(), "method"), "html", null, true);
            echo "</td>
                                    <td><span class=\"label label-success\">买入</span></td>
                                    ";
            // line 70
            if ($this->env->getExtension('security')->isGranted("ROLE_SUPER_ADMIN")) {
                // line 71
                echo "                                    <td>
                                        <a href=\"";
                // line 72
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("editstock", array("id" => $this->getAttribute($context["data"], "getId", array(), "method"))), "html", null, true);
                echo "\"><button class=\"btn btn-facebook\">编辑</button></a>
                                        <a href=\"javascript:void(0)\" onclick=\"deletestock(";
                // line 73
                echo twig_escape_filter($this->env, $this->getAttribute($context["data"], "getId", array(), "method"), "html", null, true);
                echo ")\"><button class=\"btn btn-adn\">删除</button></a>
                                    </td>
                                    ";
            }
            // line 76
            echo "                                </tr>
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['data'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 78
        echo "                                <thead><tr><th>合计盈亏:";
        echo twig_escape_filter($this->env, (isset($context["sum"]) ? $context["sum"] : $this->getContext($context, "sum")), "html", null, true);
        echo "元</th></tr></thead>

                            </table>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                    <div class=\"tab-pane\" id=\"tab_2\">
                        <div class=\"box-body\">
                            <table id=\"products_list2\" class=\"table table-bordered table-striped\">
                                <thead>
                                <tr>
                                    <th>保险名称</th>
                                    <th>保险类型</th>
                                    <th>购买日期</th>
                                    <th>投保人</th>
                                    <th>被保人</th>
                                    <th>保费(元)</th>
                                    <th>保额(元)</th>
                                    <th>投保年龄</th>
                                    <th>投保年限</th>
                                    <th>出生日期</th>
                                    <th>性别</th>
                                    <th>是否吸烟</th>
                                    <th>下次续费日期</th>
                                    ";
        // line 101
        if ($this->env->getExtension('security')->isGranted("ROLE_SUPER_ADMIN")) {
            // line 102
            echo "                                        <th>修改</th>
                                    ";
        }
        // line 104
        echo "
                                </tr>
                                </thead>
                                ";
        // line 107
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["insurance_data"]) ? $context["insurance_data"] : $this->getContext($context, "insurance_data")));
        foreach ($context['_seq'] as $context["_key"] => $context["data"]) {
            // line 108
            echo "                                    <tr>
                                        <td>";
            // line 109
            echo twig_escape_filter($this->env, $this->getAttribute($context["data"], "insuranceName", array()), "html", null, true);
            echo "</td>
                                        <td>";
            // line 110
            echo twig_escape_filter($this->env, $this->getAttribute($context["data"], "type", array()), "html", null, true);
            echo "</td>
                                        <td>";
            // line 111
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["data"], "buyDate", array()), "Y-m-d"), "html", null, true);
            echo "</td>
                                        <td>";
            // line 112
            echo twig_escape_filter($this->env, $this->getAttribute($context["data"], "PolicyHolder", array()), "html", null, true);
            echo "</td>
                                        <td>";
            // line 113
            echo twig_escape_filter($this->env, $this->getAttribute($context["data"], "Recognizee", array()), "html", null, true);
            echo "</td>
                                        <td>";
            // line 114
            echo twig_escape_filter($this->env, $this->getAttribute($context["data"], "insurancePremium", array()), "html", null, true);
            echo "</td>
                                        <td>";
            // line 115
            echo twig_escape_filter($this->env, $this->getAttribute($context["data"], "sumInsured", array()), "html", null, true);
            echo "</td>
                                        <td>";
            // line 116
            echo twig_escape_filter($this->env, $this->getAttribute($context["data"], "AgeAtIssue", array()), "html", null, true);
            echo "</td>
                                        <td>";
            // line 117
            echo twig_escape_filter($this->env, $this->getAttribute($context["data"], "Years", array()), "html", null, true);
            echo "</td>
                                        <td>";
            // line 118
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["data"], "BornDate", array()), "Y-m-d"), "html", null, true);
            echo "</td>
                                        <td>";
            // line 119
            echo twig_escape_filter($this->env, $this->getAttribute($context["data"], "gender", array()), "html", null, true);
            echo "</td>
                                        <td>";
            // line 120
            if (($this->getAttribute($context["data"], "isSmoking", array()) == 0)) {
                echo "否";
            } else {
                echo "是";
            }
            echo "</td>
                                        <td>";
            // line 121
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["data"], "NextPayDate", array()), "Y-m-d"), "html", null, true);
            echo "</td>

                                        ";
            // line 123
            if ($this->env->getExtension('security')->isGranted("ROLE_SUPER_ADMIN")) {
                // line 124
                echo "                                            <td>
                                                <a href=\"";
                // line 125
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("editinsurance", array("id" => $this->getAttribute($context["data"], "getId", array(), "method"))), "html", null, true);
                echo "\"><button class=\"btn btn-facebook\">编辑</button></a>
                                                <a href=\"javascript:void(0)\" onclick=\"deleteinsurance(";
                // line 126
                echo twig_escape_filter($this->env, $this->getAttribute($context["data"], "getId", array(), "method"), "html", null, true);
                echo ")\"><button class=\"btn btn-adn\">删除</button></a>
                                            </td>
                                        ";
            }
            // line 129
            echo "                                    </tr>
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['data'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 131
        echo "
                            </table>
                        </div>
                    </div><!-- /.tab-pane -->
                    <div class=\"tab-pane\" id=\"tab_3\">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                        when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                        It has survived not only five centuries, but also the leap into electronic typesetting,
                        remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
                        sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
                        like Aldus PageMaker including versions of Lorem Ipsum.
                    </div><!-- /.tab-pane -->
                </div><!-- /.tab-content -->
            </div><!-- nav-tabs-custom -->
        </div>
    </div>
";
        
        $__internal_f623f11c363618aeab638b503902dbc794285715586a193cbabb37898c661499->leave($__internal_f623f11c363618aeab638b503902dbc794285715586a193cbabb37898c661499_prof);

    }

    // line 150
    public function block_private_js($context, array $blocks = array())
    {
        $__internal_c3d6c0f0e128f811af156844fdf6f6fcebc793a26c2df065c12dce971085a5e0 = $this->env->getExtension("native_profiler");
        $__internal_c3d6c0f0e128f811af156844fdf6f6fcebc793a26c2df065c12dce971085a5e0->enter($__internal_c3d6c0f0e128f811af156844fdf6f6fcebc793a26c2df065c12dce971085a5e0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "private_js"));

        // line 151
        echo "    <!--DataTables-->
    <script src=\"";
        // line 152
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("js/dataTables/jquery.dataTables.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 153
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("js/dataTables/dataTables.bootstrap.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 154
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("js/slimScroll/jquery.slimscroll.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 155
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("js/fastclick/fastclick.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 156
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
        });
    </script>
    <script>
        function deletestock(id){
            if(confirm('你确定删除该股票信息吗？')){
                window.location.href=";
        // line 174
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "baseurl", array()), "html", null, true);
        echo "\"/admin/delete_stock_2/\"+id;
            }
        }

        function deleteinsurance(id){
            if(confirm('你确定删除该保险信息吗？')){
                window.location.href=";
        // line 180
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "baseurl", array()), "html", null, true);
        echo "\"/admin/delete_insurance_2/\"+id;
            }
        }

    </script>
";
        
        $__internal_c3d6c0f0e128f811af156844fdf6f6fcebc793a26c2df065c12dce971085a5e0->leave($__internal_c3d6c0f0e128f811af156844fdf6f6fcebc793a26c2df065c12dce971085a5e0_prof);

    }

    public function getTemplateName()
    {
        return "FOSUserBundle:Clients:products_detail.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  411 => 180,  402 => 174,  381 => 156,  377 => 155,  373 => 154,  369 => 153,  365 => 152,  362 => 151,  356 => 150,  332 => 131,  325 => 129,  319 => 126,  315 => 125,  312 => 124,  310 => 123,  305 => 121,  297 => 120,  293 => 119,  289 => 118,  285 => 117,  281 => 116,  277 => 115,  273 => 114,  269 => 113,  265 => 112,  261 => 111,  257 => 110,  253 => 109,  250 => 108,  246 => 107,  241 => 104,  237 => 102,  235 => 101,  208 => 78,  201 => 76,  195 => 73,  191 => 72,  188 => 71,  186 => 70,  181 => 68,  177 => 67,  173 => 66,  169 => 65,  165 => 64,  161 => 63,  157 => 62,  154 => 61,  150 => 60,  145 => 57,  141 => 55,  139 => 54,  120 => 38,  113 => 34,  109 => 33,  97 => 24,  92 => 22,  88 => 21,  72 => 7,  66 => 6,  53 => 5,  43 => 3,  37 => 2,  11 => 1,);
    }
}
