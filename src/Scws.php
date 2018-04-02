<?php

/*
 * SCWS: Simple Chinese Word Segmentation.
 *
 * PSCWS4 is a pure PHP implention of SCWS, which is a C-extension for PHP.
 * This project is a fork of https://github.com/wxkxklmyt/pscws4.
 *
 * (c) hightman <MingL_Mar@msn.com>
 *     wxkxklmyt <519468341@qq.com>
 *     masterwto <masterwto@163.com>
 *
 * The original SCWS is wirtten by hightman (马明练), see:
 * https://github.com/hightman/scws
 *
 * The PSCWS4 library is wirtten by hightman, released at
 * http://www.xunsearch.com/scws/download.php
 *
 * The wxkxklmyt/pscws4 composer package is maintained by wxkxklmyt, see:
 * https://github.com/wxkxklmyt/pscws4
 *
 * All rights reserved by original author and contributors.
 */

namespace wxkxklmyt;

define('PATH', __DIR__);

class Scws
{
    /**
     * SCWS中文分词.
     *
     * @param string $text      分词字符串
     * @param number $number    权重高的词数量(默认5个)
     * @param string $type      返回类型,默认字符串
     * @param string $delimiter 分隔符
     *
     * @return array|string 字符串|数组
     */
    public function scws($text = '', $number = 5, $type = true, $delimiter = ' ')
    {
        if (empty($text)) {
            return $text;
        }

        $scws = new PSCWS4();
        $scws->set_dict(PATH.'/lib/dict.utf8.xdb');
        $scws->set_rule(PATH.'/lib/rules.utf8.ini');
        $scws->set_ignore(true);
        $scws->send_text($text);
        $words = $scws->get_tops(5);
        $scws->close();

        $tags = [];
        foreach ($words as $k => $val) {
            $tags[] = $val['word'];
        }

        return true === $type ? implode($delimiter, $tags) : $tags;
    }
}
