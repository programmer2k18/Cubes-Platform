# Cubes-Platform
- Coworking spaces platform dashboard that provides significant operations and insights for the owner of coworking space.

- They suffer from the lack of a regulatory system for booking, especially when there are more than one principal. So, it leads to randomness and chaos. In addition to following same traditional ways of communication with clients. Besides, still depending on paper work, which is a bad and outdated approach and also lack of a system which provides him with graphs or charts to evaluate and monitor place performance.

# Requirements
  
  - PHP > 7.0
  - Xampp or any other control panel like Wampp
  - Composer
  
# Installation  
  
  - Clone the repo into your local machine and put it `C:\xampp\htdocs\your-folder-name-here`
  - Open phpmyadmin
  - Create database called `co-workingspaces`
  - Import database file which is in `Database file to import` folder into the database
  - For Mail service, You should add your credentials data inside `.env` file
      
      `MAIL_DRIVER=smtp MAIL_HOST=smtp.gmail.com MAIL_PORT=587  MAIL_USERNAME=your gmail email  MAIL_PASSWORD=your gmail pass here  MAIL_ENCRYPTION=tls`
      
  - Go inside your project root directory and open new terminal and run command `php artisan serve`
  - Open browser and hit url `http://127.0.0.1:8000/dashboard/login`
  - Login with email `makanak@gmail.com` and pass `cubes15152020` as a demo
  - Boom your are in the right place....
  
# Features

  - Machine learning model for Forecasting regarding next month booking requests, which adds significant value for the coworking space's owner 
      and monitoring performance indicators.
 
  - Booking Request Coming posibilities Classification model: o	Automatically System will classify upcoming booking requests to if really 
      the booking’s user will come or not and showing its probability.   

  - Show Statistic Charts.
  
	    - System gives to the co-working’s owner insights about his place behavior like chart about each month and the corresponding number of bookings in that month.
	    - A chart explaining booking requests current year divided monthly.
	    - A chart explaining the most booked assets.
	    - A chart explaining the most frequent areas people book from.
	    - A chart explaining profit of current year divided monthly.
	    - A chart comparing profit for current and last year divided monthly.
	    - A chart explaining the top 10 booked users.
	    - A chart explaining the most frequent booked user’s ages.
    
  - Verify Reservation, Delete Reservation
  - View monthly profit
  - Send Email to User
  - Add New Current View: Owner can add a view of his\here co-working space at the current state through images.
  - Manage Co-working Desks
  - Manage Equipments
  - Manage Facilities
  - Manage Offers: Owner can publish new offers or promotions to public users or specified users due to their loyality degree.
  - Manage reviews about his/her coworking space which later can be used for sentiment analysis.
  - Add new posts to the coworking space's timeline like facebook to interact with users.
  - Manage Support Issues: Owner can reply to end user complaining about some issues through sending an email to them with solutions.
  - Manage Blocked Users: Block User: Owner can block user who book several times and didn’t come from reservation again to his\her co-working space.
                          Unblock User: unblock user after certain amount of time.
		
  - Update Profile Settings.
  - Disable Co-working Profile.

  ![Logo](https://github.com/programmer2k18/Cubes-Platform/blob/master/public/cubes_plateform/cubes.png)
    
    
    
    
    
    
    
    
