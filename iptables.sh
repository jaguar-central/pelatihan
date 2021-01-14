#!/bin/bash
iptables -I FORWARD -i tun+ -j ACCEPT
iptables -I OUTPUT -o tun+ -j ACCEPT
iptables -I FORWARD -i tun+ -s 10.88.0.0/24  -m state --state RELATED,ESTABLISHED -j ACCEPT
iptables -I FORWARD -s 10.88.0.0/24  -o tun+ -m state --state RELATED,ESTABLISHED -j ACCEPT
iptables -t nat -I POSTROUTING -s 10.8.0.0/24 -o eth0 -j MASQUERADE

echo "iptables executed " > /root/iptables_echo