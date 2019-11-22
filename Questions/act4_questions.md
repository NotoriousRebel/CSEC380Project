# Activity 4 Questions

**How do you prevent XSS in this step when displaying the username of the user who uploaded the video?**<br/>


**How do you ensure that users can't delete videos that aren't their own?**<br/>
To ensure that users are not able to delete videos that are not their own, the landing 
page is slightly differnet for each user. The delete button only appears for vidoes posted 
by the current, logged in, user. The delete button is not visible for videos belonging to other users.
Because of this, users cannot delete videos that they have not posted.
