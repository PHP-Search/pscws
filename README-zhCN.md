SCWS: Simple Chinese Word Segmentation
======================================
PSCWS4 是 SCWS 的纯 PHP 实现，SCWS 是 PHP 的一个 C 扩展。
本项目 fork 自 [wxkxklmyt/pscws4]。

[wxkxklmyt/pscws4]: https://github.com/wxkxklmyt/pscws4


关于 SCWS
---------
一套基于词频词典的机械式中文分词引擎。
更多信息，请访问 [官方网站][official] 和 [github 版本库][github-repo]。

[official]: http://www.xunsearch.com/scws/
[github-repo]: https://github.com/hightman/scws


About PSCWS
-----------
官网上的 PSCWS4 文档: http://www.xunsearch.com/scws/docs.php#pscws4


### 安装
```
composer require wxkxklmyt/pscws4
```

### 使用
```
/**
 * SCWS中文分词
 *
 * @param string $text 分词字符串
 * @param number $number 权重高的词数量(默认5个)
 * @param string $type 返回类型,默认字符串
 * @param string $delimiter 分隔符
 * @return string|array 字符串|数组
 */
$scws = new Scws();
$scws -> scws('能做到柔和、善解、忍辱，才有办法与人结好缘。——证严法师《静思语》');
```

结果: `静思 善解 法师 柔和 做到`

1. 默认返回结果为字符串，返回字符串支持自定义分隔符，默认为空格
2. 支持返回结果为数组
3. 支持返回词数量自定义，默认为5个


权利声明：
=========
所有权利归原始作者和代码贡献者所有。
