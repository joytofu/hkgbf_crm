<?php

/* FOSUserBundle::layout_admin.html.twig */
class __TwigTemplate_d38b6a90dc0af08be6462fa70af6d6618cb1c27583445b6c385196ef23623865 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'private_css' => array($this, 'block_private_css'),
            'page_header' => array($this, 'block_page_header'),
            'content' => array($this, 'block_content'),
            'private_js' => array($this, 'block_private_js'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_4bf8110c23adea21ce9a97563d6996c18cb30b14554d0cbd80850923b2e9c3ef = $this->env->getExtension("native_profiler");
        $__internal_4bf8110c23adea21ce9a97563d6996c18cb30b14554d0cbd80850923b2e9c3ef->enter($__internal_4bf8110c23adea21ce9a97563d6996c18cb30b14554d0cbd80850923b2e9c3ef_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "FOSUserBundle::layout_admin.html.twig"));

        // line 1
        echo "<!DOCTYPE html>

<html>
<head>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <title>KC CRM</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content=\"width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no\" name=\"viewport\">
    <!-- Bootstrap 3.3.5 -->
    <link rel=\"stylesheet\" href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("css/bootstrap.min.css"), "html", null, true);
        echo "\">
    <!-- Font Awesome -->
    <link rel=\"stylesheet\" href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("css/font-awesome.min.css"), "html", null, true);
        echo "\">
    <!-- Ionicons -->
    <link rel=\"stylesheet\" href=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("css/ionicons.min.css"), "html", null, true);
        echo "\">

    ";
        // line 17
        $this->displayBlock('private_css', $context, $blocks);
        // line 18
        echo "
    <!-- Theme style -->
    <link rel=\"stylesheet\" href=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("css/dist/AdminLTE.min.css"), "html", null, true);
        echo "\">



    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link rel=\"stylesheet\" href=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("css/dist/skins/skin-blue.min.css"), "html", null, true);
        echo "\">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src=\"https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js\"></script>
    <script src=\"https://oss.maxcdn.com/respond/1.4.2/respond.min.js\"></script>
    <![endif]-->
</head>

<body class=\"hold-transition skin-blue sidebar-mini wysihtml5-supported\">
<div class=\"wrapper\">

    <!-- Main Header -->
    <header class=\"main-header\">

        <!-- Logo -->
        <a href=\"#\" class=\"logo\">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class=\"logo-mini\"><b>K</b>C</span>
            <!-- logo for regular state and mobile devices -->
            <span class=\"logo-lg\"><b>HKGBF </b>CRM</span>
        </a>

        <!-- Header Navbar -->
        <nav class=\"navbar navbar-static-top\" role=\"navigation\">
            <!-- Sidebar toggle button-->
            <a href=\"#\" class=\"sidebar-toggle\" data-toggle=\"offcanvas\" role=\"button\">
                <span class=\"sr-only\">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class=\"navbar-custom-menu\">
                <ul class=\"nav navbar-nav\">
                    <!-- Messages: style can be found in dropdown.less-->
                    <li class=\"dropdown messages-menu\">
                        <!-- Menu toggle button -->
                        <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
                            <i class=\"fa fa-envelope-o\"></i>
                            <span class=\"label label-success\">4</span>
                        </a>
                        <ul class=\"dropdown-menu\">
                            <li class=\"header\">你有4条未读信息</li>
                            <li>
                                <!-- inner menu: contains the messages -->
                                <ul class=\"menu\">
                                    <li><!-- start message -->
                                        <a href=\"#\">
                                            <div class=\"pull-left\">
                                                <!-- User Image -->
                                                <img src=\"/img/upload/";
        // line 77
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "imageName", array()), "html", null, true);
        echo "\" class=\"img-circle\" alt=\"User Image\">
                                            </div>
                                            <!-- Message title and timestamp -->
                                            <h4>
                                                Support Team
                                                <small><i class=\"fa fa-clock-o\"></i> 5 mins</small>
                                            </h4>
                                            <!-- The message -->
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li><!-- end message -->
                                </ul><!-- /.menu -->
                            </li>
                            <li class=\"footer\"><a href=\"#\">查看全部信息</a></li>
                        </ul>
                    </li><!-- /.messages-menu -->

                    <!-- Notifications Menu -->
                    <li class=\"dropdown notifications-menu\">
                        <!-- Menu toggle button -->
                        <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
                            <i class=\"fa fa-bell-o\"></i>
                            <span class=\"label label-warning\">10</span>
                        </a>
                        <ul class=\"dropdown-menu\">
                            <li class=\"header\">你有10条通知</li>
                            <li>
                                <!-- Inner Menu: contains the notifications -->
                                <ul class=\"menu\">
                                    <li><!-- start notification -->
                                        <a href=\"#\">
                                            <i class=\"fa fa-users text-aqua\"></i> 5 new members joined today
                                        </a>
                                    </li><!-- end notification -->
                                </ul>
                            </li>
                            <li class=\"footer\"><a href=\"#\">查看全部</a></li>
                        </ul>
                    </li>
                    <!-- Tasks Menu -->
                    <li class=\"dropdown tasks-menu\">
                        <!-- Menu Toggle Button -->
                        <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
                            <i class=\"fa fa-flag-o\"></i>
                            <span class=\"label label-danger\">9</span>
                        </a>
                        <ul class=\"dropdown-menu\">
                            <li class=\"header\">You have 9 tasks</li>
                            <li>
                                <!-- Inner menu: contains the tasks -->
                                <ul class=\"menu\">
                                    <li><!-- Task item -->
                                        <a href=\"#\">
                                            <!-- Task title and progress text -->
                                            <h3>
                                                Design some buttons
                                                <small class=\"pull-right\">20%</small>
                                            </h3>
                                            <!-- The progress bar -->
                                            <div class=\"progress xs\">
                                                <!-- Change the css width attribute to simulate progress -->
                                                <div class=\"progress-bar progress-bar-aqua\" style=\"width: 20%\" role=\"progressbar\" aria-valuenow=\"20\" aria-valuemin=\"0\" aria-valuemax=\"100\">
                                                    <span class=\"sr-only\">20% Complete</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li><!-- end task item -->
                                </ul>
                            </li>
                            <li class=\"footer\">
                                <a href=\"#\">View all tasks</a>
                            </li>
                        </ul>
                    </li>
                    <!-- User Account Menu -->
                    <li class=\"dropdown user user-menu\">
                        <!-- Menu Toggle Button -->
                        <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
                            <!-- The user image in the navbar-->
                            <img src=\"/img/upload/";
        // line 156
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "imageName", array()), "html", null, true);
        echo "\" class=\"user-image\" alt=\"User Image\">
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class=\"hidden-xs\">";
        // line 158
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "username", array()), "html", null, true);
        echo "</span>
                        </a>
                        <ul class=\"dropdown-menu\">
                            <!-- The user image in the menu -->
                            <li class=\"user-header\">
                                <img src=\"/img/upload/";
        // line 163
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "imageName", array()), "html", null, true);
        echo "\" class=\"img-circle\" alt=\"User Image\">
                                <p>
                                    ";
        // line 165
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "username", array()), "html", null, true);
        echo "
                                    <small>上次登录:";
        // line 166
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "lastlogin", array()), "date", array()), "html", null, true);
        echo "</small>
                                </p>
                            </li>
                            <!-- Menu Body -->
                            <li class=\"user-body\">
                                <div class=\"col-xs-4 text-center\">
                                    <a href=\"#\">Followers</a>
                                </div>
                                <div class=\"col-xs-4 text-center\">
                                    <a href=\"#\">Sales</a>
                                </div>
                                <div class=\"col-xs-4 text-center\">
                                    <a href=\"#\">Friends</a>
                                </div>
                            </li>
                            <!-- Menu Footer-->
                            <li class=\"user-footer\">
                                <div class=\"pull-left\">
                                    <a href=\"";
        // line 184
        echo $this->env->getExtension('routing')->getPath("editprofile");
        echo "\" class=\"btn btn-default btn-flat\">个人信息</a>
                                </div>
                                <div class=\"pull-right\">
                                    <a href=\"";
        // line 187
        echo $this->env->getExtension('routing')->getPath("fos_user_security_logout");
        echo "\" class=\"btn btn-default btn-flat\">注销</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                    <li>
                        <a href=\"#\" data-toggle=\"control-sidebar\"><i class=\"fa fa-gears\"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class=\"main-sidebar\">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class=\"sidebar\">

            <!-- Sidebar user panel (optional) -->
            <div class=\"user-panel\">
                <div class=\"pull-left image\">
                    <img src=\"/img/upload/";
        // line 209
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "imageName", array()), "html", null, true);
        echo "\" class=\"img-circle\" alt=\"User Image\">
                </div>
                <div class=\"pull-left info\">
                    <p>";
        // line 212
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "username", array()), "html", null, true);
        echo "</p>
                    <!-- Status -->
                    <a href=\"#\"><i class=\"fa fa-circle text-success\"></i> Online</a>
                </div>
            </div>

            <!-- search form (Optional) -->
            <form action=\"#\" method=\"get\" class=\"sidebar-form\">
                <div class=\"input-group\">
                    <input type=\"text\" name=\"q\" class=\"form-control\" placeholder=\"Search...\">
              <span class=\"input-group-btn\">
                <button type=\"submit\" name=\"search\" id=\"search-btn\" class=\"btn btn-flat\"><i class=\"fa fa-search\"></i></button>
              </span>
                </div>
            </form>
            <!-- /.search form -->

            <!-- Sidebar Menu -->
            <ul class=\"sidebar-menu\">
                <li class=\"header\">HEADER</li>
                <!-- Optionally, you can add icons to the links -->
                <li ";
        // line 233
        if (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "requestUri", array()) == "/admin/")) {
            echo "class=\"active\"";
        }
        echo "><a href=\"";
        echo $this->env->getExtension('routing')->getPath("index");
        echo "\"><i class=\"fa fa-home\"></i> <span>首页</span></a></li>
                ";
        // line 234
        if ($this->env->getExtension('security')->isGranted("ROLE_SUPER_ADMIN")) {
            // line 235
            echo "                    <li ";
            if (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "requestUri", array()) == "/admin/clientslist")) {
                echo "class=\"active\"";
            }
            echo "><a href=\"";
            echo $this->env->getExtension('routing')->getPath("clientslist");
            echo "\"><i class=\"fa fa-user\"></i> <span>所有用户</span></a></li>
                ";
        } else {
            // line 237
            echo "                    <li ";
            if (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "requestUri", array()) == "/admin/clientslist")) {
                echo "class=\"active\"";
            }
            echo "><a href=\"";
            echo $this->env->getExtension('routing')->getPath("clientslist");
            echo "\"><i class=\"fa fa-users\"></i> <span>我的客户</span></a></li>
                ";
        }
        // line 239
        echo "                ";
        if ($this->env->getExtension('security')->isGranted("ROLE_SUPER_ADMIN")) {
            // line 240
            echo "                <li ";
            if (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "requestUri", array()) == "/admin/modifyrole")) {
                echo "class=\"active\"";
            }
            echo "><a href=\"";
            echo $this->env->getExtension('routing')->getPath("group");
            echo "\"><i class=\"fa fa-users\"></i> <span>用户分组</span></a></li>
                <li ";
            // line 241
            if (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "requestUri", array()) == "admin/noticelist")) {
                echo "class=\"active\"";
            }
            echo "><a href=\"";
            echo $this->env->getExtension('routing')->getPath("noticelist");
            echo "\"><i class=\"fa fa-file\"></i> <span>通知公告</span></a></li>
                ";
        }
        // line 243
        echo "                <li class=\"treeview\">
                    <a href=\"#\"><i class=\"fa fa-link\"></i> <span>Multilevel</span> <i class=\"fa fa-angle-left pull-right\"></i></a>
                    <ul class=\"treeview-menu\">
                        <li><a href=\"#\">Link in level 2</a></li>
                        <li><a href=\"#\">Link in level 2</a></li>
                    </ul>
                </li>
            </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class=\"content-wrapper\">
        <!-- Content Header (Page header) -->
        <section class=\"content-header\">
            <h1>
                <b>";
        // line 260
        $this->displayBlock('page_header', $context, $blocks);
        echo "</b>

            </h1>
            <ol class=\"breadcrumb\">
                <li><a href=\"#\"><i class=\"fa fa-home\"></i> 首页</a></li>
                <li class=\"active\">Here</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class=\"content\">

            <!-- Your Page Content Here -->
            ";
        // line 273
        $this->displayBlock('content', $context, $blocks);
        // line 274
        echo "
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class=\"main-footer\">
        <!-- To the right -->
        <div class=\"pull-right hidden-xs\">
            Kinson Chow CRM
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2015 <a href=\"#\">Company</a>.</strong> All rights reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class=\"control-sidebar control-sidebar-dark\">
        <!-- Create the tabs -->
        <ul class=\"nav nav-tabs nav-justified control-sidebar-tabs\">
            <li class=\"active\"><a href=\"#control-sidebar-home-tab\" data-toggle=\"tab\"><i class=\"fa fa-home\"></i></a></li>
            <li><a href=\"#control-sidebar-settings-tab\" data-toggle=\"tab\"><i class=\"fa fa-gears\"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class=\"tab-content\">
            <!-- Home tab content -->
            <div class=\"tab-pane active\" id=\"control-sidebar-home-tab\">
                <h3 class=\"control-sidebar-heading\">Recent Activity</h3>
                <ul class=\"control-sidebar-menu\">
                    <li>
                        <a href=\"javascript::;\">
                            <i class=\"menu-icon fa fa-birthday-cake bg-red\"></i>
                            <div class=\"menu-info\">
                                <h4 class=\"control-sidebar-subheading\">Langdon's Birthday</h4>
                                <p>Will be 23 on April 24th</p>
                            </div>
                        </a>
                    </li>
                </ul><!-- /.control-sidebar-menu -->

                <h3 class=\"control-sidebar-heading\">Tasks Progress</h3>
                <ul class=\"control-sidebar-menu\">
                    <li>
                        <a href=\"javascript::;\">
                            <h4 class=\"control-sidebar-subheading\">
                                Custom Template Design
                                <span class=\"label label-danger pull-right\">70%</span>
                            </h4>
                            <div class=\"progress progress-xxs\">
                                <div class=\"progress-bar progress-bar-danger\" style=\"width: 70%\"></div>
                            </div>
                        </a>
                    </li>
                </ul><!-- /.control-sidebar-menu -->

            </div><!-- /.tab-pane -->
            <!-- Stats tab content -->
            <div class=\"tab-pane\" id=\"control-sidebar-stats-tab\">Stats Tab Content</div><!-- /.tab-pane -->
            <!-- Settings tab content -->
            <div class=\"tab-pane\" id=\"control-sidebar-settings-tab\">
                <form method=\"post\">
                    <h3 class=\"control-sidebar-heading\">General Settings</h3>
                    <div class=\"form-group\">
                        <label class=\"control-sidebar-subheading\">
                            Report panel usage
                            <input type=\"checkbox\" class=\"pull-right\" checked>
                        </label>
                        <p>
                            Some information about this general settings option
                        </p>
                    </div><!-- /.form-group -->
                </form>
            </div><!-- /.tab-pane -->
        </div>
    </aside><!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class=\"control-sidebar-bg\"></div>
</div><!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.1.4 -->
<script src=\"";
        // line 355
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("js/jQuery-2.1.4.min.js"), "html", null, true);
        echo "\"></script>
<!-- Bootstrap 3.3.5 -->
<script src=\"";
        // line 357
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>
<!--private_js-->
";
        // line 359
        $this->displayBlock('private_js', $context, $blocks);
        // line 360
        echo "<!-- AdminLTE App -->
<script src=\"";
        // line 361
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("js/app.min.js"), "html", null, true);
        echo "\"></script>


</body>
</html>
";
        
        $__internal_4bf8110c23adea21ce9a97563d6996c18cb30b14554d0cbd80850923b2e9c3ef->leave($__internal_4bf8110c23adea21ce9a97563d6996c18cb30b14554d0cbd80850923b2e9c3ef_prof);

    }

    // line 17
    public function block_private_css($context, array $blocks = array())
    {
        $__internal_92b5caf2168627c728c20dad69cadb9388627b8906b6f0b8e6b243c9b237eccc = $this->env->getExtension("native_profiler");
        $__internal_92b5caf2168627c728c20dad69cadb9388627b8906b6f0b8e6b243c9b237eccc->enter($__internal_92b5caf2168627c728c20dad69cadb9388627b8906b6f0b8e6b243c9b237eccc_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "private_css"));

        
        $__internal_92b5caf2168627c728c20dad69cadb9388627b8906b6f0b8e6b243c9b237eccc->leave($__internal_92b5caf2168627c728c20dad69cadb9388627b8906b6f0b8e6b243c9b237eccc_prof);

    }

    // line 260
    public function block_page_header($context, array $blocks = array())
    {
        $__internal_1d259f5d1f2e06d2d4f2877e087cecb32a20c866bb8cf05dc1733bba3b89f673 = $this->env->getExtension("native_profiler");
        $__internal_1d259f5d1f2e06d2d4f2877e087cecb32a20c866bb8cf05dc1733bba3b89f673->enter($__internal_1d259f5d1f2e06d2d4f2877e087cecb32a20c866bb8cf05dc1733bba3b89f673_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "page_header"));

        
        $__internal_1d259f5d1f2e06d2d4f2877e087cecb32a20c866bb8cf05dc1733bba3b89f673->leave($__internal_1d259f5d1f2e06d2d4f2877e087cecb32a20c866bb8cf05dc1733bba3b89f673_prof);

    }

    // line 273
    public function block_content($context, array $blocks = array())
    {
        $__internal_0f3cda3d42e562013bb25a830db6d07099af445aec2ba7d1e25daf747a314d78 = $this->env->getExtension("native_profiler");
        $__internal_0f3cda3d42e562013bb25a830db6d07099af445aec2ba7d1e25daf747a314d78->enter($__internal_0f3cda3d42e562013bb25a830db6d07099af445aec2ba7d1e25daf747a314d78_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        
        $__internal_0f3cda3d42e562013bb25a830db6d07099af445aec2ba7d1e25daf747a314d78->leave($__internal_0f3cda3d42e562013bb25a830db6d07099af445aec2ba7d1e25daf747a314d78_prof);

    }

    // line 359
    public function block_private_js($context, array $blocks = array())
    {
        $__internal_43cce793a526b213f9949fe8981d859c4d14b76701a564cb7fd31a0851143a4e = $this->env->getExtension("native_profiler");
        $__internal_43cce793a526b213f9949fe8981d859c4d14b76701a564cb7fd31a0851143a4e->enter($__internal_43cce793a526b213f9949fe8981d859c4d14b76701a564cb7fd31a0851143a4e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "private_js"));

        
        $__internal_43cce793a526b213f9949fe8981d859c4d14b76701a564cb7fd31a0851143a4e->leave($__internal_43cce793a526b213f9949fe8981d859c4d14b76701a564cb7fd31a0851143a4e_prof);

    }

    public function getTemplateName()
    {
        return "FOSUserBundle::layout_admin.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  540 => 359,  529 => 273,  518 => 260,  507 => 17,  494 => 361,  491 => 360,  489 => 359,  484 => 357,  479 => 355,  396 => 274,  394 => 273,  378 => 260,  359 => 243,  350 => 241,  341 => 240,  338 => 239,  328 => 237,  318 => 235,  316 => 234,  308 => 233,  284 => 212,  278 => 209,  253 => 187,  247 => 184,  226 => 166,  222 => 165,  217 => 163,  209 => 158,  204 => 156,  122 => 77,  70 => 28,  59 => 20,  55 => 18,  53 => 17,  48 => 15,  43 => 13,  38 => 11,  26 => 1,);
    }
}
