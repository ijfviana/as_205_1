## Introducción

<div class="alert alert-warning">
  <strong>¡Atención!</strong> Un servidor no suele usar conexiones wifi para conectarse a una red
</div>
</br>
<div class="alert alert-info">
  <strong>Pero es conveniente</strong> conocer conceptos básicos de conexiones wifi
</div>

* [Obtención características de la red](#/2/1)
* [iwlist](#/2/5)
* [iwconfig](#/2/7)
* [Herramientas gráficas](#/2/9)



## Obtención características (I)

<a class="fancybox" href="img/eduroam.png" data-fancybox-group="gallery" title="eduroam">
<img height="550px" src="img/eduroam.redimensionado75.png" alt="eduroam">
</a>

note:
To begin the process, you must first obtain information on your wireless network’s settings. If you’re using a
wireless network set up by somebody else, such as your employer’s network or a public access point, you should
be able to get the relevant information from its maintainer.



## Obtención características (II)

<a class="fancybox" href="img/wifi1.png" data-fancybox-group="gallery" title="eduroam">
<img height="550px" src="img/wifi1.png" alt="eduroam">
</a>

note:
If you’re using a network that you maintain yourself, such as a home network or one that you’ve set up for your employer, you can find the information from the
configuration tools provided by your WAP or broadband router. This information can often be accessed via a Web
server run on the device.



## Obtención características (III)

<a class="fancybox" href="img/wifi2.png" data-fancybox-group="gallery" title="eduroam">
<img height="550px" src="img/wifi2.redimensionado75.png" alt="eduroam">
</a>



## [iwlist](http://linux.die.net/man/8/iwlist) (I)

<div class="alert alert-info">
  <strong>Permite</strong> obtener información detallada mediante un interfaz de red
</div>

``` bash
# sudo iwlist wlan0 scan
wlan0
Scan completed :
Cell 01 - Address: 00:27:81:A5:0C:10
ESSID:"NoWires"
Protocol:IEEE802.11N-24G

Mode:Master
Channel:11
Encryption key:on
Bit Rates:130 Mb/s
Extra: Rates (Mb/s): 1 2 5.5 6 9 11 12 18 24 36 48 54
Quality=65/100 Signal level=-58 dBm Noise level=-102 dBm
IE: IEEE 802.11i/WPA2 Version 1
Group Cipher : CCMP
Pairwise Ciphers (1) : CCMP
Authentication Suites (1) : PSK
Extra: Last beacon: 122ms ago
```

note:
* You can use iwlist to locate the available networks. Pass the scan or scanning command to iwlist, optionally preceded by the network device.
* If you run this command as an ordinary user, it will only display information on the networks to which you’re already connected;
* If you run it as root, the iwlist output includes all the nearby networks (or cells, in iwscan parlance).



## [iwlist](http://linux.die.net/man/8/iwlist) (II)
### Comandos (I)
<div class="table-responsive">
  <table class="table table-condensed  table-hover table-bordered">
    <thead>

      <tr>
        <th>Subcomando</th>
        <th>Función</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>scan or scanning
        </td>
        <td>Lists all the available networks
        </td>
      </tr>

      <tr>
        <td>freq , frequency , or  channel
        </td>
        <td>
          Lists all the available channels
        </td>
      </tr>

      <tr>
        <td>rate , bit , or bitrate
        </td>
        <td> Lists all the speeds  supported
        </td>
      </tr>

      <tr>
        <td>keys , enc , or encryption
        </td>
        <td>Lists the encryption key sizes available
        </td>
      </tr>

    </tdody>
  </table>
</div>



## [iwlist](http://linux.die.net/man/8/iwlist) (III)
### Comandos (II)

<div class="table-responsive">
  <table class="table table-condensed  table-hover table-bordered">
    <thead>

      <tr>
        <th>Subcomando</th>
        <th>Función</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>power
        </td>
        <td>
          Lists power management modes available
        </td>
      </tr>

      <tr>
        <td> txpower
        </td>
        <td>
           Lists available transmit power settings
        </td>
      </tr>

      <tr>
        <td>retry
        </td>
        <td>
          Lists the current retry setting
        </td>
      </tr>

      <tr>
        <td>event
        </td>
        <td>Lists wireless events supported
        </td>
      </tr>

      <tr>
        <td>auth
        </td>
        <td>Lists the authentication parameters
        </td>
      </tr>

      <tr>
        <td> wpa or wpakeys
        </td>
        <td> Lists the WPA keys set in
        </td>
      </tr>

    </tdody>
  </table>
</div>



## [iwlist](http://linux.die.net/man/8/iwlist) (IV)
### Comandos (III)

<div class="table-responsive">
  <table class="table table-condensed  table-hover table-bordered">
    <thead>

      <tr>
        <th>Subcomando</th>
        <th>Función</th>
      </tr>
    </thead>
    <tbody>
         <td> modu or modulation

        </td>
        <td>Lists the modulation used
        </td>
      </tr>
    </tdody>
  </table>
</div>



## [iwconfig](http://linux.die.net/man/8/iwconfig) (I)

* Permite configurar un dispositivo de red atendiendo a las las características de la red a la que nos queremos conectar
``` bash
$ iwconfig wlan0 essid NoWires channel 1 mode Managed key s:N1mP7mHNw
```
* Deberemos indicar, entre otros, los valores devueltos por [iwlist](http://linux.die.net/man/8/iwlist):
 * ESSID
 * Canal
 * Modo
 * Clave...

note:
* To initiate the basic connection to the local Wi-Fi network, you use the iwconfig command, passing it the relevant data using option names such as essid and channel, preceded by the wireless network device name
* This example sets the options for wlan0 to use the managed network on channel 1 with the SSID of NoWires and a password of N1mP7mHNw.
* The password requires a few extra comments. Ordinarily, iwconfig takes a password as a string of hexadecimal values, with optional dashes between 2-byte blocks, as in 0123-4567-89AB.
* Often, however, the password is given as a text string. The string s: must precede the password in this case, as shown in the example.



## [iwconfig](http://linux.die.net/man/8/iwconfig) (II)

*  [iwconfig](http://linux.die.net/man/8/iwconfig) también nos devuelve la configuración actual de un dispositivo de red.

``` bash
# iwconfig wlan0
wlan0 IEEE 802.11g ESSID:"NoWires"
Mode:Managed Frequency:2.462 GHz Access Point: 08:10:74:24:1B:D4
Bit Rate=54 Mb/s Tx-Power=27 dBm
Retry min limit:7 RTS thr:off Fragment thr=2352 B
Encryption key: 374E-503D-6d37-4E48-0A [2]
Link Quality=100/100 Signal level=-32 dBm Noise level=-94 dBm
Rx invalid nwid:0 Rx invalid crypt:0 Rx invalid frag:0
Tx excessive retries:0 Invalid misc:0 Missed beacon:0
In addition to providing information on settings, iwconfig provides some diagnostic information, such as the link
quality, received (Rx) and transmitted (Tx) errors, and so on.
```

<aside class="notes">
* Once you’ve configured a wireless interface, you can check on its settings by using iwconfig with no options or with only the interface name:
</aside>



## Herramientas gráficas (I)
### [Wicd](https://launchpad.net/wicd)

<a class="fancybox" href="img/wicd.png" data-fancybox-group="gallery" title="Wicd">
<img height="550px" src="img/wicd.redimensionado75.png" alt="Wicd">
</a>



## Herramientas gráficas (II)
### [NetworkManager](https://projects.gnome.org/NetworkManager/)

<a class="fancybox" href="img/networkmanager.png" data-fancybox-group="gallery" title="NetworkManager">
<img height="550px" src="img/networkmanager.redimensionado75.png" alt="NetworkManager">
</a>
