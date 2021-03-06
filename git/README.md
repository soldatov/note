# Git configuration

## GPG

Для правильно работы gpg:

```shell
> export GPG_TTY=$(tty)
> chown -R $(whoami) ~/.gnupg/
> find ~/.gnupg -type f -exec chmod 600 {} \;
> find ~/.gnupg -type d -exec chmod 700 {} \;
> echo "test" | gpg --clearsign
```

Сгенерировать ключ:

```shell
> gpg --full-generate-key
```

Указал значения: `Anatoly Soldatov` `soldatov.anatoly@gmail.com`.

Получить список ключей:

```shell
> gpg --list-secret-keys
```

Получить приватный ключ. В секции `sec`. В примере это `XX16XX16XX16XX16`.

```shell
> gpg --list-secret-keys --keyid-format LONG soldatov.anatoly@gmail.com
sec   rsa2048/XX16XX16XX16XX16 2020-09-06 [SC] [expires: 2022-02-22]
```

Для сторонних сервисов, например github, нужен публичный ключ.
Чтобы сгенерировать публичный ключ:

```shell
> gpg --armor --export XX16XX16XX16XX16
```

Результат - публичный ключ, созданный от приватного ключа.