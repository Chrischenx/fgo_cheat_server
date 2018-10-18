<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>登 录</title>
    <link rel="stylesheet" href="./layui/css/layui.css">

    <style>
        .layui-input-block {
            margin-left: 80px;
        }
        .layui-form-label {
            width: 50px;
        }
    </style>
</head>
<body style="max-width: 400px;margin: 10% auto;">

<div style="margin: auto 0">

    <form class="layui-form">
        <div class="layui-form-item">
            <label class="layui-form-label">UID</label>
            <div class="layui-input-block" style="padding-right: 20px">
                <input type="text" name="uid" placeholder="请输入UID" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">系统</label>
            <div class="layui-input-block" style="text-align: center;padding-right: 20px">
                <input type="radio" name="os" value="Android" title="Android" checked>
            </div>
        </div>
        <div class="layui-form-item" style="margin-top: 40px">
            <div class="layui-input-block" style="margin-left: 0; text-align: center">
                <button class="layui-btn" lay-submit style="width: 100px">登 录</button>
            </div>
        </div>
    </form>

</div>

<script src="./layui/layui.js"></script>
<script>

    layui.use("form", function(){
        var form = layui.form;
        form.on("submit()", function(data){
            let uid=data.field["uid"];
            let os=data.field["os"];
            uid=uid.replace(/[^\d]/g,'');
            if(uid<100000000000){
                layer.msg("请输入正确的UID");
                return false;
            }
            window.location.href="./fgo.php?os="+os+"&uid="+uid;
            return false;
        });
    });

</script>

</body>
</html>