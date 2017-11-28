<?php

/* simple_footer.html */
class __TwigTemplate_b678da1c2852ec49b746116604a2366f2e239fca74e1f91a2e470c80286069b8 extends Twig_Template
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
        echo "\t</div>

\t<div class=\"copyright\" role=\"contentinfo\">";
        // line 3
        echo ($context["CREDIT_LINE"] ?? null);
        echo "
\t\t";
        // line 4
        if (($context["TRANSLATION_INFO"] ?? null)) {
            echo "<br />";
            echo ($context["TRANSLATION_INFO"] ?? null);
        }
        // line 5
        echo "\t\t";
        if (($context["DEBUG_OUTPUT"] ?? null)) {
            echo "<br />";
            echo ($context["DEBUG_OUTPUT"] ?? null);
        }
        // line 6
        echo "\t</div>

\t<div id=\"darkenwrapper\" class=\"darkenwrapper\" data-ajax-error-title=\"";
        // line 8
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("AJAX_ERROR_TITLE");
        echo "\" data-ajax-error-text=\"";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("AJAX_ERROR_TEXT");
        echo "\" data-ajax-error-text-abort=\"";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("AJAX_ERROR_TEXT_ABORT");
        echo "\" data-ajax-error-text-timeout=\"";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("AJAX_ERROR_TEXT_TIMEOUT");
        echo "\" data-ajax-error-text-parsererror=\"";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("AJAX_ERROR_TEXT_PARSERERROR");
        echo "\">
\t\t<div id=\"darken\" class=\"darken\">&nbsp;</div>
\t</div>
\t<div id=\"loading_indicator\" class=\"loading_indicator\"></div>

\t<div id=\"phpbb_alert\" class=\"phpbb_alert\" data-l-err=\"";
        // line 13
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("ERROR");
        echo "\" data-l-timeout-processing-req=\"";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("TIMEOUT_PROCESSING_REQ");
        echo "\">
\t\t<a href=\"#\" class=\"alert_close\">
\t\t\t<i class=\"icon fa-times-circle fa-fw\" aria-hidden=\"true\"></i>
\t\t</a>
\t\t<h3 class=\"alert_title\"></h3><p class=\"alert_text\"></p>
\t</div>
\t<div id=\"phpbb_confirm\" class=\"phpbb_confirm phpbb_alert\">
\t\t<a href=\"#\" class=\"alert_close\">
\t\t\t<i class=\"icon fa-times-circle fa-fw\" aria-hidden=\"true\"></i>
\t\t</a>
\t\t<div class=\"alert_text\"></div>
\t</div>
</div>

<script type=\"text/javascript\" src=\"";
        // line 27
        echo ($context["T_JQUERY_LINK"] ?? null);
        echo "\"></script>
";
        // line 28
        if (($context["S_ALLOW_CDN"] ?? null)) {
            echo "<script type=\"text/javascript\">window.jQuery || document.write('\\x3Cscript src=\"";
            echo ($context["T_ASSETS_PATH"] ?? null);
            echo "/javascript/jquery.min.js?assets_version=";
            echo ($context["T_ASSETS_VERSION"] ?? null);
            echo "\">\\x3C/script>');</script>";
        }
        // line 29
        echo "<script type=\"text/javascript\" src=\"";
        echo ($context["T_ASSETS_PATH"] ?? null);
        echo "/javascript/core.js?assets_version=";
        echo ($context["T_ASSETS_VERSION"] ?? null);
        echo "\"></script>
";
        // line 30
        $asset_file = "forum_fn.js";
        $asset = new \phpbb\template\asset($asset_file, $this->getEnvironment()->get_path_helper(), $this->getEnvironment()->get_filesystem());
        if (substr($asset_file, 0, 2) !== './' && $asset->is_relative()) {
            $asset_path = $asset->get_path();            $local_file = $this->getEnvironment()->get_phpbb_root_path() . $asset_path;
            if (!file_exists($local_file)) {
                $local_file = $this->getEnvironment()->findTemplate($asset_path);
                $asset->set_path($local_file, true);
            }
            $asset->add_assets_version('2');
        }
        $this->getEnvironment()->get_assets_bag()->add_script($asset);        // line 31
        $asset_file = "ajax.js";
        $asset = new \phpbb\template\asset($asset_file, $this->getEnvironment()->get_path_helper(), $this->getEnvironment()->get_filesystem());
        if (substr($asset_file, 0, 2) !== './' && $asset->is_relative()) {
            $asset_path = $asset->get_path();            $local_file = $this->getEnvironment()->get_phpbb_root_path() . $asset_path;
            if (!file_exists($local_file)) {
                $local_file = $this->getEnvironment()->findTemplate($asset_path);
                $asset->set_path($local_file, true);
            }
            $asset->add_assets_version('2');
        }
        $this->getEnvironment()->get_assets_bag()->add_script($asset);        // line 32
        echo "
";
        // line 33
        // line 34
        echo "
";
        // line 35
        echo $this->getAttribute(($context["definition"] ?? null), "SCRIPTS", array());
        echo "

</body>
</html>
";
    }

    public function getTemplateName()
    {
        return "simple_footer.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  125 => 35,  122 => 34,  121 => 33,  118 => 32,  107 => 31,  96 => 30,  89 => 29,  81 => 28,  77 => 27,  58 => 13,  42 => 8,  38 => 6,  32 => 5,  27 => 4,  23 => 3,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "simple_footer.html", "");
    }
}
