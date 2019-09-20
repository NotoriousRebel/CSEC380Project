# Activity2 Questions

**What Web Application security mechanisms are involved in your topology? What security mechanisms would ideally be involved?**<br/>
At the current moment our security mechanisms include:<br/>
<br/>
Currently:
* Hashing + Salting of passwords: Utilizing hashing functions for passwords that are created by users. 
Not having plaintext passwords will make it harder for the attacker to crack them as they are not just 
hashed but have salting as well to deter rainbow table attacks and make harder to crack.

* HTTPS: Instead of using HTTP we are using HTTPS for an encrypted connection between the client and our server. 
This means no one will be able to sniff the traffic and discover the user’s password when they login or sensitive data.

* Sanitization: Making sure user’s input is properly inspected to strip out malicious characters to prevent them from 
doing certain actions based on their input. This will help mitigate attacks such as cross site scripting and SQL injection.

Ideally:
* Web Application Firewall: Having a Web Application Firewall between the web app and the internet to filter and monitor HTTP traffic. 
The firewall would be configured with policies to protect against vulnerabilities.

* Network Firewall: Having a firewall on our network to allow or deny certain traffic based on rules we configure and the 
needs of our topology.

* Reverse Proxy Server: Utilization of a reverse proxy server in front of our web server to intercept requests 
from clients, then send them those requests to and receive responses from the web server. This ensures that no 
client ever communicates directly with our web server. Furthermore, this means that our web application doesn’t 
need to reveal the IP of our origin server. This makes it harder for attackers to perform a DDoS attack.


**What testing framework did you choose and why?**<br/>
For our project we chose pytest as our testing framework. There are numerous reasons as to why 
we choose pytest: easy to use, extensive documentation, and easy to integrate into our Travis builds. 
Furthermore, down the road when we need more complicated tests for different acts of our project, we 
can just have one file with multiple classes. The flexibility and convenience features that pytest has 
incorporated makes writing tests easy and worthwhile Moreover, the output of pytest is extremely easy 
to understand and will show exactly what went wrong, decreasing overall debugging and increasing productivity. 
With pytest it’s simply a pip install; furthermore, it’s easy to get started with. Overall, we chose pytest 
due to the enormous benefits, ease of use, extensive documentation, easy to understand output, and easy to 
integrate into our Travis builds.
