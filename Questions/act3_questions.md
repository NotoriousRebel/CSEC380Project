## Provide a link to the test cases you generated for this activity.
The pytest file can be found at tests/test_act3.py or you can look at travis's results [here!](https://travis-ci.com/NotoriousRebel/CSEC380Project)
## How do you ensure that users that navigate to the protected pages cannot bypass authentication requirements?
The security measures we took include hashing user passwords using the Bcrypt algorithm before storing them in the database, these passwords are also salted for increased protection. To prevent scrapers and other peoplethat are not authenicated from seeing our valuable videos wee implemented PHP sessions for logged in users and only allow users with an active session to view the content. Lastly, to prevent unwanted people from sniffing traffic and potentially seeing our users passwords we implemented TLS to encrypt the network traffic.
## How do you protect against session fixation?
We coded the application to assign a different session cookie immediately after a user authenticates to the application. We also send these values over POST instead of GET parameters. 
## How do you ensure that if your database gets stolen passwords aren’t exposed?
Since the passwords are hashed and salted it would take an adversary more time to crack each password than if they were just hashed. This will give us more time to report any breach and allow users to change their passwords before the bad guys get them.
## How do you prevent password brute force?
We implemented a 1-second delay in the login.php script to reduce the feasability of a brute force attack.
## How do you prevent username enumeration?
When a user enters credentials into our site and we determine them to be incorrect we do not tell the user if the username was correct or not. Instead, we return a generic "credentialsIncorrect" error.
## What happens if your sessionID is predictable, how do you prevent that?
If your sessionID is predictable this potentially allows attackers to forge their own sessionID's and gain access to other users accounts. The way to prevent this is to make sure that you are generating a cryptographically random sessionID for each user with the most entropy as possible. Also a good way to test this is to open up Burp Sequencer and run it against your site.
