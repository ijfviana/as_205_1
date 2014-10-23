## Introducción

* Una vez configurado el interfaz de red, es necesario establecer su configuración [TCP/IP](http://es.wikipedia.org/?title=Modelo_TCP/IP)
* El establecimiento de la dirección IP, DNS, Gateway, se puede establecer de forma:
 * [Dinámica](#/3/2)
 * [Estática](#/3/6)
* Existiendo [Herramientas de configuración](#/3/9) que nos facilitan esta labor



## Dinámica (I)

* Es necesario tener definido un servidor de DHCP  ([Dynamic Host Configuration Protocol](http://es.wikipedia.org/wiki/Dynamic_Host_Configuration_Protocol))

<a class="fancybox" href="img/dhcp.png" data-fancybox-group="gallery" title="dhcp">
<img height="350px" src="img/dhcp.redimensionado50.png" alt="dhcp">
</a>

* Las IP se conceden por ciertos periodos (DHCP lease), cada cierto tiempo hay que renovarla

<aside class="notes">
* One of the easiest ways to configure a computer to use a TCP/IP network is to use the Dynamic Host Configuration Protocol (DHCP), which enables one computer on a network to manage the settings for many other computers.
* It works like this:
 * When a computer running a DHCP client boots up, it sends a broadcast in search of a DHCP server.
 * The server replies (using nothing but the client’s hardware address) with the configuration information the client needs to enable it to communicate with other computers on the network—most important, the client’s IP address and netmask and the network’s gateway and Domain Name Service (DNS) server addresses.
 * The DHCP server may also give the client a hostname and provide various other network details.
 * The client then configures itself with these parameters.
* The IP address isn’t assigned permanently; it’s referred to as a DHCP lease, and
* if it’s not renewed, the DHCP server may give the lease to another computer.
<class>



## Dinámica (II)
### Clientes dhcp

* Es necesario tener instalado un cliente dhcp
 * [pump](https://git.fedorahosted.org/git/pump.git)
 * [dhclient](https://www.isc.org/downloads/dhcp/)
 * [dhcpcd](http://packages.debian.org/jessie/dhcpcd)
* Es conveniente tener instalado sólo uno de ellos

<aside class="notes">
Three DHCP clients are in common use on Linux: pump, dhclient, and dhcpcd (not to be confused with the DHCP
server, dhcpd). Some Linux distributions ship with just one of these, but others ship with two or even all three. All
distributions have a default DHCP client—the one that’s installed when you tell the system you want to use DHCP
at system installation time. Those that ship with multiple DHCP clients typically enable you to swap out one for
another simply by removing the old package and installing the new one.
</aside>



## Dinámica (III)
### ¿Cómp configurar estos clientes? (I)

* Existen **ficheros de configuración** que ajustan su comportamiento
* Estos ficheros son leídos por el sistema antes de ejecutar el cliente dhcp.
* Por lo general, estos clientes se ejecutan al arrancar el sistema
* La ubicación y sintaxis de estos ficheros depende del sistema operativo



## Dinámica (IV)
### ¿Cómp configurar estos clientes? (II)

 * En los sistemas [Red-HAT](https://www.centos.org/docs/5/html/5.1/Deployment_Guide/s1-networkscripts-interfaces.html) el ficheros de configuración está en `/etc/sysconfig/network-scripts/ifcfg-*`
 ```bash
 $ vi /etc/sysconfig/network-scripts/ifcfg-eth0
 DEVICE=eth0
 BOOTPROTO=dhcp
 HWADDR=00:19:D1:2A:BA:A8
 ONBOOT=yes
 ```
 * Cada interfaz de red se define es su propio fichero. El comando `BOOTPROTO=dhcp` indica que se usará dhcp.

<aside class="notes">
* The DHCP client runs at system bootup.
* In other cases, the DHCP client can be run as part of the main network configuration startup file (typically a SysV startup file called network or networking).
* The system often uses a line in a configuration file to determine whether to run a DHCP client.
* For instance, Red Hat and Fedora set this option in a file called /etc/sysconfig/network-scripts/ifcfg-eth0 (this filename may differ if you use something other than a single Ethernet interface).
</aside>



## Dinámica (V)
### ¿Cómp configurar estos clientes? (III)

* En los sistemas [Debian](https://wiki.debian.org/NetworkConfiguration#Using_DHCP_to_automatically_configure_the_interface) el ficheros de configuración está  en  ` /etc/network/interfaces`:
 ```bash
 $ vi /etc/network/interfaces
 auto eth0
 iface eth0 inet dhcp
```
* Todos los interfaces se definen en un único fichero indicando el tipo  `dhcp`

note:

* The DHCP client runs at system bootup.
* In other cases, the DHCP client can be run as part of the main network configuration startup file (typically a SysV startup file called network or networking).
* The system often uses a line in a configuration file to determine whether to run a DHCP client.
* For instance, Red Hat and Fedora set this option in a file called /etc/sysconfig/network-scripts/ifcfg-eth0 (this filename may differ if you use something other than a single Ethernet interface).
</aside>



## Dinámica (VI)
### Ejecución manual

* En ocasiones el cliente dhcp debe ser invocado manualmente
* En esta ocasiones ejecutamos algo similar a:
```bash
$ dhclient eth0
```
* Los clientes dhcp admiten configuraciones (definir tiempos de espera...), aunque es raro cambiar la que viene por defecto

<aside class="notes">
* Once a DHCP client is configured to run when the system boots, the configuration task is done—at least, if everything works as it should.
* On very rare occasions, you may need to tweak DHCP settings to work around client/server incompatibilities or to have the DHCP client do something unusual.
* If you need to manually run a DHCP client, you can usually do so by typing its name (as root), optionally followed by a network identifier, as in dhclient eth0 to have the DHCP client attempt to configure eth0 with the help of any DHCP server it finds on that network.
</aside>



## Estática (I)
### Ficheros de configuración (I)

* En este caso no es necesario configurar la red mediante ningún cliente DHCP ya que el establecimiento de direcciones, máscaras de red, etc. es dinámico.
* Estas configuraciones se guardan en los mismo ficheros antes vistos.
* Al igual que antes la configuración de red se realiza al arrancar el sistema



## Estática (II)
### Ficheros de configuración (II)

* En el caso de [Red-HAT](https://www.centos.org/docs/5/html/5.1/Deployment_Guide/s1-networkscripts-interfaces.html)
```bash
 $vi /etc/sysconfig/network-scripts/ifcfg-eth0
 DEVICE=eth0
 BOOTPROTO=static
 IPADDR=192.168.29.39
 NETMASK=255.255.255.0
 NETWORK=192.168.29.0
 BROADCAST=192.168.29.255
 GATEWAY=192.168.29.1
 ONBOOT=yes
```
* El parámetro `BOOTPROTO=static` indica direccionamiento estático, los valores siguientes (`IPADDR`, `NETMASK`, etc) establecen la configuración IP



## Estática (III)
### Ficheros de configuración (III)

* En el caso de [Debian](https://wiki.debian.org/NetworkConfiguration#Configuring_the_interface_manually)
```bash
 $ vi /etc/network/interfaces
  auto eth0
    iface eth0 inet static
        address 192.0.2.7
        netmask 255.255.255.0
        gateway 192.0.2.254
```
* Al poner `static` es sistema entiende que usamos una configuración estática del interfaz.

note:
* To set a static IP address in the long term, you adjust a configuration file such as /etc/sysconfig/network-scripts/ifcfg-eth0 or /etc/network/interfaces.
* Several specific items are required, or at least helpful, for static IP address configuration:
 * IP Address You can set the IP address manually with the ifconfig command (described in more detail shortly) or with the IPADDR item in the configuration file.
 * Network Mask You can set the netmask manually with the ifconfig command or with the NETMASK item in a configuration file.
 * Gateway Address You can manually set the gateway with the route command. To set it permanently, you need to adjust a configuration file, which may be the same configuration file that holds other options or another file, such as /etc/sysconfig/network/routes. In either case, the option is likely to be called GATEWAY. The gateway isn’t necessary on a system that isn’t connected to a wider network—that is, if the system works only on a local network that contains no routers.
 * DNS Settings For Linux to use DNS to translate between IP addresses and hostnames, you must specify at least one DNS server in the /etc/resolv.conf file. Precede the IP address of the DNS server by the keyword nameserver, as in nameserver 192.168.29.1. You can include up to three nameserver lines in this file. Adjusting this file is all you need to do to set the name server addresses; you don’t have to do anything else to make the setting permanent.



## Estática (IV)
### Manualmente (I)

* Usamos el comando [ifconfig](http://linux.die.net/man/8/ifconfig)
* Junto con el comando [route](http://linux.die.net/man/8/route)
* Para establecer la IP de eth0 equivalente al caso antererior ejecutamos
```bash
$ ifconfig eth0 up 192.168.29.39 netmask 255.255.255.0
```
* Para establecer la tabla de enrutamiento:
```bash
$ route add default gw 192.168.29.1
```

<aside class="notes">
* ifconfig program is critically important for setting both the IP address and the netmask.
* This program can also display current settings. Basic use of ifconfig to bring up a network interface resembles the following: ifconfig interface up addr netmask mask
</aside>



## Estática (V)
### Manualmente (II)

* Para comprobar que todo se ha realizado:

```bash
$ ifconfig eth0
eth0 Link encap:Ethernet HWaddr 00:A0:CC:24:BA:02
inet addr:192.168.29.39 Bcast:192.168.29.255 Mask:255.255.255.0
UP BROADCAST RUNNING MULTICAST MTU:1500 Metric:1
RX packets:10469 errors:0 dropped:0 overruns:0 frame:0
TX packets:8557 errors:0 dropped:0 overruns:0 carrier:0
collisions:0 txqueuelen:100
RX bytes:1017326 (993.4 Kb) TX bytes:1084384 (1.0 Mb)
Interrupt:10 Base address:0xc800

$ route
Kernel IP routing table
Destination  Gateway     Genmask       Flags Metric Ref Use Iface
192.168.29.0 *           255.255.255.0 U     0      0   0   eth0
127.0.0.0    *           255.0.0.0     U     0      0   0   lo
default     192.168.29.1 0.0.0.0       UG    0     0    0   eth0
```



## Herramientas de configuración

* NetworkManager
* wicd
* [ifup](/3/14)



## Herramientas de configur... (II)
### [ifup](http://linux.die.net/man/8/ifup)

* El comando [ifup](http://linux.die.net/man/8/ifup) y [ifdown](http://linux.die.net/man/8/ifdown) automatizan la invocación a [ifconfig](http://linux.die.net/man/8/ifconfig) y [route](http://linux.die.net/man/8/route)
* Configuran la red en base a los [ficheros de configuración](/#/3/5):
```bash
# ifup eth0
Determining IP information for eth0... done.
```
* Facilitan levantar o echar a bajo la red y comprobar si dichos ficheros están bien definidos

note:
* Most Linux distributions today ship with two commands, ifup and ifdown, that combine the functions of several other network commands, most notably ifconfig and route.
* In their simplest forms, they bring interfaces up or shut them down based on information in whatever files your distribution uses to store network configuration data:
* The ifup and ifdown commands are useful for verifying that the network settings are configured properly for the next time the computer boots.
* They’re also useful if you want to quickly take down the network or bring it back up again, because you can type fewer commands and you don’t need to remember all the details of IP addresses, routes, and so on.
* If you need to experiment or debug a problem, though, using ifconfig and route individually is preferable, because they give you finer control over the process.
