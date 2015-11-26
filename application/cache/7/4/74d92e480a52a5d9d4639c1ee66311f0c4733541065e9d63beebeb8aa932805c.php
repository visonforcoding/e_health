<?php

/* home/orderservice/engineer_detail.twig */
class __TwigTemplate_74d92e480a52a5d9d4639c1ee66311f0c4733541065e9d63beebeb8aa932805c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout/front.twig", "home/orderservice/engineer_detail.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'header' => array($this, 'block_header'),
            'main' => array($this, 'block_main'),
            'footer' => array($this, 'block_footer'),
            'script' => array($this, 'block_script'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout/front.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        echo "项目详情";
    }

    // line 3
    public function block_header($context, array $blocks = array())
    {
        // line 4
        echo "    <div class=\"goback\">
        <a href=\"javascript:history.go(-1)\">
            <i class=\"sprits\"></i>
        </a>
    </div>
    <div class=\"title\">技师-李江南</div>
";
    }

    // line 11
    public function block_main($context, array $blocks = array())
    {
        // line 12
        echo "    <div class=\"shop-detail-box\">
        <div class=\"order-server-option\">
            <div class=\"order-option-img\">
                <img src=\"images/img1.jpg\" alt=\"\">
            </div>

            <div class=\"detail-jishi-inf\">
                <div class=\"detail-jishi-name\">李江南</div>
                <div class=\"detail-jishi-zhizhao\"><span>男</span><span>职业医师</span></div>
                <div class=\"detail-jishi-code sprits\">
                    <div class=\"detail-code-length sprits\"></div>
                </div>
            </div>
        </div>
        <div class=\"detail-jishi-jianjie\">
            <h4>【简介】</h4>
            <p>5年从业经验,曾从业与深圳市中医院,担任推拿医师职位.</p>
            <h4>【擅长】</h4>
            <p>手法柔和，擅长肩周炎，腰肌劳损，头昏失眠，慢性疼痛等有着独到的调理经验。</p>
            <h4>【服务宣言】</h4>
            <p>您的满意是我最大的追求！</p>
        </div>
    </div>

    <div class=\"shop-detail-box\">
        <div class=\"detail-yuyue-title\">
            <p>【已预约的项目】</p>
        </div>

        <ul class=\"yueyued-option\">
            <li>
                <div class=\"yuyued-option-name\">
                    轻松头面肩
                </div>
                <div class=\"yuyued-option-time\">
                    45分钟
                </div>
                <div class=\"yuyued-option-price\">
                    119元
                </div>
            </li>

            <li>
                <div class=\"yuyued-option-name\">
                    轻松头面肩
                </div>
                <div class=\"yuyued-option-time\">
                    45分钟
                </div>
                <div class=\"yuyued-option-price\">
                    119元
                </div>
            </li>
            <li>
                <div class=\"yuyued-option-name\">
                    轻松头面肩
                </div>
                <div class=\"yuyued-option-time\">
                    45分钟
                </div>
                <div class=\"yuyued-option-price\">
                    119元
                </div>
            </li>
        </ul>
    </div>
    <a href=\"\" class=\"detail-yuyue-bnt\">立即预约</a>
";
    }

    // line 80
    public function block_footer($context, array $blocks = array())
    {
    }

    // line 82
    public function block_script($context, array $blocks = array())
    {
        // line 83
        echo "    <script>
        \$(function () {
        });
    </script>
";
    }

    public function getTemplateName()
    {
        return "home/orderservice/engineer_detail.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  133 => 83,  130 => 82,  125 => 80,  54 => 12,  51 => 11,  41 => 4,  38 => 3,  32 => 2,  11 => 1,);
    }
}
