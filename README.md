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
 1. (已解决:Auth->user()->name就是...)Auth->user()返回的是一个类,暂时没发现返回名字字符串的方法(使用id Auth::id(), 返回一个数(弱类型语言只能这么理解))
 2. 一开始字段不是text而是content(和数据库字段不同) $request->content 内容为提交的所有东西, 暂时不知道为什么.



[1]: https://github.com/rvum


###2016年05月14日


####完成了管理文章页面

在blade中使用分页`$content->render()`时发现

使用{{ $content->render }}时输出

```
&lt;ul class=&quot;pagination&quot;&gt;&lt;li class=&quot;disabled&quot;&gt;&lt;span&gt;&laquo;&lt;/span&gt;&lt;/li&gt; &lt;li class=&quot;active&quot;&gt;&lt;span&gt;1&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;a href=&quot;http://localhost:8000/admin/content?page=2&quot;&gt;2&lt;/a&gt;&lt;/li&gt;&lt;li&gt;&lt;a href=&quot;http://localhost:8000/admin/content?page=3&quot;&gt;3&lt;/a&gt;&lt;/li&gt; &lt;li&gt;&lt;a href=&quot;http://localhost:8000/admin/content?page=2&quot; rel=&quot;next&quot;&gt;&raquo;&lt;/a&gt;&lt;/li&gt;&lt;/ul&gt;
//页面为
 <ul class="pagination"><li class="disabled"><span>&laquo;</span></li> <li class="active"><span>1</span></li><li><a href="http://localhost:8000/admin/content?page=2">2</a></li><li><a href="http://localhost:8000/admin/content?page=3">3</a></li> <li><a href="http://localhost:8000/admin/content?page=2" rel="next">&raquo;</a></li></ul>
```
 改用{!! $content->render() !!} 后浏览器正常解析

 这是因为 {!!  !!} 会对输出进行解析 而 {{  }} 会对输出进行转义
 在这个教程里有提到过https://laracasts.com/series/laravel-5-fundamentals

使用Carbon类美化时间参考http://laravel5-book.kejyun.com/package/tool/package-tool-carbon.html
输出时用
```
\Carbon\Carbon::parse($content->created_at)->format('Y-m-d H:i')
```
将秒去掉了.

问题
 1. 表格对其问题,想让其他列固定,只有标题列长度浮动,不知道怎么弄
 2. 还有就是不知道如果自己需要写css怎么和bootstrap一起.


###2016年05月15日

####细节修改

在Content Model上添加
```
protected $dates = ['last_edit_time'];
```
使自己添加的字段'last_edit_time'被解析成Carbon类的形式,方便操作

看了修改器, 想改一下, 结果2b的在request里改半天.. 这玩意应该放在model里, 类似java的set 和 get方法, 通过追踪可以发现Model.php里有setAttribute方法.
关于动态修改Query Scope, 没看懂..
参考
http://laravelacademy.org/post/146.html
https://laravist.com/article/16
https://laracasts.com/series/laravel-5-fundamentals/episodes/11
http://blog.qiji.tech/archives/2578

问题:
 1. 作者为0时会抛异常,直接error了, 不知道怎么处理.


###2016年05月16日

####添加文章  增加错误提示

####添加关联模型方法

参考https://phphub.org/topics/364
一开始报错, 找了半天也没找到答案, 后来百度了下http://stackoverflow.com/questions/18084310/laravel-class-not-found-with-one-to-many  按这种方法加上绝对路径 解决

注意 hasMany 和 belongsTo 方法的参数是不一样的, 因为文章用的是cid(略蛋疼, find方法都不能用)而不是id , 所以一开始写的是cid, 报错 总不明白哪错了, 后来追踪了下代码, 明白了, 具体不说了, 可以追踪下代码看看

问题:
 1. 是简单了不少, 但一下把user表的类拿过来, 安全吗?
 2. 效率呢?


###2016年05月17日

####完成编辑文章

将创建文章和编辑文章共用, 发现问题, 编辑文章需要变量, 可以在页面上用isset()方法解决.或者中间件?(不会)
参考https://segmentfault.com/q/1010000004513381

一开始因为content表的主键不是id而各种蛋疼, 后来看了看Model类的源代码, 发现
```
protected $primaryKey = 'id';
```
后将content模型的`$primaryKey`设置为'cid', 完美解决


###2016年05月18日
增加了metas表, 准备把标签和分类(栏目)一块写, 创建和管理也写一块.

###2016年05月19日

####完成了分类部分

问题
 1. 在CategoryController中 index()方法和 edit()方法都传入了category的列表, 感觉这是一种浪费, 应该可以合并到一起. 尝试了用iframe , 失败..


###2016年05月20日

####完成标签创建

问题:
 1. 管理标签分级那一堆冗余代码, 不知道如何处理

###2016年05月21日

####完成标签修改

一开始删除标签的button没有定义动作, 但效果和submit一样, 也就是删除标签和创建标签效果一样, 好尴尬.
后来问凯哥, 发现黑科技, 把button标签换成a标签, class不变, 完美解决.

###2016年05月22日

####完成最最最最基本的上传

###2016年05月23日

####先完成了文件管理视图
先提交了, 跑步去


###2016年05月24日

文件管理写不出来, 无耻的抄袭了http://laravelacademy.org/post/2333.html#ipt_kb_toc_2333_4的manager类