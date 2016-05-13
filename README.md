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

写好了导航栏`navbar`,感谢凯哥[rvum][1]帮忙解决问题.

问题: 看视频上可以一键引入bootstrap, 不知道怎么做到的, 百度无果

###2016年05月13日

将路径包上了`url`函数, 也就是变成了绝对路径, 看其他代码都是这样写, 不知道为什么.

完成了简单的创建文章和管理文章页面, 其实很简单,但对毫无前端美感的人来说是个励志的故事...

####关于创建文章逻辑

有两种写法

第一种比较传统 参考https://github.com/yccphp/laravel-5-blog/blob/master/app/Http/Controllers/backend/ArticleController.php
将接收参数的处理和数据的添加写在控制器的store()方法中, 简单明了.

第二种参考http://laravelacademy.org/post/2358.html
在request中添加了postFillData()方法来处理字段, 减少了store中的代码.
小菜表示不知道这两种那个好, 但感觉接收参数放在request(响应)请求里比较合乎常理,所以这样写了

调试时发现提示`MassAssignmentException`错误
在Content模型类中加入
```
protected $fillable = array('title', 'text', 'author', 'last_edit_time');
```
后解决

更改了AuthController, 禁止普通用户注册, 参考http://laravelacademy.org/post/2279.html
有时间应该读读Auth的代码.


问题:
 1. Auth->user()返回的是一个类,暂时没发现返回名字字符串的方法(使用id Auth::id(), 返回一个数(弱类型语言只能这么理解))
 2. 一开始字段不是text而是content(和数据库字段不同) $request->content 内容为提交的所有东西, 暂时不知道为什么.



[1]: https://github.com/rvum