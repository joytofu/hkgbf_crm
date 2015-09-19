<?php

/* FOSUserBundle:Registration:register_content.html.twig */
class __TwigTemplate_c39078702ff0c109a8476854a432bf298bf5b831d632966a85a28478d0ceee4b extends Twig_Template
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
        $__internal_24941cd74adf1ccbbfd50c19c81ab2ef3694d075fe9f652a41b539a78e0453bb = $this->env->getExtension("native_profiler");
        $__internal_24941cd74adf1ccbbfd50c19c81ab2ef3694d075fe9f652a41b539a78e0453bb->enter($__internal_24941cd74adf1ccbbfd50c19c81ab2ef3694d075fe9f652a41b539a78e0453bb_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "FOSUserBundle:Registration:register_content.html.twig"));

        // line 2
        echo "<!DOCTYPE html>
<html>
<head>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <title>HKGBF CRM | 注 册</title>
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

<body class=\"hold-transition login-page\">
<div class=\"register-box\">
    <div class=\"register-logo\">
       <b style=\"color:#bf1d12\">HKGBF</b>CRM
    </div>

    <div class=\"register-box-body\">
        <p class=\"login-box-msg\">注册成为会员</p>

        <form action=\"";
        // line 39
        echo $this->env->getExtension('routing')->getPath("fos_user_registration_register");
        echo "\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'enctype');
        echo " method=\"POST\">
           <div class=\"form-group has-feedback\">
               ";
        // line 41
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "email", array()), 'widget', array("attr" => array("placeholder" => "Email", "class" => "form-control")));
        echo "
               <span class=\"glyphicon glyphicon-envelope form-control-feedback\"></span>
           </div>
           <div class=\"form-group has-feedback\">
               ";
        // line 45
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "username", array()), 'widget', array("attr" => array("placeholder" => "用户名", "class" => "form-control")));
        echo "
               <span class=\"glyphicon glyphicon-user form-control-feedback\"></span>
           </div>
        <div class=\"form-group has-feedback\">
           <input class=\"form-control\" type=\"password\" id=\"fos_user_registration_form_plainPassword_first\" name=\"fos_user_registration_form[plainPassword][first]\" required=\"required\" placeholder=\"请输入密码，密码不少于6位\">
            <span class=\"glyphicon glyphicon-lock form-control-feedback\"></span>
            </div>
        <div class=\"form-group has-feedback\">
            <input class=\"form-control\" type=\"password\" id=\"fos_user_registration_form_plainPassword_second\" name=\"fos_user_registration_form[plainPassword][second]\" required=\"required\" placeholder=\"请再次输入密码\">
            <span class=\"glyphicon glyphicon-log-in form-control-feedback\"></span>
        </div>
        <div class=\"form-group has-feedback\">
            ";
        // line 57
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "invitation", array()), 'widget', array("attr" => array("placeholder" => "若有邀请码，请输入")));
        echo "
            <span class=\"glyphicon glyphicon-log-in form-control-feedback\"></span>
        </div>
        <div class=\"form-group has-feedback\" id=\"area\"></div>

        <div class=\"row\">
            <div class=\"col-xs-8\">


                       <input style=\"width: 17px;height:17px;vertical-align: middle\" type=\"checkbox\" id=\"terms\" ><span style=\"vertical-align: sub\">我同意<a href=\"#\">条款</a></span>


            </div>
            <div class=\"col-xs-4\">
                <button type=\"submit\" class=\"btn btn-primary btn-block btn-flat\" id=\"submit\" disabled>注  册</button>
            </div>
        </div>

        ";
        // line 75
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "_token", array()), 'row');
        echo "
        </form>

        <a href=\"/login\" class=\"text-center\">已经有帐号</a>
    </div>
</div>



    <script type=\"text/javascript\" src=\"";
        // line 84
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("js/jQuery-2.1.4.min.js"), "html", null, true);
        echo "\"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src=\"";
        // line 86
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>
    <!-- iCheck -->
    ";
        // line 89
        echo "    <script type=\"text/javascript\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("js/area_picker/area.js"), "html", null, true);
        echo "\"></script>
    <script>
        \$(function(){
            add_select(0);

            \$('body').on('change', '#area select', function() {
                var \$me = \$(this);
                var \$next = \$me.next();

                /**
                 * 如果下一级已经是当前所选地区的子地区，则不进行处理
                 */
                if (\$me.val() == \$next.data('pid')) {
                   return;

                }
                \$me.nextAll().remove();
                add_select(\$me.val());
                var \$textarea = \"<textarea style='width: 100%' class='form-group has-feedback' name='address_detail' id='address_detail' rows='3' placeholder='请输入具体地址'></textarea>\";
                \$('#area').append(\$textarea);
            });

            function add_select(pid) {
                var area_names = area['name'+pid];
                if (!area_names) {
                    return false;
                }
                var area_codes = area['code'+pid];
                var \$select = \$('<select>');
                \$select.attr('name', 'area[]');
                \$select.attr('class','form-control')
                \$select.data('pid', pid);
                if (area_codes[0] != -1) {
                    area_names.unshift('请选择地址');
                    area_codes.unshift(-1);
                }
                for (var idx in area_codes) {
                    var \$option = \$('<option>');
                    \$option.attr('value', area_codes[idx]);
                    \$option.text(area_names[idx]);
                    \$select.append(\$option);
                }
                \$('#area').append(\$select);
            };


        });
    </script>
    ";
        // line 146
        echo "<script type=\"text/javascript\">
    \$(function(){
        var submit = \$(\"#submit\");
        \$(\"#terms\").change(function(){
            var that = \$(this);
            that.prop(\"checked\",that.prop(\"checked\"));
            if(that.prop(\"checked\")){
                submit.prop(\"disabled\",false)
            }else{
                submit.prop(\"disabled\",true)
            }
        });
    });
</script>

</body>
</html>
";
        
        $__internal_24941cd74adf1ccbbfd50c19c81ab2ef3694d075fe9f652a41b539a78e0453bb->leave($__internal_24941cd74adf1ccbbfd50c19c81ab2ef3694d075fe9f652a41b539a78e0453bb_prof);

    }

    public function getTemplateName()
    {
        return "FOSUserBundle:Registration:register_content.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  200 => 146,  148 => 89,  143 => 86,  138 => 84,  126 => 75,  105 => 57,  90 => 45,  83 => 41,  76 => 39,  53 => 19,  48 => 17,  43 => 15,  38 => 13,  33 => 11,  22 => 2,);
    }
}
