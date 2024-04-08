

# 環境構築
1. コンテナの立ち上げ
```
make up
````

2. コンテナ停止
```
make down
```

# sailエイリアスの設定
デフォルトでSailコマンドはvendor/bin/sailスクリプトを使用して起動するので、これを簡単に実行できるようにしたい方
```
$ alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'
```
これにより
```
$ sail up
```
でsailが起動できる
