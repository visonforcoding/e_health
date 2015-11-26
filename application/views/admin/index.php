<!DOCTYPE HTML>
<html>
<head>
    <title>后台管理系统</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link href="/admin/assets/css/dpl-min.css" rel="stylesheet" type="text/css"/>
    <link href="/admin/assets/css/bui-min.css" rel="stylesheet" type="text/css"/>
    <link href="/admin/assets/css/main.css" rel="stylesheet" type="text/css"/>
</head>
<body>

<div class="header">

    <div class="dl-title">
        <!--<img src="/chinapost/Public/assets/img/top.png">-->
    </div>

    <div class="dl-log">欢迎您，<span class="dl-log-user"><?php echo $_SESSION['admin_username']; ?></span>
    	<a href="/admin/login.shtml?type=logout" title="退出系统" class="dl-log-quit">[退出]</a>
    </div>
</div>
<div class="content">
    <div class="dl-main-nav">
        <div class="dl-inform">
            <div class="dl-inform-title"><s class="dl-inform-icon dl-up"></s></div>
        </div>
        <ul id="J_Nav" class="nav-list ks-clear">
            <li class="nav-item dl-selected">
                <div class="nav-item-inner nav-home">系统管理</div>
            </li>
            <li class="nav-item dl-selected">
                <div class="nav-item-inner nav-order">商户管理</div>
            </li>
            <li class="nav-item dl-selected">
                <div class="nav-item-inner nav-order">优惠券管理</div>
            </li>

        </ul>
    </div>
    <ul id="J_NavContent" class="dl-tab-conten">

    </ul>
</div>
<script type="text/javascript" src="/admin/assets/js/jquery-1.8.1.min.js"></script>
<script type="text/javascript" src="/admin/assets/js/bui-min.js"></script>
<script type="text/javascript" src="/admin/assets/js/common/main-min.js"></script>
<script type="text/javascript" src="/admin/assets/js/config-min.js"></script>
<script>
    BUI.use('common/main', function () {
        var config = [{
            id: '1',
            homePage:'1001',
            menu: [{
                text: '系统管理',
                items: [{id: '1001', text: '机构管理', href: 'Node/index.html'},
                    {id: '1002', text: '角色管理', href: 'Role/index.html'},
                    {id: '1003', text: '用户管理', href: 'Member/index.html'},
                    {id: '1004', text: '菜单管理', href: 'Menu/index.html'},
                    {id: '1005', text: '活动管理', href: 'Menu/index.html'},
                    {id: '1006', text: '优惠券', href: 'Coupon/index.html'},
                    {id: '1007', text: '店铺管理', href: 'Store/index.html'}]
            }]
        }, {
            id: '2',
            homePage: '2001',
            menu: [{
                text: '商户管理',
                items: [{id: '2001', text: '查询业务', href: 'Node/index.html'},
                    {id: '2002', text: '优惠券', href: 'Coupon/index.html'}]
            }]
        }, {
            id: '3',
            homePage: '3001',
            menu: [{
                text: '优惠券管理',
                items: [{id: '3001', text: '查询业务', href: 'Node/index.html'},
                    {id: '3002', text: '优惠券', href: 'Coupon/index.html'}]
            }]
        }];
        new PageUtil.MainPage({
            modulesConfig: config
        });
    });
</script>
</body>
</html>