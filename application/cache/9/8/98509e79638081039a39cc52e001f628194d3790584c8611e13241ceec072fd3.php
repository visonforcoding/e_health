<?php

/* /admin/menu.twig */
class __TwigTemplate_98509e79638081039a39cc52e001f628194d3790584c8611e13241ceec072fd3 extends Twig_Template
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
        echo "<div class=\"easyui-accordion\" data-options=\"fit:true,border:false\">
    <div title=\"系统管理\" data-options=\"selected:true\">
        <div style=\"margin: 5px\">
            <ul class=\"tree easyui-tree\" data-options=\"animate:true,lines:true\">
                <li data-options=\"iconCls:'icon-group'\">
                    <span>系统管理</span>
                    <ul>
                        <li data-options=\"iconCls:'icon-group_add'\">                                     
                            <span ><a data-url=\"/admin/member/index\">用户管理</a></span>
                        </li>
                        <li data-options=\"iconCls:'icon-building'\">
                            <span><a data-url=\"/admin/store/index\">店铺管理</a></span>
                        </li>
                        <li data-options=\"iconCls:'icon-map'\">
                            <span><a data-url=\"/admin/area/index\">区域管理</a></span>
                        </li>
                        <li data-options=\"iconCls:'icon-rosette'\">
                            <span><a data-url=\"/admin/service/index\">服务管理</a></span>
                        </li>
                        <li data-options=\"iconCls:'icon-user_gray'\">
                            <span><a data-url=\"/admin/engineer/index\">技师管理</a></span>
                        </li>
                        <li data-options=\"iconCls:'icon-book_edit'\">
                            <span><a data-url=\"/admin/article/index\">文章管理</a></span>
                        </li>
                        <li data-options=\"iconCls:'icon-images'\">
                            <span><a data-url=\"/admin/banner/index\">焦点图管理</a></span>
                        </li>
                         <li data-options=\"iconCls:'icon-book_edit'\">
                            <span><a data-url=\"/admin/balance/index\">提现审核</a></span>
                        </li>
                        <li data-options=\"iconCls:'icon-images'\">
                            <span><a data-url=\"/admin/reback/index\">退款审核</a></span>
                        </li>
                         <li data-options=\"iconCls:'icon-book_edit'\">
                            <span><a data-url=\"/admin/coupon/index\">查看劵种</a></span>
                        </li>
                        <li data-options=\"iconCls:'icon-images'\">
                            <span><a data-url=\"/admin/userCoupon/index\">查看用户优惠劵</a></span>
                        </li>
                    </ul>
                </li>
                <li data-options=\"state:'closed',iconCls:'icon-joystick'\">
                    <span>系统设置</span>
                    <ul>
                        <li data-options=\"iconCls:'icon-joystick_add'\">
                            <span><a data-url=\"/admin/sys/admin\">管理员管理</a></span>
                        </li>
                        <li data-options=\"iconCls:'icon-joystick_add'\">
                            <span><a data-url=\"/admin/sys/node\">节点管理</a></span>
                        </li>
                        <li data-options=\"iconCls:'icon-joystick_add'\">
                            <span><a data-url=\"/admin/sys/adminGroup\">群组管理</a></span>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "/admin/menu.twig";
    }

    public function getDebugInfo()
    {
        return array (  19 => 2,);
    }
}
