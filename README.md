# Complaint Box
Our project “Complaint Box” is basically a web based android application. Using this web, all
the people of the country can open an account via their name, nid and some other info. Then they
can post their ward-wise problems with photos and vote them according to importance. Thus the
commissioner can see them and take steps to solve them.
We were told to implement only the “Submit Complaint” use-case for this course. But we are
glad to say that we have done almost all of the use-cases we showed in the prototype.
We have implemented “Log In”, “Sign Up”, “Submit a Complaint”, “Recent Complaints”, “Most
Voted Complaints”, “Call Police”, “My Profile” and “Log Out”.
We have used php to design all the pages and their transitions, and used android webview to run
all those pages like an android application. So we used both php and android for our project.
For maintaining web parts of php, we have used our personal laptop as server of our web based
app. We have used Xampp for this purpose. We have created the php files in “htdocs” directory
of the Xampp folder. Now via wifi connecting software like “connectify me”, we had connected
the user mobiles to our server laptop. (To be mentioned that, if we want to go for business or
professional purposes, we would use a real ip for our server laptop, then we wouldn’t need any
kind of wifi connection with the user mobile.) Now after connection being made between the
server laptop and the user mobiles, and after running the app from the android studio or ADT in
our mobile, we could see all the desired pages written in php. So basically, the user mobiles are
running our app which is actually coming from our sever laptop via networking. That gives our
app a very flexible dimension that, we can add any change or modification in our app at any time
from our server laptop just by changing the php files.
For database part, we had used phpMyAdmin that comes with Xampp, where sql database is
used. We created a database named “cb” there. We created some table named complaints, user,
comment, vote, type. Data from the app were stored in the database and read from the database
when needed.
In “Sign Up” part, one has to give his name, nid, password, confirm password. If any box is
blank, then it will show error like, “Any box can’t be blank”. If the password and confirm
password does not match, then it will also give error.
In “Log In” part, we developed some well-formed alternative course of events and error warning
system. If any of the boxes remain blank, it will give an error something like “Any box can’t be
blank” and if the nid or password does not match with any of the signed up data, then it will give
an error like “invalid nid or password”. If nid and password are correct, then user will be logged
in and will go to home page of the app.
In home page, the first option is “Submit a complaint”. After choosing this, a page will come,
where user has to give some info about the problem, then a second page will come with all the
matching problems that match with his or her problem type. If his problem already exists in the
list, he can vote and comment, then abort. Otherwise, he will continue submission, add photo,
description, recommendation. This type-matching will ensure that, there exists no duplicate
problem in our database.
Then there are “Recent Complaint” and “Most Voted Complaints”. In “Recent Complaints”,
problems are sorted according to their time. And in “Most Voted Complaints”, problems are
sorted according to the number of votes. In both sections, user can view problems, vote them and
comment about them.
Then comes the “Call Police” feature. Using this option, user can easily contact with the nearest
police station in-case of any emergency.
In “My Profile” section, user may see his name, nid and those problems that were submitted by
his own.
At the end, by “Log Out”, a user can simply get out of his account.
