



## Layout document

Here is our current design of layout document for the homepage or index page. This part will concentrate on the design decisions we have made for the homepage, which will serve as the foundation for all other pages on the website. 



* Home page

<p id="gdcalert1" ><span style="color: red; font-weight: bold"</span></p>


![alt_text](images/image1.png "image_tooltip")


* Login page

    Users register and make their unique account with the email and password.

* Profile page

    It displays the current users profile which includes their name, email and bio
    
    Users can customize their profiles with their profile pictures

* Search page

    Users can search for Items/Posts by typing keyword in the search box

* Post Story page

    Users can create and post their Story with a title



As previously stated, this design choice is implemented throughout almost the entire website. The navigation bar on the left is kept minimal.


## Organization of pages

<table>
  <tr>
   <td>
   </td>
   <td>
   </td>
   <td>login
   </td>
   <td>
   </td>
   <td>login
   </td>
   <td>
   </td>
  </tr>
  <tr>
   <td>
   </td>
   <td>
   </td>
   <td>         |
   </td>
   <td>
   </td>
   <td>         |
   </td>
   <td>
   </td>
  </tr>
  <tr>
   <td>
   </td>
   <td>
   </td>
   <td>home
   </td>
   <td> ------
   </td>
   <td>admin
   </td>
   <td>
   </td>
  </tr>
  <tr>
   <td>
   </td>
   <td>
   </td>
   <td>       |
   </td>
   <td>
   </td>
   <td>
   </td>
   <td>
   </td>
  </tr>
  <tr>
   <td>
   </td>
   <td>search
   </td>
   <td>Post story
   </td>
   <td>profile
   </td>
   <td>
   </td>
   <td>
   </td>
  </tr>
</table>

## Logic process

To start using the My Discussion Forum site, a new user must first register for an account by creating a username, password, and associating an email address. Upon completing the three prompts and providing the necessary information, the user will receive an email to verify the account. They must confirm their account within an hour of receiving the email, before the link expires.

After successfully confirming the account, the user can log in and access the home page. The home page displays all posts, including Discussion posts, weather reports, and posted stories. 

On the navigation bar, the registered user has the option to access their profile settings, or log out of their account. 

If the user wants to post a story, they can click on the “Post a Story!” button on the homepage. This page will direct them to a form that will ask them for the following information.

・TItle 

・story 

After inputting both of the information, the users can click the “submit” button to post the story and make it visible throughout My Discussion Forum. 

Now, users can choose to delete their posts when creating a new one, and similarly, they can delete their comments when responding to a post. With these options, users can freely engage in browsing and actively participating in discussions.

Moreover, the user can personalize their account by clicking on the navigation bar and their account name. Then, they can add a profile picture for other users to see.

Administrators possess additional functionalities that are not available to regular users. There will be an “admin-users” page where administrators can access a table that provides several options related to users. This table displays all the users registered on the website, along with their registration date, email address, email confirmation status. Furthermore, administrators can block or promote a user to admin status. They also have a search field that allows them to quickly find a particular user, which can be helpful in checking their activity or swiftly making them an admin or blocking them, rather than scrolling through the entire list.
Admin also have the access to hide/delete posts regardless of user’s will. 

## Discussion regarding the design and styles of all pages


## Client-side validation

JavaScript is responsible for validating input on the client-side. This is done by setting specific requirements for certain fields. For instance, when a user signs up for an account, they are required to enter an email address. If the use enters an email address that in invalid, they will be notified via a pop-up message informing them to input a valid email address. Similarly, when a user creates a post or thread, the images they upload must be of the file types png, jpg, or gif. If an invalid image type is uploaded, a pop-up message will appear informing the user to upload an image of the correct file type. As a result, whenever a user inputs incorrect data into a field, JavaScript validates it and provides feedback on what needs to be corrected.


## Examples of each page type and Static design and Styles of Each Pages


## Login page



<p id="gdcalert2" ><span style="color: red; font-weight: bold"</span></p>


![alt_text](images/image2.png "image_tooltip")



## Home page



<p id="gdcalert3" ><span style="color: red; font-weight: bold"</span></p>


![alt_text](images/image3.png "image_tooltip")



## Search page



<p id="gdcalert4" ><span style="color: red; font-weight: bold"</span></p>


![alt_text](images/image4.png "image_tooltip")



## Profile page



<p id="gdcalert5" ><span style="color: red; font-weight: bold"</span></p>


![alt_text](images/image5.png "image_tooltip")



## Post story page



<p id="gdcalert6" ><span style="color: red; font-weight: bold"</span></p>


![alt_text](images/image6.png "image_tooltip")
