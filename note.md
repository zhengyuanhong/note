# git常用指令

### 1.基本操作
git init //初始化

git add <file> //把file(文件)添加到仓库

注意：如果在windows下git提交遇到warning: LF will be replaced by CRLF in 需要 git config --global core.autocrlf false

git commit -m "添加说明" //把file(文件)提交到仓库

git status //查看仓库当前的状态

git diff //查看与上一次的不同之处

### 2.版本退回指令

git log //查看历史记录

git reset --hard HEAD^ //退回上衣版本

git reset --hard [commit id(log中的id号)]//退回指定的版本

git reflog //记录每一次命令

git checkout -- file //file文件在工作区的修改全部撤销

git rm file //删除版本库中文件同时提交 要使用 git commit 命令提交

### 3.添加远程库并推送

git remote add <name> git@github.com:zhengyuanhong/note.git  //远程仓库与本地仓库关联<name>名字自定义(注意：仓库名字改成自己的)

git push -u <name> master //把本地仓库的所有内容推送到远程仓库上(第一次要使用的命令)之后就直接使用 git push <name> master 推送

注意：在push过程中如果出现error: failed to push some refs to 需要使用git pull --rebase origin master这条指令的意思是把远程库中的更新合并到本地库中，–rebase的作用是取消掉本地库中刚刚的commit，并把他们接到更新后的版本库之中。

### 4.克隆远程仓库的项目

git clone git@github.com:zhengyuanhong/note.git  //克隆远程项目

# git最佳实践

### 1.本地设置

git config --global user.name "zhengyuanhong" //设置本地用户名

git config --global user.email zhengyuanhong@example.com //设置本地邮箱

### 2.远程已经存在项目，然后同步到本地

	* 本地建立同名目录
	* 初始化 git init
	* 添加远程路径 git remote add url_address
	* 将远端代码拉取到本地 git pull origin master 将远端的master分支拉取到本地。 
	* 这一步也可以分解为两步：git fetch origin git merge origin 先拉取后合并
	* 在项目路径下，一般需要.gitignore文件用于指定忽略那些文件。
	* 修改文件后推送到远端。需要设置上游 git push --set-upstream gittest master


### 3.本地有项目，想要存放在远程

	* 本地建立同名目录
	* 初始化 git init
	* 在远端建立同名项目
	* 添加远程路径 git remote add url_address
	* 将远端拉取到本地 git fetch origin ，合并远端和本地分支，由于这时远端和本地没有历史关联，需要使用 git merge --allow-unrelated-histories origin
	之后就可以进行推送了。

## 冲突

 在合并时会出现冲突，这时需要手动解决冲突，并提交。 
 冲突产生后，冲突文件会显示以下标记<<<<<<<与=======之间是本地修改的内容，=======与>>>>>>>之间是远程修改的内容 
 根据这个，对冲突文件进行编辑，在修改完之后，重新commit以下就可以了。


 如果想把本地的某个分支test提交到远程仓库，并作为远程仓库的master分支，或者作为另外一个名叫test的分支，那么可以这么做。

 git push origin test:master // 提交本地test分支作为远程的master分支 
 git push origin test:test // 提交本地test分支作为远程的test分支

 如果想删除远程的分支呢？类似于上面，如果:左边的分支为空，那么将删除:右边的远程的分支。

 git push origin :test // 刚提交到远程的test将被删除，本地还会保存的



