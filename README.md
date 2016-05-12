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

写好了导航栏`navbar`,感谢凯哥帮忙解决问题.