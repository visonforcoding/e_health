<?php

/* admin/service/test.twig */
class __TwigTemplate_d7ed9faec9f8ffc7f12dce671039c20cc82052c3a56fa2f428d08ad550d00029 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout/esui.twig", "admin/service/test.twig", 1);
        $this->blocks = array(
            'static' => array($this, 'block_static'),
            'main' => array($this, 'block_main'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout/esui.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_static($context, array $blocks = array())
    {
        // line 3
        echo "<script src=\"/static/dropzone/dropzone.js\"></script>
<link rel=\"stylesheet\" href=\"/static/dropzone/dropzone.css\">
";
    }

    // line 6
    public function block_main($context, array $blocks = array())
    {
        // line 7
        echo "<p>
  This is the most minimal example of Dropzone. The upload in this example
  doesn't work, because there is no actual server to handle the file upload.
</p>

<!-- Change /upload-target to your upload address -->
<form action=\"/upload-target\" class=\"dropzone\"></form>
";
    }

    public function getTemplateName()
    {
        return "admin/service/test.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  41 => 7,  38 => 6,  32 => 3,  29 => 2,  11 => 1,);
    }
}
