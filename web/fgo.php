<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="format-detection" content="telephone=no, email=no"/>
    <title>设 置</title>
    <link rel="stylesheet" href="./layui/css/layui.css">
    <script src="./layui/layui.js"></script>

    <style>
        .layui-form-label {
            width: 120px;
        }
        .layui-input-block {
            margin-left: 150px;
        }
        .layui-input{
            width: 70%;
            text-align: center;
            margin: 0 auto;
            padding-left: 0;
        }
        .layui-form-mid {
            margin-right: 0;
        }
        .layui-form-select .layui-input {
            padding-right: 0;
        }
    </style>
</head>
<body style="max-width: 400px;margin: 40px auto;">

<div style="margin: auto 0">

    <form class="layui-form" lay-filter="configForm">
        <div class="layui-form-item">
            <label class="layui-form-label">UID</label>
            <div class="layui-input-block" style="padding-right: 20px;text-align: center;">
                <label class="layui-form-mid layui-word-aux" id="idLabel" onclick="changeId()" style="float: none;"></label>
            </div>
        </div>
        <div class="layui-form-item" style="text-align: center">
            <div class="layui-word-aux">点击UID可以换绑</div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">系统</label>
            <div class="layui-input-block" style="padding-right: 20px;text-align: center;">
                <label class="layui-form-mid layui-word-aux" id="osLabel" style="float: none;"></label>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">到期时间</label>
            <div class="layui-input-block" style="padding-right: 20px;text-align: center;">
                <label class="layui-form-mid layui-word-aux" id="deadlineLabel" style="float: none;"></label>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">科技开关</label>
            <div style="text-align: center">
                <div class="layui-input-block" style="padding-right: 20px">
                    <input type="checkbox" name="mainSwitch" id="mainSwitch" lay-skin="switch" lay-text="ON|OFF">
                </div>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">己方生命值</label>
            <div class="layui-input-block" style="padding-right: 20px">
                <input type="text" name="uhp" id="uhp" placeholder="0为关闭修改" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">己方攻击力</label>
            <div class="layui-input-block" style="padding-right: 20px">
                <input type="text" name="uatk" id="uatk" placeholder="0为关闭修改" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">宝具Lv5</label>
            <div style="text-align: center">
                <div class="layui-input-block" style="padding-right: 20px">
                    <input type="checkbox" name="tdLvSwitch" id="tdLvSwitch" lay-skin="switch" lay-text="ON|OFF">
                </div>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">英灵技能Lv10</label>
            <div style="text-align: center">
                <div class="layui-input-block" style="padding-right: 20px">
                    <input type="checkbox" name="skillLvSwitch" id="skillLvSwitch" lay-skin="switch" lay-text="ON|OFF">
                </div>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">英灵技能1</label>
            <div class="layui-input-block" style="padding-right: 20px">
                <select name="skillId1" lay-filter="skillId">
                    <option value="0">不修改</option>
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">英灵技能2</label>
            <div class="layui-input-block" style="padding-right: 20px">
                <select name="skillId2" lay-filter="skillId">
                    <option value="0">不修改</option>
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">英灵技能3</label>
            <div class="layui-input-block" style="padding-right: 20px">
                <select name="skillId3" lay-filter="skillId">
                    <option value="0">不修改</option>
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">敌方生命修改阀值</label>
            <div class="layui-input-block" style="padding-right: 20px">
                <input type="text" name="ehplimit" id="ehplimit" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">敌方生命值</label>
            <div class="layui-input-block" style="padding-right: 20px">
                <input type="text" name="ehp" id="ehp" placeholder="0为关闭修改" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">敌方攻击力</label>
            <div class="layui-input-block" style="padding-right: 20px">
                <input type="text" name="eatk" id="eatk" placeholder="0为关闭修改" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">助战</label>
            <div class="layui-input-block" style="padding-right: 20px">
                <select name="friendlyId" lay-filter="friendlyId">
                    <option value="0">不修改</option>
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">礼装替换</label>
            <div class="layui-input-block" style="padding-right: 20px">
                <select name="equipId" lay-filter="equipId">
                    <option value="0">不修改</option>
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">撤退胜利</label>
            <div style="text-align: center">
                <div class="layui-input-block" style="padding-right: 20px">
                    <input type="checkbox" name="battleCancelSwitch" id="battleCancelSwitch" lay-skin="switch" lay-text="ON|OFF">
                </div>
            </div> 
        </div>
        <div class="layui-form-item" style="text-align: center">
            <div class="layui-word-aux">撤退胜利不显示结算页面</div>
        </div>

        <div class="layui-form-item" style="margin-top: 40px">
            <div class="layui-input-block" style="margin-left: 0; text-align: center">
                <button class="layui-btn" id="applyButton" lay-submit style="width: 100px">应 用</button>
            </div>
        </div>
    </form>

</div>

<script>

    let uid=getQueryVariable("uid");
    let os=getQueryVariable("os");
    let mainSwitch,tdLvSwitch,skillLvSwitch,battleCancelSwitch;

    let newData={
        uid:uid,
        os:os,
        mainSwitch: "false",
        uhp: "0",
        uatk: "0",
        tdLvSwitch: "false",
        skillLvSwitch: "false",
        skillId1: "0",
        skillId2: "0",
        skillId3: "0",
        ehplimit: "0",
        ehp: "0",
        eatk: "0",
        friendlyId: "0",
        equipId: "0",
        battleCancelSwitch: "false"
    };
    getData(uid,os);
    document.getElementById("idLabel").innerText=uid;
    document.getElementById("osLabel").innerText=os;

    function getData(uid, os) {
        var XHR= new XMLHttpRequest();
        XHR.open("post","getData.php",false);
        XHR.setRequestHeader("Content-Type","application/x-www-form-urlencoded;charset=UTF-8");
        XHR.onreadystatechange=function () {
            var res=XHR.responseText;
            if(XHR.status === 200 && XHR.readyState === 4 && res !== "false"){
                let data=JSON.parse(res);
                console.log(data);

                document.getElementById("deadlineLabel").innerText=data["deadline"];

                mainSwitch=data["mainSwitch"];
                if(mainSwitch === "true"){
                    newData.mainSwitch="true";
                }
                newData.uhp=data["uhp"];
                newData.uatk=data["uatk"];
                tdLvSwitch=data["tdLvSwitch"];
                if(tdLvSwitch === "true"){
                    newData.tdLvSwitch="true";
                }
                skillLvSwitch=data["skillLvSwitch"];
                if(skillLvSwitch === "true"){
                    newData.skillLvSwitch="true";
                }
                newData.skillId1=data["skillId1"];
                newData.skillId2=data["skillId2"];
                newData.skillId3=data["skillId3"];
                newData.ehplimit=data["ehplimit"];
                newData.ehp=data["ehp"];
                newData.eatk=data["eatk"];
                newData.friendlyId=data["friendlyid"];
                newData.equipId=data["equipid"];
                battleCancelSwitch=data["battleCancelSwitch"];
                if(battleCancelSwitch === "true"){
                    newData.battleCancelSwitch="true";
                }
            }else{
                alert("此帐号未绑定");
                window.location.href="./index.php";
            }
        };
        XHR.send("uid="+uid+"&os="+os);
    }

    function setData(data) {
        var XHR= new XMLHttpRequest();
        XHR.open("post","setData.php",true);
        XHR.setRequestHeader("Content-Type","application/x-www-form-urlencoded;charset=UTF-8");
        XHR.onreadystatechange=function () {
            var res=XHR.responseText;
            if(XHR.status === 200 && XHR.readyState === 4 && res === "success"){
                document.getElementById("applyButton").disabled=false;
                layer.msg("应用成功");
            }else if(res === "error"){
                document.getElementById("applyButton").disabled=false;
                layer.msg("应用失败");
            }
            document.getElementById("applyButton").innerHTML="应 用";
        };
        XHR.send("data="+data);
    }

    layui.use("form", function(){
        var form = layui.form;
        form.val("configForm", {
            "mainSwitch": str2bool(newData.mainSwitch),
            "uhp": newData.uhp,
            "uatk": newData.uatk,
            "tdLvSwitch": str2bool(newData.tdLvSwitch),
            "skillLvSwitch": str2bool(newData.skillLvSwitch),
            "skillId1": newData.skillId1,
            "skillId2": newData.skillId2,
            "skillId3": newData.skillId3,
            "ehplimit": newData.ehplimit,
            "ehp": newData.ehp,
            "eatk": newData.eatk,
            "friendlyId": newData.friendlyId,
            "equipId": newData.equipId,
            "battleCancelSwitch": str2bool(newData.battleCancelSwitch)
        });
        form.on('select()', function(data){
            newData[data.elem.name]=data.value;
        });
        form.on("switch()", function(data){
            newData[data.elem.name]=data.elem.checked.toString();
        });
        form.on("submit()", function(data){
            document.getElementById("applyButton").disabled=true;
            document.getElementById("applyButton").innerHTML="正在提交";

            document.getElementById("uhp").value=document.getElementById("uhp").value.replace(/[^\d]/g,"");
            if(document.getElementById("uhp").value.length===0){
                document.getElementById("uhp").value="0";
            }else if(document.getElementById("uhp").value.length>8){
                document.getElementById("uhp").value="99999999";
            }
            document.getElementById("uatk").value=document.getElementById("uatk").value.replace(/[^\d]/g,"");
            if(document.getElementById("uatk").value.length===0){
                document.getElementById("uatk").value="0";
            }else if(document.getElementById("uatk").value.length>8){
                document.getElementById("uatk").value="99999999";
            }
            document.getElementById("ehplimit").value=document.getElementById("ehplimit").value.replace(/[^\d]/g,"");
            if(document.getElementById("ehplimit").value.length===0){
                document.getElementById("ehplimit").value="0";
            }
            document.getElementById("ehp").value=document.getElementById("ehp").value.replace(/[^\d]/g,"");
            if(document.getElementById("ehp").value.length===0){
                document.getElementById("ehp").value="0";
            }else if(document.getElementById("ehp").value.length>8){
                document.getElementById("ehp").value="99999999";
            }
            document.getElementById("eatk").value=document.getElementById("eatk").value.replace(/[^\d]/g,"");
            if(document.getElementById("eatk").value.length===0){
                document.getElementById("eatk").value="0";
            }else if(document.getElementById("eatk").value.length>8){
                document.getElementById("eatk").value="99999999";
            }
            newData.uid=uid;
            newData.os=os;
            newData.uhp=document.getElementById("uhp").value;
            newData.uatk=document.getElementById("uatk").value;
            newData.ehplimit=document.getElementById("ehplimit").value;
            newData.ehp=document.getElementById("ehp").value;
            newData.eatk=document.getElementById("eatk").value;
            setData(JSON.stringify(newData));
            console.log(newData);
            return false;
        });
    });

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

    function str2bool(data) {
        if(data.toLowerCase() === "true"){
            return true;
        }else{
            return false;
        }
    }
    
    function changeId() {
        window.location.href="./changeId.php?os="+os+"&uid="+uid;
    }

</script>

</body>
</html>