# Git configuration

## Git

Конфигурация в файле `~/.gitconfig`.

## GPG

Качаем сайта https://gnupg.org/ на хостовую машину Windows Gpg4win.

На WSL2 машину устанавливается GnuPG.  
Файлы конфигурации `~/.gnupg/gpg.conf` и `~/.gnupg/gpg-agent.conf` есть в примере.

На Mac для pinentry program прописать

```bash
echo "pinentry-program /opt/homebrew/bin/pinentry-mac" >> ~/.gnupg/gpg-agent.conf 
killall gpg-agent
```

Для правильной работы gpg:

```shell
> export GPG_TTY=$(tty)
> chown -R $(whoami) ~/.gnupg/
> find ~/.gnupg -type f -exec chmod 600 {} \;
> find ~/.gnupg -type d -exec chmod 700 {} \;
> echo "test" | gpg --clearsign
```

Список ключей:

```bash
# Список публичных ключей
> gpg -k

# Список приватных ключей
> gpg -K
```

Сгенерировать ключ:

```shell
> gpg --full-generate-key
```

Указал значения: `Anatoly Soldatov` `soldatov.anatoly@gmail.com`.

Получить список ключей:

```shell
> gpg --list-secret-keys --keyid-format LONG
```

Получить список приватных ключей с субключами. Приватный ключ - секция sec.

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

```shell
> echo "test" | gpg --clearsign
```

Проверить работу gpg. Подписывает текст "test". Ключ опция --clearsign говорит, что результат вернуть в консоль в читаемом виде.
