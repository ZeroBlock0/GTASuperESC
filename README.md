# [Switch to English](./README_en.md)
# GTASuperESC
一键结束进程或断网，支持多人联机一人按键一起结束进程或断网，做游戏挑战用的，比如GTA5的犯罪之神(首脑)挑战，要求不能死，但有人死后全队迅速关游戏，在上传数据之前关掉游戏，挑战进度就不会清空！用本软件就可以实现其中一人按键四人一起关游戏，不局限于GTA5，其他游戏或软件也可以使用。  
可修改快捷键，按键后操作可以选择结束进程(可设置进程名,支持多进程)、禁用网卡与进程断网，多种网络连接方式，操作简单，一键创建房间(服务器)就能联机！  
This software also supports English, but it is translated by Google, and the translation quality may be poor.  
  
# 官网：https://gse.wgzeyu.com  
  
软件引用了以下模块：  
精易模块 (源码：http://ec.125.la)  
WebSocketClient (源码：https://bbs.125.la/thread-14039123-1-1.html)  
UPnP模块v2 (源码：http://www.pudn.com/Download/item/id/2523129.html)  
CryptAPI (源码：https://bbs.125.la/thread-14033539-1-1.html)  
若以上地址打不开或不能下载可从这里下载模块及模块源码：https://pan.baidu.com/s/1BF9sCpZbrJ6gpP9eia81Kw  
  
## 新协议  
![协议](/img/protocol.png)
  
## 新房间号  
![房间号](/img/number.png)
  
## 旧协议  
传输封包=```文本_加密c(<body><hash>时间!随机数</hash>传输内容</body><md5>body标签内(包含标签)的MD5</md5>)```  
自动/手动创建房间，使用UDP或TCP传输时都是直接发送传输封包，加密后是字节集类型，不需要转换  
WebSocket是使用workerman-chat聊天室，发送内容就像这样：  
```{"type":"say","to_client_id":"all","to_client_name":"所有人","content":"Base64编码(传输封包)"}```  
  
## 旧房间号  
旧协议：  
一键创建房间的房间号:```?昵称!密码```,普通(手动创建)房间号:```地址:端口!密码```,自动创建房间号:```#混淆并Base64编码后的普通房间号```  
新协议：  
一键创建房间的房间号:```?昵称-密码```,普通(手动创建)房间号:```地址:端口-密码```,自动创建房间号:```#混淆并Base64编码后的普通房间号```  
  
# [Switch to English](./README_en.md)
