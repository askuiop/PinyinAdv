# PinyinAdv

# 简易的拼音转换...small & fast

## 安装
使用 Composer 安装:

```
composer require "askuiop/pinyinadv: dev-master"
```

## 使用

```
$py = Askuiop\Pinyinadv\PinyinAdv::get("诺基亚：今天我们不谈手机，谈谈5G");

nuojiya：jintianwomenbutanshouji，tantan5G

$pyAndFirstLetter = Askuiop\Pinyinadv\PinyinAdv::get("诺基亚：今天我们不谈手机，谈谈5G", true);

nuojiya：jintianwomenbutanshouji，tantan5G|njyjtwmbtsjtt
```

