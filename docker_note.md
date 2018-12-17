# docker常用指令

### 1.docker启动命令,docker重启命令,docker关闭命令

	* 启动 systemctl start docker

	* 护进程重启 sudo systemctl daemon-reload

	* 启动docker服务 systemctl restart  docker

	* 启动docker服务 sudo service docker restart

	* 关闭 docker service docker stop 


## setup 1：

	从github上拉去laradock项目
git clone https://github.com/laradock/laradock.git

## setup 2：

	进入laradock文件夹，重命名或者复制 env-example 到 .env文件

## setup 3：

	编辑.env文件（这个.env文件是对环境信息的一些配置）。在这里对.env文件里一些配置信息做个简单说明：
	1. APPLICATION=../ 设置docker-compose基础目前映射 比如：容器里的 /var/www目录映射到上级目录
	2. PHP_VERSION=71 使用环境的php版本号。这里71表示7.1版本。之后在安装的过程中，php-fpm和php-cli安装版本都会引用这个变量。
3.PHP_INTERPRETER=php-fpm 使用php的解释引擎，这儿有两个参数可以选择（hhvm php-fpm）
	4. DATA_SAVE_PATH=~/.laradock/data 数据保存目录。这儿的意思是：容器里的数据目录映射到宿主机哪个目录。
	5. DOCKER_HOST_IP=10.0.75.1 设定docker内部网络ip
备注：简单的介绍几个配置说明，建议同学们有时间可以把该配置文件读一遍，能理解每一个参数的含义，这样有助于搭建docker-compose环境。还有同学们只需要知道这个.env文件是对docker-compose构建容器时候，提供的一些参数即可。很像laravel的 .env文件
对了，.env文件还有这下面的一些参数呢，它的意思就是具体对某一个容器的设置了。
	例如：
	PHP_FPM_INSTALL_XDEBUG=false
	PHP_FPM_INSTALL_MONGO=false
	PHP_FPM_INSTALL_MSSQL=fals
	比如这些就是设定在php-fpm容器中中是否安装xdebug，mongo扩展这些。 （建议同学们下来自己看看，由于文章篇幅原因我只复制了一点点内容。因为是教程的原因，我这里也不作更改，使用默认的配置即可。)
	在这里再介绍下: docker-compose.yml文件， 这个文件是对具体容器的配置，还需要熟悉一些yml文件的一些语法。不过没关系，我会在文章后面附上docker和docker-compose的学习地址。
## setup 4：

	运行： docker-compose up -d mysql nginx
	参数 up 表示启动容器 -d 表示后台运行
	第一次构建会有点慢，因为它要拉取数据。
## setup 5：

	访问服务器ip，如果出现404，说明就能够正常访问了。现在我们去laradock/nginx/sites/目录下，修改或者添加后缀为conf文件。
	修改default.conf文件，把网站www目录修改到项目目录即可。这儿需要注意一点的是：最开始提到的.env文件 APPLICATION参数所配置的映射目录,就是宿主机与容器的目录映射关系。  	
