from mitmproxy import http
import json
import base64
import urllib

def load(load):
    load.add_option("block_global", bool, False, "disable block_global")
    #load.add_option("mode", str, "socks5", "set proxy mode")

def response(flow: http.HTTPFlow) -> None:
    if flow.request.url.find("ac.php") > -1 :
        query_key = flow.request.urlencoded_form['key']
        if query_key == "battlesetup" or query_key == "battleresume" :
            body_bytes = flow.response.content
            body_str = str(body_bytes, encoding='utf-8')
            body_str = urllib.parse.unquote(body_str)
            base64_decrypt = str(base64.b64decode(body_str), encoding='utf-8')
            json_data = json.loads(base64_decrypt)

            Num = len(json_data["cache"]["replaced"]["battle"][0]["battleInfo"]["userSvt"])
            friendNum = len(json_data["cache"]["replaced"]["battle"][0]["battleInfo"]["myDeck"]["svts"])
            equipNum = len(json_data["cache"]["replaced"]["battle"][0]["battleInfo"]["myUserSvtEquip"])
            battleNum = len(json_data["cache"]["replaced"]["battle"][0]["battleInfo"]["enemyDeck"])
            i=0
            enemyNum=0
            while i < battleNum :
                enemyNum = enemyNum + len(json_data["cache"]["replaced"]["battle"][0]["battleInfo"]["enemyDeck"][i]["svts"])
                i+=1

            with open("./options.json", 'r') as f:
                options=json.loads(f.read())
            
            if options["main"] :
                i=0
                i=friendNum+equipNum
                while i < Num :
                    if options["eHp"]!='0' and options["eHp"]!="" :
                        json_data["cache"]["replaced"]["battle"][0]["battleInfo"]["userSvt"][i]["hp"]=options["eHp"]
                    if options["eAtk"]!='0' and options["eAtk"]!="" :
                        json_data["cache"]["replaced"]["battle"][0]["battleInfo"]["userSvt"][i]["atk"]=options["eAtk"]
                    i+=1
                
                i=0
                while i < friendNum :
                    if options["uHp"]>'0' and options["uHp"]!="" :
                        json_data["cache"]["replaced"]["battle"][0]["battleInfo"]["userSvt"][i]["hp"]=options["uHp"]
                    if options["uAtk"]>'0' and options["uAtk"]!="" :
                        json_data["cache"]["replaced"]["battle"][0]["battleInfo"]["userSvt"][i]["atk"]=options["uAtk"]
                    if options["tdLv"] :
                        json_data["cache"]["replaced"]["battle"][0]["battleInfo"]["userSvt"][i]["treasureDeviceLv"]="5"
                    if options["skillLv"] :
                        json_data["cache"]["replaced"]["battle"][0]["battleInfo"]["userSvt"][i]["skillLv1"]="10"
                        json_data["cache"]["replaced"]["battle"][0]["battleInfo"]["userSvt"][i]["skillLv2"]="10"
                        json_data["cache"]["replaced"]["battle"][0]["battleInfo"]["userSvt"][i]["skillLv3"]="10"
                    i+=1
                
                json_data["sign"]=getDataSign()

                body_str = json.dumps(json_data).replace(" ","")
                base64_encrypt = str(base64.b64encode(bytes(body_str, encoding='utf-8')), encoding='utf-8')
                body_str = urllib.parse.quote(base64_encrypt)
                body_bytes = bytes(body_str, encoding='utf-8')
                flow.response.content = body_bytes
