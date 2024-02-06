<html>
  <head>
   <title>My Example Confirmation Page</title>
 </head>
 <body>
   <p>
    <?php 
    print $_REQUEST['firstName'] ?? ''; ?><br> , 
   Thank you for giving me all of your information!<br> 
   I promise I will put it to good use!<br><br>
    First Name:
     <?php 
       print $_REQUEST['firstName'] ?? ''; 
     ?>
     <br>
    Last Name:
     <?php 
        print $_REQUEST['lastName'] ?? ''; 
     ?>
     <br>
    Email Address:
     <?php 
        print $_REQUEST['email'] ?? ''; 
     ?>
     <br>
    Comment:
     <?php 
        print $_REQUEST['txtComment'] ?? ''; 
     ?>
    
 </p>
  </body>
</html>