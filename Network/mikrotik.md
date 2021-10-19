# База знаний Mikrotik

## Firewall

### Firewall - Filter Rules

Список правил. Работают по принципу "Если (условие) то (действие)". Правила обрабатываются по порядку.
Пакет, отравленный в цепочку input, никогда не попадет в цепочку forward, и наоборот.
Поэтому порядок расположения правил в **Filter Rules** между цепочками не важен,
т.е. без разницы какие правила идут первыми input или forward.
Но для наглядности принято заполнять правила в порядке `input`, `forward`, и `output`.

Рекомендуется такой подход в `chain`:
* `input` - запрещено все, что не разрешено.
* `forward` - разрешено все, что не запрещено.
* `out`- все что исходит из роутера, по умолчанию легитимно. Но желателен контроль.

Описание полей правила:

* _General_
  * **Chain** - Цепочка прохождения пакетов.
    * `input` - пакеты, идущие в маршрутизатор.
    * `forward` - пакеты, идущие через маршрутизатор.
    * `output` - пакеты, исходящие из маршрутизатора.
  * **Src. Address** и **Dst. Address** - Адрес источника\назначения пакета. 
    Варианты: 192.168.0.1, 192.168.0.0/24, 192.168.0.1-192.168.0.9
  * **Protocol** - Протокол передачи. TCP, UDP, ICMP и т.п*.*
  * **Src. Port** и **Dst. Port** - Порт источника\назначения пакета. Варианты заполнения: 
    Один (21), перечисление (21,22), диапазон (1-100), перечисление диапазонов (1-100, 500-600). 
    Поле можно заполнить только если протокол соответствует TCP или UDP.
  * **Any Port** - Любой порт. Аналогично одновременной записи **Src. Port** и **Dst. Port**.
  * **In Interface** - Интерфейс, с которого пришел пакет. Не работает для **Chain** `output`.
  * **Out Interface** - Интерфейс, куда будет передан пакет. Не работает для **Chain** `input`.
  * **Packet Mark** - Значение маркировки пакета, когда пакет промаркирован, ранее, через Mangle.
  * **Connection Mark** - Значение маркировки соединения, когда соединение промаркировано, ранее, через Mangle.
  * **Connection Type** - Пакет относится к типу соединения. Смотри раздел **Firewall - Service Ports**.
  * **Connection State** - Пакет, помеченный **Connection tracker-ом**. Смотри раздел **Firewall - Connections**.
* _Advanced_ - На этой закладке собраны расширенные опции выбора пакета.
  * **Src. Address List** и **Dst. Address List** - Адрес источника\назначения совпадает с одним из адресов 
    в именованном списке адресов, заданном на закладке Firewall - Address Lists.
* _Extra_ - закладка продолжает список расширенных опций, не поместившихся на закладку Advanced.
  * **Time** - Позволяет ограничить время работы правила. По таймеру, дням недели и т.п.
* _Action_
  * **Action** - Фильтрация продолжается - continue. Фильтрация прекращается - stop.
    * `accept` (stop) - Разрешить пакет.
    * `drop` (stop) - Удалить пакет.
    * `reject` (stop) - Удалить пакет и отправить отправляющему узлу сообщение об ошибке.
      * **Reject With** - Каким сообщением ответить об ошибке.
        * `icmp network unreachable` - Пакет icmp. Код 0 - Network Unreachable (Сеть недоступна).
    * `tarpit` (stop) - Только для протокола TCP. Разрешается соединение, но скорость соединения будет равна 0. 
      Вызовет зависание атакующего хоста. Еще описание:
      Эмулировать наличие открытого порта. Используется для защиты от DoS, ввода в заблуждение и(иногда) отладке.
    * `log` (continue) - Занести информацию о пакете в Log-файл маршрутизатора. Фильтрация продолжается.
    * `passthrough` (continue) - Посчитать. Увеличатся счетчики пакетов и байт. Используют для статистики. Фильтрация продолжается.
    * `fasttrack connection` (continue) - Помечает пакет для быстрого прохождения минуя сложную маршрутизацию. Смотри FastTrack.
    * `add src to address list` и `add dst to address list` (continue) - Добавить адрес источника\назначения из пакета в заданный список.

### Firewall - NAT

* _Action_
  * **Action** - Цепочка прохождения пакетов. Обработка продолжается - continue. Обработка останавливается - stop.
    * `src-nat` (stop) - Подмена адреса отправителя на указанный.
    * `masquerade` (stop) - Частный случай src-nat, подменяет адрес отправителя на один из адресов с интерфейса. 
      Используется на динамических(dhcp, vpn) интерфейсах. Не рекомендуется использовать при наличии нескольких ip на интерфейсе.

### Firewall - Connections

**Connection tracker** имеет следующие состояния:

* enabled=yes - включен.
* enabled=no – отключен.
* enabled=auto – отключен, пока в firewall не появится правило использующее возможности conntrack. По умолчанию.

Каждое сетевое соединение в MikroTik относит к одному из 4 состояний:

* `new` – Новое соединение. Пакет, открывающий новое сетевое соединение, не связанное с имеющимися соединениями.
* `established` - Существующее соединение. Когда новому пакету удалось открыть соединение, 
  следующие пакеты внутри этого соединения имеют такое состояние.
* `related` - Пакет связан с соединением, но не является его частью. Например, ответ ICMP содержащий ошибку. 
  Еще объяснение: пакет относящийся к дополнительному соединению в мультипотоке (sip, pptp, ftp, ...).
* `invalid` - Маршрутизатор не может соотнести пакет ни с одним из вышеперечисленных состояний соединения. 
  Еще объяснение: пакет от неизвестного соединения.
* `untracked` - пакет не отслеживаемый **Connection tracker**.

Хорошим вариантом настройки фильтрации считается:

1. Обрабатывать новые соединения (**connection state** = `new`), принимая решение об пропуске или блокировке трафика.
2. Всегда пропускать соединения в состоянии `established`, `related` и `untracked`, 
   так как решение о пропуске этого трафика было принято на этапе обработки нового соединения.
3. Всегда блокировать паразитный трафик (**connection state** = `invalid`).