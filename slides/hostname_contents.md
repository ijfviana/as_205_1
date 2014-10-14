## Introducción

* Es necesario establecer una relación entre direcciones IP y nombre del equipo
* Los nombre de equipo forman parte de de fully qualified domain name ([FQDN](http://es.wikipedia.org/wiki/FQDN))
```
tsiolkovsky.luna.edu (FQDN)
tsiolkovsky (host name)
luna.edu (domain name)
```
* ¿Cómo establecemos esta relación?

note:
* Computers “think” in terms of numbers, and so TCP/IP uses numbers to uniquely identify computers.
* Humans, though, work better with words.
* Thus, computers also usually have names, known as hostnames.
* Entire networks also have names, known as domain names.
* Hostnames typically appear as the first part of a fully qualified domain name (FQDN).



## Configuración nombres remotos

* Podemos establecer la relación entre hostname e IP:
 * Actualizar el DNS corporativo
 * Actualizando el fichero local `/etc/hosts`

``` bash
$ vi /etc/hosts

#Ejemplo de archivo hosts

#Definición de localhost
127.0.0.1         localhost
#Correspondencia para una página web
209.85.229.104    www.google.es
#Dominios de Internet bloqueados
255.255.255.0     www.paginabloqueada1.com    www.paginabloqueada2.com
255.255.255.0     www.paginabloqueada3.com
```

note:
Hostnames are configured in a couple of ways:
* On DNS Your network administrator should be able to add an entry for your computer to your network’s DNS server. This entry should make your computer addressable by name from other computers on your local network, and perhaps from the Internet at large.
* Alternatively, remote systems’ /etc/hosts files can be modified to include your system.



### Configuración nombre local

* Para cambiar el nombre local del equipo usamos el comando [`hostname`](http://linux.die.net/man/1/hostname)
```bash
# hostname tsiolkovsky.luna.edu
```
* Si no indicamos nada nos muestra el nombre del equipo actual

note:
The most basic tool for setting your hostname locally is called, appropriately enough, hostname. Type the command alone to see what your hostname is, or type it with a new name to set the system’s hostname to that name.
