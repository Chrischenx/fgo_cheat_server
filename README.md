# FGO封包修改服务器代码

**本代码不能直接使用**

## 1、开源协议 [Unlicense](<http://unlicense.org>)

你们爱干嘛干嘛和我没关系, 任何问题不要找我, 以后我也不会更新

## 2、简介

需要用到`mitmproxy`和`php`

mitmproxy用作代理服务器, php用来处理数据

python文件夹是使用纯python(mitmproxy)实现，无需php

web文件夹是设置功能的网页页面

## 3、使用说明

安装mitmproxy后使用如下命令后台运行代理服务器(Linux平台)

```bash
nohup mitmdump -p 8080 -s proxy.py >/dev/null 2>&1 &
```

端口修改请自行修改`-p`后的参数

调用php修改数据的请求接口请在`proxy.py`里进行修改

数据处理请修改php代码, `BattleCancel.php`是撤退胜利, `BattleSetup.php`是进入战斗和重连战斗

## 4、数据说明

连接数据库等等东西自己改php代码

|变量|数据说明|
|:--:|:-----:|
|$config["enabled"]|科技开关|
|$config["uhp"]|己方血量|
|$config["uatk"]|己方攻击力|
|$config["tdlv5"]|宝具等级Lv.5|
|$config["skilllv10"]|英灵技能310|
|$config["skillid1"]|修改英灵1技能|
|$config["skillid2"]|修改英灵2技能|
|$config["skillid3"]|修改英灵3技能|
|$config["ehp"]|敌方血量|
|$config["eatk"]|敌方攻击力|
|$config["friendlyid"]|助战替换|
|$config["equipid"]|礼装替换|
|$config["battlecancel"]|撤退胜利开关|

生命值和血量均为具体数值, 非倍数, 需要倍值的自己改代码

## 5、转换代理方式

mitmproxy本身支持使用socks5代理, `proxy.py`中第6行写了, 默认注释, 取消注释即可

```python
load.add_option("mode", str, "socks5", "set proxy mode")
```

其它方案使用`iptables`, 具体实现方法自己研究
