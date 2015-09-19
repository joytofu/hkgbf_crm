<?php

/* FOSUserBundle::index_admin.html.twig */
class __TwigTemplate_9d417f5463ef7b8f114bd387bd24900f68297fa796f0ac9f9332f1e7de7c70da extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("FOSUserBundle::layout_admin.html.twig", "FOSUserBundle::index_admin.html.twig", 1);
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
        $__internal_9b33a8605563c95dd6f32b05aa5cd7edf814d96995f97cdb7c0721c8af6f24ca = $this->env->getExtension("native_profiler");
        $__internal_9b33a8605563c95dd6f32b05aa5cd7edf814d96995f97cdb7c0721c8af6f24ca->enter($__internal_9b33a8605563c95dd6f32b05aa5cd7edf814d96995f97cdb7c0721c8af6f24ca_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "FOSUserBundle::index_admin.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_9b33a8605563c95dd6f32b05aa5cd7edf814d96995f97cdb7c0721c8af6f24ca->leave($__internal_9b33a8605563c95dd6f32b05aa5cd7edf814d96995f97cdb7c0721c8af6f24ca_prof);

    }

    // line 2
    public function block_private_css($context, array $blocks = array())
    {
        $__internal_16f12c374e0c6248ad3095dcf9f8f67fd3e7822650f37cab3403a035e0a1065c = $this->env->getExtension("native_profiler");
        $__internal_16f12c374e0c6248ad3095dcf9f8f67fd3e7822650f37cab3403a035e0a1065c->enter($__internal_16f12c374e0c6248ad3095dcf9f8f67fd3e7822650f37cab3403a035e0a1065c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "private_css"));

        // line 3
        echo "    <link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("css/notice.css"), "html", null, true);
        echo "\">
    <link rel=\"stylesheet\" href=\"";
        // line 4
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("css/jVectorMap/jquery-jvectormap-2.0.4.css"), "html", null, true);
        echo "\" media=\"screen\">
";
        
        $__internal_16f12c374e0c6248ad3095dcf9f8f67fd3e7822650f37cab3403a035e0a1065c->leave($__internal_16f12c374e0c6248ad3095dcf9f8f67fd3e7822650f37cab3403a035e0a1065c_prof);

    }

    // line 7
    public function block_page_header($context, array $blocks = array())
    {
        $__internal_39c353aaec789bd6e66befacce97bb78f545882c63c72143ca0e7e9500f57664 = $this->env->getExtension("native_profiler");
        $__internal_39c353aaec789bd6e66befacce97bb78f545882c63c72143ca0e7e9500f57664->enter($__internal_39c353aaec789bd6e66befacce97bb78f545882c63c72143ca0e7e9500f57664_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "page_header"));

        echo "首页";
        
        $__internal_39c353aaec789bd6e66befacce97bb78f545882c63c72143ca0e7e9500f57664->leave($__internal_39c353aaec789bd6e66befacce97bb78f545882c63c72143ca0e7e9500f57664_prof);

    }

    // line 8
    public function block_content($context, array $blocks = array())
    {
        $__internal_c69e06793ec95a42c2a987bf3d78a791a977ec9cc38326b6bb095256f8bd345b = $this->env->getExtension("native_profiler");
        $__internal_c69e06793ec95a42c2a987bf3d78a791a977ec9cc38326b6bb095256f8bd345b->enter($__internal_c69e06793ec95a42c2a987bf3d78a791a977ec9cc38326b6bb095256f8bd345b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        // line 9
        echo "    <div class=\"row\">
        ";
        // line 11
        echo "        <div class=\"col-md-9\">
            <div class=\"box box-solid\">
                ";
        // line 15
        echo "<!-- /.box-header -->
                <div class=\"box-body\">
                    <div id=\"carousel-example-generic\" class=\"carousel slide\" data-ride=\"carousel\">
                        <ol class=\"carousel-indicators\">
                            <li data-target=\"#carousel-example-generic\" data-slide-to=\"0\" class=\"active\"></li>
                            <li data-target=\"#carousel-example-generic\" data-slide-to=\"1\" class=\"\"></li>
                            <li data-target=\"#carousel-example-generic\" data-slide-to=\"2\" class=\"\"></li>
                            <li data-target=\"#carousel-example-generic\" data-slide-to=\"3\" class=\"\"></li>
                            <li data-target=\"#carousel-example-generic\" data-slide-to=\"4\" class=\"\"></li>
                        </ol>
                        <div class=\"carousel-inner\">
                            <div class=\"item active\">
                                <div class=\"notice_title\"><h2>";
        // line 27
        if ( !(null === (isset($context["notice_active"]) ? $context["notice_active"] : $this->getContext($context, "notice_active")))) {
            echo $this->getAttribute((isset($context["notice_active"]) ? $context["notice_active"] : $this->getContext($context, "notice_active")), "title", array());
        }
        echo "</h2></div>
                                <div class=\"notice_content\">";
        // line 28
        if ( !(null === (isset($context["notice_active"]) ? $context["notice_active"] : $this->getContext($context, "notice_active")))) {
            echo $this->getAttribute((isset($context["notice_active"]) ? $context["notice_active"] : $this->getContext($context, "notice_active")), "content", array());
        }
        echo "</div>
                                <img src=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("img/notice/1.png"), "html", null, true);
        echo "\">
                            </div>
                            ";
        // line 31
        $context["i"] = 2;
        // line 32
        echo "                            ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["notice"]) ? $context["notice"] : $this->getContext($context, "notice")));
        foreach ($context['_seq'] as $context["_key"] => $context["data"]) {
            // line 33
            echo "                            <div class=\"item\">
                                <div class=\"notice_title\"><h2>";
            // line 34
            echo $this->getAttribute($context["data"], "title", array());
            echo "</h2></div>
                                <div class=\"notice_content\">";
            // line 35
            echo $this->getAttribute($context["data"], "content", array());
            echo "</div>
                                <img src=\"/img/notice/";
            // line 36
            echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")), "html", null, true);
            echo ".png\">
                            </div>
                             ";
            // line 38
            $context["i"] = ((isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")) + 1);
            // line 39
            echo "                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['data'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 40
        echo "                        </div>
                        <a class=\"left carousel-control\" style=\"width:10%\" href=\"#carousel-example-generic\" data-slide=\"prev\">
                            <span class=\"fa fa-angle-left\"></span>
                        </a>
                        <a class=\"right carousel-control\"  style=\"width:10%\" href=\"#carousel-example-generic\" data-slide=\"next\">
                            <span class=\"fa fa-angle-right\"></span>
                        </a>
                    </div>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>

        ";
        // line 53
        echo "    <div class=\"col-lg-3 col-xs-6\">
        <!-- small box -->
        <div class=\"small-box bg-yellow\">
            <div class=\"inner\">
                <h3>";
        // line 57
        echo twig_escape_filter($this->env, (isset($context["clients_num"]) ? $context["clients_num"] : $this->getContext($context, "clients_num")), "html", null, true);
        echo "</h3>
                ";
        // line 58
        if ($this->env->getExtension('security')->isGranted("ROLE_SUPER_ADMIN")) {
            // line 59
            echo "                <p><b>当前用户总数</b></p>
                 ";
        } else {
            // line 61
            echo "                     <p><b>当前客户总数</b></p>
                  ";
        }
        // line 63
        echo "            </div>
            <div class=\"icon\">
                <i class=\"ion ion-person-stalker\"></i>
            </div>
            <a href=\"";
        // line 67
        echo $this->env->getExtension('routing')->getPath("clientslist");
        echo "\" class=\"small-box-footer\">
                查看详情 <i class=\"fa fa-arrow-circle-right\"></i>
            </a>
        </div>
    </div>

        ";
        // line 74
        echo "    <div class=\"col-lg-3 col-xs-6\">
        <div class=\"small-box bg-green\">
            <div class=\"inner\">
                <h3>";
        // line 77
        echo twig_escape_filter($this->env, (isset($context["unverified_num"]) ? $context["unverified_num"] : $this->getContext($context, "unverified_num")), "html", null, true);
        echo "</h3>

                <p><b>新注册用户</b></p>

            </div>
            <div class=\"icon\">
                <i class=\"ion ion-person-add\"></i>
            </div>
            <a href=\"";
        // line 85
        echo $this->env->getExtension('routing')->getPath("unverifiedclientslist");
        echo "\" class=\"small-box-footer\">
                查看详情 <i class=\"fa fa-arrow-circle-right\"></i>
            </a>
        </div>
    </div>

    ";
        // line 92
        echo "     <div class=\"col-md-6\">
         <div class=\"box box-danger\">
             <div class=\"box-header with-border\">
                 <h3 class=\"box-title\">会员分类统计</h3>
                 <div class=\"box-tools pull-right\">
                     <button class=\"btn btn-box-tool\" data-widget=\"collapse\"><i class=\"fa fa-minus\"></i></button>
                 </div>
             </div>
             <div class=\"box-body\">
                 <div class=\"row\">
                     <div class=\"col-md-8\">
                         <div class=\"chart-responsive\">
                             <canvas id=\"pieChart\" height=\"250\"></canvas>
                         </div>
                     </div>
                     <div class=\"col-md-4\">
                         <ul class=\"chart-legend clearfix\" style=\"font-size: 16px\">
                             <li><i class=\"fa fa-circle-o text-aqua\"></i> 普通会员</li>
                             <li><i class=\"fa fa-circle-o text-yellow\"></i> 金卡会员</li>
                             <li><i class=\"fa fa-circle-o text-red\"></i> 钻石会员</li>
                         </ul>
                     </div>
                 </div>
             </div><!-- /.box-body -->
         </div>
     </div>

     ";
        // line 120
        echo "     <div class=\"col-md-6\">
         <div class=\"box box-success\">
             <div class=\"box-header with-border\">
                 <h3 class=\"box-title\">客户分布图</h3>
                 <div class=\"box-tools pull-right\">
                     <button class=\"btn btn-box-tool\" data-widget=\"collapse\"><i class=\"fa fa-minus\"></i></button>
                     <button class=\"btn btn-box-tool\" data-widget=\"remove\"><i class=\"fa fa-times\"></i></button>
                 </div>
             </div>
             <div class=\"box-body no-padding\">
                 <div class=\"row\">
                     <div class=\"col-md-12\">
                         <div class=\"pad\">
                             <div id=\"china\" style=\"height: 500px;width:100%\">
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
    </div>
";
        
        $__internal_c69e06793ec95a42c2a987bf3d78a791a977ec9cc38326b6bb095256f8bd345b->leave($__internal_c69e06793ec95a42c2a987bf3d78a791a977ec9cc38326b6bb095256f8bd345b_prof);

    }

    // line 144
    public function block_private_js($context, array $blocks = array())
    {
        $__internal_0d12a3f3040ab970a09ce59dfb06ab607fd3f04d023d2a5870dbd38c06b0484b = $this->env->getExtension("native_profiler");
        $__internal_0d12a3f3040ab970a09ce59dfb06ab607fd3f04d023d2a5870dbd38c06b0484b->enter($__internal_0d12a3f3040ab970a09ce59dfb06ab607fd3f04d023d2a5870dbd38c06b0484b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "private_js"));

        // line 145
        echo "    <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("js/chart/Chart.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 146
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("js/chart/pieChart.js"), "html", null, true);
        echo "\"></script>
    <script>chartSetUp(";
        // line 147
        echo twig_escape_filter($this->env, (isset($context["normal_clients_num"]) ? $context["normal_clients_num"] : $this->getContext($context, "normal_clients_num")), "html", null, true);
        echo ",";
        echo twig_escape_filter($this->env, (isset($context["golden_clients_num"]) ? $context["golden_clients_num"] : $this->getContext($context, "golden_clients_num")), "html", null, true);
        echo ",";
        echo twig_escape_filter($this->env, (isset($context["diamond_clients_num"]) ? $context["diamond_clients_num"] : $this->getContext($context, "diamond_clients_num")), "html", null, true);
        echo ")</script>
    <script src=\"";
        // line 148
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("js/jVectorMap/jquery-jvectormap-2.0.4.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 149
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("js/jVectorMap/jquery-jvectormap-cn-official.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\">
                \$(function () {
                       \$('#china').vectorMap({
                           map: 'cn_mill',
                           backgroundColor: \"#EEE\",
                           markersSelectable:true,
                           normalizeFunction: 'polynomial',
                           hoverOpacity: 0.7,
                           hoverColor: false,
                           regionStyle: {
                               initial: {
                                   fill: '#D24545',
                                   \"fill-opacity\": 1,
                                   stroke: 'none',
                                   \"stroke-width\": 0,
                                   \"stroke-opacity\": 1
                               },
                               hover: {
                                   \"fill-opacity\": 0.7,
                                   cursor: 'pointer'
                               },

                           },

                           markers: [
                               ";
        // line 175
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["normal_clients"]) ? $context["normal_clients"] : $this->getContext($context, "normal_clients")));
        foreach ($context['_seq'] as $context["_key"] => $context["normal_client"]) {
            // line 176
            echo "                               {latLng: [";
            echo twig_escape_filter($this->env, $this->getAttribute($context["normal_client"], "longitude", array()), "html", null, true);
            echo ",";
            echo twig_escape_filter($this->env, $this->getAttribute($context["normal_client"], "latitude", array()), "html", null, true);
            echo "],
                                   name: \"";
            // line 177
            echo twig_escape_filter($this->env, $this->getAttribute($context["normal_client"], "username", array()), "html", null, true);
            echo ",";
            echo twig_escape_filter($this->env, $this->getAttribute($context["normal_client"], "city", array()), "html", null, true);
            echo twig_escape_filter($this->env, $this->getAttribute($context["normal_client"], "district", array()), "html", null, true);
            echo twig_escape_filter($this->env, $this->getAttribute($context["normal_client"], "town", array()), "html", null, true);
            echo "\",
                                   style:{fill:'#3A5FCD'}},
                               ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['normal_client'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 180
        echo "
                               ";
        // line 181
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["golden_clients"]) ? $context["golden_clients"] : $this->getContext($context, "golden_clients")));
        foreach ($context['_seq'] as $context["_key"] => $context["golden_client"]) {
            // line 182
            echo "                               {latLng: [";
            echo twig_escape_filter($this->env, $this->getAttribute($context["golden_client"], "longitude", array()), "html", null, true);
            echo ",";
            echo twig_escape_filter($this->env, $this->getAttribute($context["golden_client"], "latitude", array()), "html", null, true);
            echo "],
                                   name: \"";
            // line 183
            echo twig_escape_filter($this->env, $this->getAttribute($context["golden_client"], "username", array()), "html", null, true);
            echo ",";
            echo twig_escape_filter($this->env, $this->getAttribute($context["golden_client"], "city", array()), "html", null, true);
            echo twig_escape_filter($this->env, $this->getAttribute($context["golden_client"], "district", array()), "html", null, true);
            echo twig_escape_filter($this->env, $this->getAttribute($context["golden_client"], "town", array()), "html", null, true);
            echo "\",
                                   style:{fill:'#EEEE00'}},
                               ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['golden_client'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 186
        echo "
                               ";
        // line 187
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["diamond_clients"]) ? $context["diamond_clients"] : $this->getContext($context, "diamond_clients")));
        foreach ($context['_seq'] as $context["_key"] => $context["diamond_client"]) {
            // line 188
            echo "                               {latLng: [";
            echo twig_escape_filter($this->env, $this->getAttribute($context["diamond_client"], "longitude", array()), "html", null, true);
            echo ",";
            echo twig_escape_filter($this->env, $this->getAttribute($context["diamond_client"], "latitude", array()), "html", null, true);
            echo "],
                                   name: \"";
            // line 189
            echo twig_escape_filter($this->env, $this->getAttribute($context["diamond_client"], "username", array()), "html", null, true);
            echo ",";
            echo twig_escape_filter($this->env, $this->getAttribute($context["diamond_client"], "city", array()), "html", null, true);
            echo twig_escape_filter($this->env, $this->getAttribute($context["diamond_client"], "district", array()), "html", null, true);
            echo twig_escape_filter($this->env, $this->getAttribute($context["diamond_client"], "town", array()), "html", null, true);
            echo "\",
                                   style:{fill:'#8B0A50'}},
                               ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['diamond_client'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 192
        echo "
                                   ]
                        });
                });
            </script>

";
        
        $__internal_0d12a3f3040ab970a09ce59dfb06ab607fd3f04d023d2a5870dbd38c06b0484b->leave($__internal_0d12a3f3040ab970a09ce59dfb06ab607fd3f04d023d2a5870dbd38c06b0484b_prof);

    }

    public function getTemplateName()
    {
        return "FOSUserBundle::index_admin.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  410 => 192,  397 => 189,  390 => 188,  386 => 187,  383 => 186,  370 => 183,  363 => 182,  359 => 181,  356 => 180,  343 => 177,  336 => 176,  332 => 175,  303 => 149,  299 => 148,  291 => 147,  287 => 146,  282 => 145,  276 => 144,  247 => 120,  218 => 92,  209 => 85,  198 => 77,  193 => 74,  184 => 67,  178 => 63,  174 => 61,  170 => 59,  168 => 58,  164 => 57,  158 => 53,  144 => 40,  138 => 39,  136 => 38,  131 => 36,  127 => 35,  123 => 34,  120 => 33,  115 => 32,  113 => 31,  108 => 29,  102 => 28,  96 => 27,  82 => 15,  78 => 11,  75 => 9,  69 => 8,  57 => 7,  48 => 4,  43 => 3,  37 => 2,  11 => 1,);
    }
}
