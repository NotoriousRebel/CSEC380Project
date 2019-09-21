# Activity 1 Questions

**What is the URL of your Github project?**<br/>
https://github.com/NotoriousRebel/CSEC380Project/

**How did you break up your projects and what are the security ramifications?**<br/>
First, we figured out the strengths and weaknesses of each group member to gauge where everyone would be able to provide the most value. 
Matt had the most experience with Travic-CI and pytest so he was assigned those. Nick was most confident with docker so he took on setting 
up the Apache webs server. Lastly the diagrams of the infrastructure seemed like the most work so that was divided between Jack and Evan 
since they have good backgrounds in networking.

Security ramifications come into play when communication starts to break down. If each group member is working on a separate part of the 
project, the different interfaces have a high possibility of not working in conjunction when communication is poor. A way to avoid this 
would be to develop a cohesive plan to which every member adheres.

**How did you choose to break down your Epic into various issues (tasks)?**<br/>
The project is our Epic and represents the shippable, intentionally vulnerable, web application. We have a milestone for each activity 
in the assignment, these are our "sprints". Lastly, each sprint is broken down into sub tasks made up of GitHub issues which represent 
our user stories.

**How long did you assign each sprint to be?**<br/>
Our team is ambitious and would like to get the project done ahead of time. For each sprint, we estimate it will take us 1 and a half 
weeks to complete.

**Did you deviate from the Agile methodology at all? If yes, what is your reasoning for this?**<br/>
Our project was structured to follow the Agile methodology. The project (epic) was broken down into sprints to represent each activity. 
Each sprint was broken down by requirements (issues) that represent the user stories. The milestones for each sprint are subject to 
change due to time constraints and group member time zone differences. This methodology helps to organize each activity by having 
deadlines (milestones) and a member assigned to each task. This will keep us on track to have the assignment completed by the due date.

**How do you ensure that after each issue/milestone that security has been verified? How would you identify 
such issues in an ideal environment?**<br/>
To ensure that each issue/milestone security has been verified, we utilize the pytest framework as well as Travis builds 
in tandem with manual inspection. Ensuring the new issue/milestone does not break anything is priority, then afterwards there 
would be an extensive suite of tests to test for common vulnerabilities such as cross site scripting, command injection, and sql injection.
In an ideal environment there would be a team dedicated to extensively testing our application when new milestones or issues arise. 
Furthermore, we would have something such as lgtm set up to perform automatic code analysis to find security issues in tandem with our 
internal security team. Dependabot is also used to check our dependency files to make sure we are not using outdated libraries.
