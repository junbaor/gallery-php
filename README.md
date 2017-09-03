# gallery-php

> 练习 php 时写的图床, 使用七牛云存储  

### 注意  
敏感信息未删除, 但已失效.

### 使用
- 修改 `config.php` 中 myslq 数据库信息
- 修改 `save.php`  中七牛云 accessKey、secretKey 以及图片的域名

### 表结构

```
CREATE TABLE `oauth_img` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `imgname` varchar(100) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk

CREATE TABLE `oauth_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `head` varchar(100) DEFAULT NULL,
  `open_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk
```
> 当时接入了 QQ 登陆, 所以有 oauth_user 表

### 截图
![](https://raw.githubusercontent.com/junbaor/gallery-php/master/screenshot/1.png)
![](https://raw.githubusercontent.com/junbaor/gallery-php/master/screenshot/2.png)
