# Activity6 Questions

**• How would you fix your code so that this issue is no longer present?**<br/>

To fix this in code a simplest option whould be have input sanitization that would prevent a port from being specified. This would force the end user to only be able to interract with port 80 or 443 depending on the URL preventing an attacker from being able tuse it to find open ports.

**• How does your test demonstrate SSRF as opposed to just accessing any old endpoint.**<br/>

This is different from an attacker hitting those ports themselves as it creates a layer of seperation from the attacker and the victims. By interacting with MemeTube to check ports any logs from the victim devices would show that they are being port scanned by MemeTube and not the attacker. This would still require the attacker to be on the same network as either MemeTube or the victim but with this SSRF attack they can monitor the network traffic without having logs connect them to the traffic.
