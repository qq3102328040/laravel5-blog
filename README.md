# laravel5-blog

##简言
php初学者, 基础还没啥呢就作死开看laravel, 想写个博客玩玩, 顺便记录一下过程.

## 编写日志

###2016年05月12日

完成了简单的登陆页面, laravel5自带的`auth`默认登陆的表单字段是`email`,通过追踪源代码发现
```
return property_exists($this, 'username') ? $this->username : 'email';
```
在`AuthenticatesUsers`类下添加
```
protected $username = 'name';
```
即可实现使用用户名登陆.

前端还是不会,登陆页面粘的bootstrap的模板,值得注意的是`style`标签要在`link`标签之后达到对bootstrap覆盖的效果.
更新:把style换成了link,放在public的单独文件里,发现不可用,加入
```
rel="stylesheet"
```
后正常, 百度到这是告诉浏览器怎么去编码 http://www.w3school.com.cn/tags/att_link_rel.asp

写好了导航栏`navbar`,感谢凯哥帮忙解决问题.

问题: 看视频上可以一键引入bootstrap, 不知道怎么做到的, 百度无果

###2016年05月13日

将路径包上了`url`函数, 也就是变成了绝对路径, 看其他代码都是这样写, 不知道为什么.

完成了简单的创建文章和管理文章页面, 其实很简单,但对毫无前端美感的人来说是个励志的故事...

