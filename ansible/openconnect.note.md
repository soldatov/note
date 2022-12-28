# Установка openconnect на Mac

## Установить
> brew install openconnect

## Проверить работу openconnect, для теста
> sudo openconnect --user an.soldatov --protocol=anyconnect vpn.ffin.ru

## Удалить сиську
> sudo /opt/cisco/anyconnect/bin/vpn_uninstall.sh

## Записать креды в файл
> echo "mypassword" > ~/.vpn_creds
> chmod 600 ~/.vpn_creds


## Разрешить запуск без пароля для sudo (не заработало)
> sudo sh -c 'echo "%admin ALL=(ALL) NOPASSWD: /usr/local/bin/openconnect" > /etc/sudoers.d/openconnect'

## Добавить в .zshrc
```
function vc() {
  local VPN_HOST=vpn.ffin.ru
  local VPN_USER=an.soldatov

  if [ ! -f ~/.vpn_creds ]; then
    echo "Error: missing ~/.vpn_creds"
    return
  fi
  echo "Starting the vpn ..."
  echo $(cat ~/.vpn_creds) | sudo openconnect --background --passwd-on-stdin --user=$VPN_USER $VPN_HOST
}

function vd() {
  sudo kill -2 `pgrep openconnect`
}
```
