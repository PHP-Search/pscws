SCWS: Simple Chinese Word Segmentation
======================================
PSCWS4 is a pure PHP implention of SCWS, which is a C-extension for PHP.
This project is a fork of [wxkxklmyt/pscws4].

[wxkxklmyt/pscws4]: https://github.com/wxkxklmyt/pscws4


About SCWS
----------
SCWS is a dictionary-based Chinese word segmentation library.
For more information, please visit [official site][official] and [github-repo][github-repo].

[official]: http://www.xunsearch.com/scws/
[github-repo]: https://github.com/hightman/scws


About PSCWS
-----------
The official documentation can be found here: http://www.xunsearch.com/scws/docs.php#pscws4

### Installation
```
composer require wxkxklmyt/pscws4
```

### Usage
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

The result is: `静思 善解 法师 柔和 做到`

1. Return type defaults to string, words are connected by delimeter char which is space by default.
2. It's supported to make return type an array.
3. Number of return words can be customized and the default num is 5.


CopyRights
==========
All Rights reserve to the original author and contributors.
