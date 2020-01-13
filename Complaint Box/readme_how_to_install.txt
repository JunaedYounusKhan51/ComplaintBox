Sir, as our app is web based, the user mobile must be connected to our server laptop. But as we don't have any real ip yet, we can't support any mobile that's not connected to our server via wifi. So the apk given here will not work for other mobiles. That's why to install our app and run it properly, one must follow the following steps:

1. After extracting the zipped file of the latest version of github, there should be two folders named "cb",
"ComplaintBox" and two text files named "db_sql.txt", "readme_how_to_install.txt" and one apk file named "Complaint Box.apk".
2. To run the app, you will need to install Xampp.
3. You will also need "Connectify me" or any other similar wifi connection software which can create hotspot. It will give your laptop a new local ip, something like 192.XXX.XXX.X. Remember this ip. (If you have a real ip, then you don't need "connectify me")
4. Now copy the folder named "cb" to Xampp's "htdocs" directory.
5. Open any browser, go to the address "localhost", Xampp home page shall come. Enter phpMyAdmin from there. Create a database named "cb". Copy whole texts from the file "db_sql.txt" and paste them in the "sql" option of the database and run it. The database is now ready for work.
6. Now copy the folder named "ComplaintBox" and paste to any directory. This is our android project. Open it, go to src, select com.example.complaintbox, open MainActivity.java. There you will find a line like [String webViewUrl =
"http://192.168.128.1/cb/login.php";], in this line replace "192.168.128.1" with your ip 192.XXX.XXX.X. Now run the project from Android Studio or ADT. Install it in your mobile. 
7. Now connect your mobile to your laptop via "Connectify me". Open the app in your mobile. Play the app. Thank you.


[**Once we are able to get our own real ip, we will be able to serve any user of anywhere of the country. Sorry for the temporary inconvenience**]