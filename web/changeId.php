<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="format-detection" content="telephone=no, email=no"/>
    <title>修改绑定</title>
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
<body style="max-width: 400px;margin: 180px auto;">

<div style="margin: auto 0">

    <form class="layui-form">
        <div class="layui-form-item">
            <label class="layui-form-label">原UID</label>
            <div class="layui-input-block" style="padding-right: 20px;text-align: center;">
                <label class="layui-form-mid layui-word-aux" id="idLabel" style="float: none;"></label>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">新UID</label>
            <div class="layui-input-block" style="padding-right: 20px">
                <input type="text" name="uid" id="uid" placeholder="请输入新PY码" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">系统</label>
            <div class="layui-input-block" style="padding-right: 20px;text-align: center;">
                <label class="layui-form-mid layui-word-aux" id="osLabel" style="float: none;"></label>
            </div>
        </div>
        <div class="layui-form-item" style="margin-top: 40px">
            <div class="layui-input-block" style="margin-left: 0; text-align: center">
                <button class="layui-btn" id="applyButton" lay-submit style="width: 100px">修 改</button>
            </div>
        </div>
    </form>

</div>

<script src="./layui/layui.js"></script>
<script>

    let oldUid=getQueryVariable("uid");
    let os=getQueryVariable("os");
    document.getElementById("idLabel").innerText=oldUid;
    document.getElementById("osLabel").innerText=os;

    let newData={
        oldUid : oldUid,
        os : os,
        newUid : ""
    };

    layui.use("form", function(){
        var form = layui.form;
        form.on("submit()", function(data){
            let newUid=data.field["uid"];
            newUid=newUid.replace(/[^\d]/g,'');
            document.getElementById("uid").value=newUid;
            if(newUid<100000000000){
                layer.msg("请输入正确的UID");
                return false;
            }
            newData.newUid=newUid;
            setData(JSON.stringify(newData));
            return false;
        });
    });

    function setData(data) {
        document.getElementById("applyButton").disabled=true;
        document.getElementById("applyButton").innerHTML="正在提交";
        var XHR= new XMLHttpRequest();
        XHR.open("post","changeIdServer.php",true);
        XHR.setRequestHeader("Content-Type","application/x-www-form-urlencoded;charset=UTF-8");
        XHR.onreadystatechange=function () {
            var res=XHR.responseText;
            if(XHR.status === 200 && XHR.readyState === 4 && res === "success"){
                document.getElementById("applyButton").disabled=false;
                layer.msg("修改成功");
                window.location.href="./fgo.php?os="+os+"&uid="+newData.newUid;
            }else if(res === "error"){
                document.getElementById("applyButton").disabled=false;
                layer.msg("修改失败或该账号已被绑定");
            }
            document.getElementById("applyButton").innerHTML="修 改";
        };
        XHR.send("data="+data);
    }

    function getQueryVariable(variable){
        var query = window.location.search.substring(1);
        var vars = query.split("&");
        for (var i=0;i<vars.length;i++) {
            var pair = vars[i].split("=");
            if(pair[0] == variable){
                return pair[1];
            }
        }
        return(false);
    }

</script>

</body>
</html>