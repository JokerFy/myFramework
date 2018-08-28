<?php

/* layout.html */
class __TwigTemplate_317d7e79b78ca5ec41ca703e13d832e7276273b564f6893f4dea375063b8a4ba extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
</head>

<body>

<header>
header
</header>

<div class=\"content\">
    ";
        // line 14
        $this->displayBlock('content', $context, $blocks);
        // line 17
        echo "</div>

<footer>
    footer
</footer>
</body>
</html>
";
    }

    // line 14
    public function block_content($context, array $blocks = array())
    {
        // line 15
        echo "
    ";
    }

    public function getTemplateName()
    {
        return "layout.html";
    }

    public function getDebugInfo()
    {
        return array (  51 => 15,  48 => 14,  37 => 17,  35 => 14,  20 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
</head>

<body>

<header>
header
</header>

<div class=\"content\">
    {% block content %}

    {% endblock %}
</div>

<footer>
    footer
</footer>
</body>
</html>
", "layout.html", "D:\\web\\myframework\\app\\home\\view\\layout.html");
    }
}
