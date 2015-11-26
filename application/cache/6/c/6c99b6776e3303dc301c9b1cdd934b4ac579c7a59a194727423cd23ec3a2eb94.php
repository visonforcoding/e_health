<?php

/* /shop/index/index.twig */
class __TwigTemplate_6c99b6776e3303dc301c9b1cdd934b4ac579c7a59a194727423cd23ec3a2eb94 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("/shop/layout/layout.twig", "/shop/index/index.twig", 1);
        $this->blocks = array(
            'page_header' => array($this, 'block_page_header'),
            'main' => array($this, 'block_main'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "/shop/layout/layout.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_page_header($context, array $blocks = array())
    {
    }

    // line 4
    public function block_main($context, array $blocks = array())
    {
        // line 5
        echo "    <div class=\"row\" id=\"welcome_box\">
        <div class=\"col-xs-12\">
            <div style=\"padding:20px;\" class=\"alert alert-success with-icon\">
";
        // line 9
        echo "                <div class=\"content\"><h3>欢迎您，";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["store"]) ? $context["store"] : $this->getContext($context, "store")), "storeName", array()), "html", null, true);
        echo "</h3></div>
            </div>
        </div>
    </div>
    <div class=\"row\" id=\"summary_infobox\" style=\"margin-top: 10px;\">
        <div class=\"space-6\"></div>
        <div class=\"col-sm-7 infobox-container\">
            <!-- #section:pages/dashboard.infobox -->
            <div class=\"infobox infobox-green\">
                <div class=\"infobox-icon\">
                    <i class=\"icon icon-shopping-cart fa fa-comments\"></i>
                </div>

                <div class=\"infobox-data\">
                    <span class=\"infobox-data-number\">";
        // line 23
        echo twig_escape_filter($this->env, (isset($context["new_order_nums"]) ? $context["new_order_nums"] : $this->getContext($context, "new_order_nums")), "html", null, true);
        echo "</span>
                    <div class=\"infobox-content\">新增订单数</div>
                </div>

                <!-- #section:pages/dashboard.infobox.stat -->
                <div class=\"stat stat-success\">
                    <i class=\"icon-long-arrow-up\"></i>
                </div>

                <!-- /section:pages/dashboard.infobox.stat -->
            </div>

            <div class=\"infobox infobox-blue\">
                <div class=\"infobox-icon\">
                    <i class=\"icon icon-comments fa fa-twitter\"></i>
                </div>

                <div class=\"infobox-data\">
                    <span class=\"infobox-data-number\">";
        // line 41
        echo twig_escape_filter($this->env, (isset($context["new_comment_nums"]) ? $context["new_comment_nums"] : $this->getContext($context, "new_comment_nums")), "html", null, true);
        echo "</span>
                    <div class=\"infobox-content\">新评论</div>
                </div>

            </div>

            <div class=\"infobox infobox-pink\">
                <div class=\"infobox-icon\">
                    <i class=\"icon icon-line-chart\"></i>
                </div>

                <div class=\"infobox-data\">
                    <span class=\"infobox-data-number\">";
        // line 53
        echo twig_escape_filter($this->env, ((array_key_exists("today_income", $context)) ? (_twig_default_filter((isset($context["today_income"]) ? $context["today_income"] : $this->getContext($context, "today_income")), "0")) : ("0")), "html", null, true);
        echo "</span>
                    <div class=\"infobox-content\">今日营业额</div>
                </div>
            </div>

            <div class=\"infobox infobox-red\">
                <div class=\"infobox-icon\">
                    <i class=\"icon icon-yen\"></i>
                </div>

                <div class=\"infobox-data\">
                    <span class=\"infobox-data-number\">";
        // line 64
        echo twig_escape_filter($this->env, ((array_key_exists("total_income", $context)) ? (_twig_default_filter((isset($context["total_income"]) ? $context["total_income"] : $this->getContext($context, "total_income")), "0")) : ("0")), "html", null, true);
        echo "</span>
                    <div class=\"infobox-content\">总营业额</div>
                </div>
            </div>
                    
            <div class=\"infobox infobox-red\">
                <div class=\"infobox-icon\">
                    <i class=\"icon icon-yen\"></i>
                </div>

                <div class=\"infobox-data\">
                    <span class=\"infobox-data-number\">";
        // line 75
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["total_income_row"]) ? $context["total_income_row"] : null), "avg_price", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["total_income_row"]) ? $context["total_income_row"] : null), "avg_price", array()), "0")) : ("0")), "html", null, true);
        echo "</span>
                    <div class=\"infobox-content\">客均价</div>
                </div>
            </div>



            <!-- /section:pages/dashboard.infobox.dark -->
        </div>
        <div class=\"col-sm-5\">
            <div class=\"panel\" data-url='http://baidu.com'>
                <div class=\"panel-heading\">
                    <i class=\"icon-list-ul\"></i> 我的店铺
                </div>
                <div class=\"panel-body\">
                    <div class=\"center-block\">
                        <img alt=\"";
        // line 91
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["store"]) ? $context["store"] : $this->getContext($context, "store")), "cover", array()), "html", null, true);
        echo "\" class=\"img-rounded center-block\"  style=\"width: 200px;\" src=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["store"]) ? $context["store"] : $this->getContext($context, "store")), "cover", array()), "html", null, true);
        echo "\"/>
                        <span class=\"center-block mt10 label label-badge\" style=\"display: block;width:120px;\">";
        // line 92
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["store"]) ? $context["store"] : $this->getContext($context, "store")), "storeName", array()), "html", null, true);
        echo "</span>
                        <div class=\"row mt10\" >
                            <div class=\"col-sm-3\" style=\"text-align:right\" >综合评价：</div>
                            <div class=\"score progress\" >
                                <div class=\"progress-bar col-sm-9\" role=\"progressbar\"  aria-valuenow=\"40\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: ";
        // line 96
        echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["store"]) ? $context["store"] : $this->getContext($context, "store")), "score", array()) * 10), "html", null, true);
        echo "%\">
                                    ";
        // line 97
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["store"]) ? $context["store"] : $this->getContext($context, "store")), "score", array()), "html", null, true);
        echo " 分
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div style=\"height: 1000px;\"></div>
";
    }

    public function getTemplateName()
    {
        return "/shop/index/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  160 => 97,  156 => 96,  149 => 92,  143 => 91,  124 => 75,  110 => 64,  96 => 53,  81 => 41,  60 => 23,  42 => 9,  37 => 5,  34 => 4,  29 => 2,  11 => 1,);
    }
}
