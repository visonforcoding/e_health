<?php

/* /home/user/setAvatar.twig */
class __TwigTemplate_9b55b3f65181ac874142fcf262b8f648164bc2445f7c7eb303163492f99a7125 extends Twig_Template
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
        echo "<!Doctype HTML>
<html>
    <head>
        <title>HTML5 Mobile头像上传裁切</title>
        <link rel=\"stylesheet\" href=\"/static/jcrop/jcrop.min.css\">
        <link rel=\"stylesheet\" href=\"/static/home/css/style.css\">
        <script src=\"/static/Js/jquery.js\"></script>
        <script src=\"/static/jcrop/jcrop.min.js\"></script>
    </head>
    <body>
        <img alt=\"test jcorp\" src=\"/static/Images/default.jpeg\" id=\"target\" />
        <input type=\"file\"  class=\"save-change\" name=\"file_head\"  id=\"file_head\" onchange=\"javascript:setImagePreview();\" />
        <a id=\"uploadImg\" class=\"save-change\">确认上传</a>
        <script>
            \$(function () {
                uploadInfo = {};
                uploadInfo.jcropContainer = {};
                document.querySelector('#file_head').onchange = function (evt) {
                    var jcrop_api;
                    if(jcrop_api !== undefined){
                        jcrop_api.destroy();
                    }
                    var files = evt.target.files;
                    for (var i = 0, f; f = files[i]; i++) {
                        if (!f.type.match('image.*'))
                            continue;
                        var reader = new FileReader();
                        reader.onload = (function (theFile) {
                            return function (e) {
                                var img = document.querySelector('#target');
                                img.title = theFile.name;
                                img.src = e.target.result;
                                uploadInfo.name = img.title;
                                uploadInfo.imageBase64 = img.src;
                                // destroy Jcrop if it is existed
                                \$('#target').Jcrop({
                                    setSelect: [100, 100, 350, 350],
                                    onChange: setCoords
                                }, function () {
                                    jcrop_api = this;
                                });
                            };
                        })(f);
                        reader.readAsDataURL(f);
                    }
                };
                \$('#uploadImg').click(function () {
                    var \$imgObj = \$('#target');
                    uploadInfo.jcropContainer.x = \$imgObj.data('x');
                    uploadInfo.jcropContainer.y = \$imgObj.data('y');
                    uploadInfo.jcropContainer.x2 = \$imgObj.data('x2');
                    uploadInfo.jcropContainer.y2 = \$imgObj.data('y2');
                    uploadInfo.jcropContainer.w = \$imgObj.data('w');
                    uploadInfo.jcropContainer.h = \$imgObj.data('h');
                    var request = \$.ajax({
                        url: '/home/useraction/uploadAvatar',
                        type: \"post\",
                        data: uploadInfo,
                        dataType: 'json'
                    });
                    request.success(function (data) {
                        if (data.status == 'success') {
                            console.log(data);
                            \$('input[name=\"avatar\"]').val(data.result['image1'][0]);
                            //头像上传成功，提交用户信息修改
                            \$('#avatarImg')[0].src = data.result['image1'][1];
                            infoChange({'avatar': data.result['image1'][0]});
                        }
                        if (data.status == 'error') {
                            alert(data.message);
                        }
                    })
                });
            });

            function setCoords(c) {
                var img = document.getElementById('target');
                img.setAttribute('data-x', c.x);
                img.setAttribute('data-y', c.y);
                img.setAttribute('data-x2', c.x2);
                img.setAttribute('data-y2', c.y2);
                img.setAttribute('data-w', c.w);
                img.setAttribute('data-h', c.h);
            }
        </script>
    </body>
</html>";
    }

    public function getTemplateName()
    {
        return "/home/user/setAvatar.twig";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }
}
