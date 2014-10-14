## Comprobando conectividad

<iframe width="420" height="315" src="//www.youtube.com/embed/2OBZHB5I89A" frameborder="0" allowfullscreen></iframe>



### [ping](http://linux.die.net/man/8/ping)

* El comando ping [`ping`](http://linux.die.net/man/8/ping) permite mandar paquete [ICMP](`http://es.wikipedia.org/wiki/Internet_Control_Message_Protocol`)
* El envio y recepción de estos paquetes permite comprobar la conectividad entre equipos
``` bash
$ ping -c 4 speaker
PING speaker (192.168.1.1) 56(84) bytes of data.
64 bytes from speaker.example.com (192.168.1.1): icmp_seq=1 ttl=64 time=0.194ms
64 bytes from speaker.example.com (192.168.1.1): icmp_seq=2 ttl=64 time=0.203ms
64 bytes from speaker.example.com (192.168.1.1): icmp_seq=3 ttl=64 time=0.229ms
64 bytes from speaker.example.com (192.168.1.1): icmp_seq=4 ttl=64 time=0.217ms
--- speaker ping statistics ---
4 packets transmitted, 4 received, 0% packet loss, time 3002ms
rtt min/avg/max/mdev = 0.194/0.210/0.229/0.022 ms
```
* [Más ejemplos de uso del comando `ping`](http://www.thegeekstuff.com/2009/11/ping-tutorial-13-effective-ping-command-examples/)

<aside class="notes">
* With your network configured and initialized, you can perform a basic test of its operation using one command: ping.
* This command sends an Internet Control Message Protocol (ICMP) packet to the system you name (via IP address or hostname) and waits for a reply.
* In Linux, ping continues sending packets once every second or so until you interrupt it with a Ctrl+C keystroke. (You can instead specify a limited number of tests via the -cnum option.)
* Example sent four packets and waited for their return, which occurred quite quickly (in an average of 0.210 ms) because the target system was on the local network. By pinging systems on both local and remote
</aside>
