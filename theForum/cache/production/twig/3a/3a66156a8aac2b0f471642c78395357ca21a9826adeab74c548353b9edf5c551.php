<?php

/* simple_header.html */
class __TwigTemplate_53c1d5e8eb78c8f192b6fcfeb7aa8a038f46cea4d856ee60527ede4e947d139e extends Twig_Template
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
        // line 1
        echo "<!DOCTYPE html>
<html dir=\"";
        // line 2
        echo ($context["S_CONTENT_DIRECTION"] ?? null);
        echo "\" lang=\"";
        echo ($context["S_USER_LANG"] ?? null);
        echo "\">
<head>
<meta charset=\"utf-8\" />
<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\" />
";
        // line 7
        echo ($context["META"] ?? null);
        echo "
<title>";
        // line 8
        echo ($context["SITENAME"] ?? null);
        echo " &bull; ";
        if (($context["S_IN_MCP"] ?? null)) {
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("MCP");
            echo " &bull; ";
        } elseif (($context["S_IN_UCP"] ?? null)) {
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("UCP");
            echo " &bull; ";
        }
        echo ($context["PAGE_TITLE"] ?? null);
        echo "</title>

";
        // line 10
        if (($context["S_ALLOW_CDN"] ?? null)) {
            // line 11
            echo "<script>
\tWebFontConfig = {
\t\tgoogle: {
\t\t\tfamilies: ['Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese']
\t\t}
\t};

\t(function(d) {
\t\tvar wf = d.createElement('script'), s = d.scripts[0];
\t\twf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1.5.18/webfont.js';
\t\twf.async = true;
\t\ts.parentNode.insertBefore(wf, s);
\t})(document);
</script>
";
        }
        // line 26
        echo "<link href=\"";
        echo ($context["T_FONT_AWESOME_LINK"] ?? null);
        echo "\" rel=\"stylesheet\">
<link href=\"";
        // line 27
        echo ($context["T_STYLESHEET_LINK"] ?? null);
        echo "\" rel=\"stylesheet\">
<link href=\"";
        // line 28
        echo ($context["T_STYLESHEET_LANG_LINK"] ?? null);
        echo "\" rel=\"stylesheet\">

";
        // line 30
        if ((($context["S_CONTENT_DIRECTION"] ?? null) == "rtl")) {
            // line 31
            echo "\t<link href=\"";
            echo ($context["T_THEME_PATH"] ?? null);
            echo "/bidi.css?assets_version=";
            echo ($context["T_ASSETS_VERSION"] ?? null);
            echo "\" rel=\"stylesheet\">
";
        }
        // line 33
        echo "
<!--[if lte IE 8]>
\t<link href=\"";
        // line 35
        echo ($context["T_THEME_PATH"] ?? null);
        echo "/tweaks.css?assets_version=";
        echo ($context["T_ASSETS_VERSION"] ?? null);
        echo "\" rel=\"stylesheet\">
<![endif]-->

";
        // line 38
        $value = 1;
        $context['definition']->set('POPUP', $value);
        // line 39
        echo "
";
        // line 40
        // line 41
        echo "
";
        // line 42
        echo $this->getAttribute(($context["definition"] ?? null), "STYLESHEETS", array());
        echo "

";
        // line 44
        // line 45
        echo "
</head>

<body id=\"phpbb\" class=\"nojs ";
        // line 48
        echo ($context["S_CONTENT_DIRECTION"] ?? null);
        echo " ";
        echo ($context["BODY_CLASS"] ?? null);
        echo "\">

";
        // line 50
        // line 51
        echo "
<div id=\"wrap\" class=\"wrap\">
\t<a id=\"top\" class=\"top-anchor\" accesskey=\"t\"></a>
\t<div id=\"page-body\" class=\"page-body\" role=\"main\">
";
    }

    public function getTemplateName()
    {
        return "simple_header.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  134 => 51,  133 => 50,  126 => 48,  121 => 45,  120 => 44,  115 => 42,  112 => 41,  111 => 40,  108 => 39,  105 => 38,  97 => 35,  93 => 33,  85 => 31,  83 => 30,  78 => 28,  74 => 27,  69 => 26,  52 => 11,  50 => 10,  36 => 8,  32 => 7,  22 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "simple_header.html", "");
    }
}
