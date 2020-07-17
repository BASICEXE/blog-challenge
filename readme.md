# ブログ作成チャレンジ

## 仕様技術一覧

- docker (local)
- laravel 6.*
- laravel mix
  1. JavaScript es6
    1. ckeditor5
  2. scss
    1. bootstrap4


## 開発環境のセットアップ

gitでクローンすること
dockerをインストールすること
docker-composeが使用できること
composerが使用できること

1. git clone
2. .envの設定を書き換え
3. 下記コマンドを実行

```
$ docker-compose up -d
$ cd www
$ composer install
```

