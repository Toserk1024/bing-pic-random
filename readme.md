### 一.调用方式
 <figure><table><thead><tr><th>参数</th><th>是否必填</th><th>值</th><th>输出</th></tr></thead><tbody><tr><td rowspan="4">type</td><td rowspan="4">否</td><td>无（默认）</td><td>1920*1080</td></tr><tr><td>m</td><td>1080*1920</td></tr><tr><td>uhd</td><td>原图</td></tr><tr><td>auto</td><td>UA自动判断</td></tr><tr><td rowspan="2">return</td><td rowspan="2">否</td><td>无（默认）</td><td>302重定向</td></tr><tr><td>server</td><td>直接输出</td></tr></tbody></table><figcaption>无效的参数将归为默认值</figcaption></figure>
 
### 二.部署方式
 #### 1.PHP虚拟主机：
 (1)下载'index.php'与'bing-ids.txt'文件<br>
 (2)上传文件至同一目录下，使用即可
 
 #### 2.Cloudflare Worker部署：
 (1)复制'cloudflare-worker.js'内容并部署<br>
 (2)创建一个KV储存，名称任意<br>
 (3)KV储存中创建条目，密钥为'bing-ids'，值需要填写'bing-ids.txt'中的内容<br>
 (4)将KV储存与你所创建的worker进行绑定，变量名称需要填写'DATA'(注意区分大小写)<br>
 (5)设置路由，使用即可