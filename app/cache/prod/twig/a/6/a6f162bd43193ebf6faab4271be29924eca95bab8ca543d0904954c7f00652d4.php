<?php

/* FOSUserBundle:Security:login.html.twig */
class __TwigTemplate_a6f162bd43193ebf6faab4271be29924eca95bab8ca543d0904954c7f00652d4 extends Twig_Template
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
        // line 2
        echo "<!DOCTYPE html>
<html>
<head>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <title>HKGBF CRM | Log in</title>
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
    <!-- Theme style -->
    <link rel=\"stylesheet\" href=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("css/dist/AdminLTE.min.css"), "html", null, true);
        echo "\">
    <!-- iCheck -->
    <link rel=\"stylesheet\" href=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("css/iCheck/blue.css"), "html", null, true);
        echo "\">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src=\"https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js\"></script>
    <script src=\"https://oss.maxcdn.com/respond/1.4.2/respond.min.js\"></script>
    <![endif]-->
</head>

";
        // line 29
        if ((isset($context["error"]) ? $context["error"] : null)) {
            // line 30
            echo "    <div>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getAttribute((isset($context["error"]) ? $context["error"] : null), "messageKey", array()), $this->getAttribute((isset($context["error"]) ? $context["error"] : null), "messageData", array()), "security"), "html", null, true);
            echo "</div>
";
        }
        // line 32
        echo "
<body class=\"hold-transition login-page\">

    <div style=\"margin-left: 83%;font-weight: 700\">
    ";
        // line 36
        if ($this->env->getExtension('security')->isGranted("IS_AUTHENTICATED_REMEMBERED")) {
            // line 37
            echo "        ";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("layout.logged_in_as", array("%username%" => $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "username", array())), "FOSUserBundle"), "html", null, true);
            echo " |
        <a href=\"";
            // line 38
            echo $this->env->getExtension('routing')->getPath("index");
            echo "\">会员中心</a> |
        <a href=\"";
            // line 39
            echo $this->env->getExtension('routing')->getPath("fos_user_security_logout");
            echo "\">
            ";
            // line 40
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("layout.logout", array(), "FOSUserBundle"), "html", null, true);
            echo "
        </a>
    ";
        }
        // line 43
        echo "    </div>



    <div class=\"login-box\">
        <div class=\"login-logo\">
            <b style=\"color:#bf1d12\">HKGBF</b>CRM
        </div><!-- /.login-logo -->
        <div class=\"login-box-body\">
            <p class=\"login-box-msg\">Sign in to start your session</p>
<form class=\"form-signin\" action=\"";
        // line 53
        echo $this->env->getExtension('routing')->getPath("fos_user_security_check");
        echo "\" method=\"post\">

    <input type=\"hidden\" name=\"_csrf_token\" value=\"";
        // line 55
        echo twig_escape_filter($this->env, (isset($context["csrf_token"]) ? $context["csrf_token"] : null), "html", null, true);
        echo "\" />

    ";
        // line 58
        echo "    <div class=\"form-group has-feedback\">
    <input class=\"form-control\" type=\"text\" id=\"username\" placeholder=\"用户名\" name=\"_username\"  required=\"required\" />
        <span class=\"glyphicon glyphicon-user form-control-feedback\"></span>
    </div>

    ";
        // line 64
        echo "    <div class=\"form-group has-feedback\">
    <input class=\"form-control\" type=\"password\" id=\"password\" placeholder=\"密码\" name=\"_password\" required=\"required\" />
        <span  class=\"glyphicon glyphicon-lock form-control-feedback\"></span>
    </div>

    <div class=\"row\">
        <div class=\"col-xs-8\">
            <div class=\"checkbox icheck\">
               <label for=\"remember_me\">
                  <input type=\"checkbox\" id=\"remember_me\" name=\"_remember_me\" value=\"on\" />
                  ";
        // line 74
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("security.login.remember_me", array(), "FOSUserBundle"), "html", null, true);
        echo "
               </label>
            </div>
        </div>


        <div class=\"col-xs-4\">
            <button class=\"btn btn-primary btn-block btn-flat\"  type=\"submit\" id=\"_submit\" name=\"_submit\" >登  录</button>
</span>
        </div>
    </div>
</form>
            <a href=\"#\" style=\"font-size: 12px\">忘记密码？</a><br>
            <a href=\"/register\" class=\"text-center\" style=\"font-size: 12px\">注册</a>
            </div>
        </div>


    <!-- jQuery 2.1.4 -->
    <script src=\"";
        // line 93
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("js/jQuery-2.1.4.min.js"), "html", null, true);
        echo "\"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src=\"";
        // line 95
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>
    <!-- iCheck -->
    <script src=\"";
        // line 97
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("js/iCheck/icheck.min.js"), "html", null, true);
        echo "\"></script>
    <script>
        \$(function () {
            \$('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
</body>
</html>

";
    }

    public function getTemplateName()
    {
        return "FOSUserBundle:Security:login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  171 => 97,  166 => 95,  161 => 93,  139 => 74,  127 => 64,  120 => 58,  115 => 55,  110 => 53,  98 => 43,  92 => 40,  88 => 39,  84 => 38,  79 => 37,  77 => 36,  71 => 32,  65 => 30,  63 => 29,  50 => 19,  45 => 17,  40 => 15,  35 => 13,  30 => 11,  19 => 2,);
    }
}
