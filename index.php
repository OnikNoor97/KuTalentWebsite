<?php
 
session_start();
 
?>
 
 

<html>
<head>
              <title>CV Submission</title>
              <link rel="stylesheet" type="text/css" href="style.css">
              
</head>
<body>             
 
<div class = "header">
</div>
 
<?php if(isset($_SESSION['staff_id']) ): ?> 
 
             
 
              <head>
    <meta charset="utf-8">
    <title>CV Submission</title>
    <style type="text/css">
    </style>
   
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="style.css" rel="stylesheet" type="text/css">
    <script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
    <style>
      .carousel-inner > .item > img,
     
      .carousel-inner > .item > a > img {
          width: 100%;
          height:100%;
          max-width:940;
          max-height:365;
          margin: auto;
      }
      .carousel-inner{
              background-color: #062134;
      }
         
      a:link {
        color: #FFFFFF;
    }
      a:hover {
        color: #FFFFFF;
    }
      body {
        background-color: #062134;
    }
      </style>
    <link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css">
    </head>
    <body bgcolor="#062134">
   
    <div id="header">Welcome <?= $_SESSION['staffName']; ?></div>
    <br>
    <br>
    <div id="navbar">
      <div id="links">
   
      <ul id="MenuBar1" class="MenuBarHorizontal">
        <li><a href="logout.php">Log out</a></li>
</ul>
    </div>
   
    <p><a href="index.php"><span class="KU">KU</span> <span class="Talent">Talent</span></a></p>
   
    </div>
    <div id="box">
     
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
          <li data-target="#myCarousel" data-slide-to="3"></li>
      </ol>
   
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
          <div class="item active">
            <img src="images/kingston2.jpg"  width="940" height="365">
          </div>
         
          <div class="item">
            <img src="images/kingston1.jpg"  width="940" height="365">
          </div>
       
          <div class="item">
            <img src="images/kingston5.jpg"  width="940" height="365">
          </div>
   
          <div class="item">
            <img src="images/kingston4.jpg"  width="940" height="365">
          </div>
        </div>
   
       
    </div>
   
    </div>
    </div>
    <br>
    <br>
    <br>
    <div id="container">
    <br>
      <div id="box1">
     
       <h2>Create Job Category</h2>
<p1>Click the button below to create job category</p1>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <form>
          <input style="width: 200px; cursor: pointer; background: #999; color: #000;  font-size: 24;margin-left: 5px;" type="button" value="Click Here" onClick="window.location.href='addrolecategory.php'" />
</form>
        </p>
      </div>
      <div id="box2">
      <h2>Search CV</h2>
<p1>Click the button below to search for CVs</p1>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <form>
          <input style="width: 200px; cursor: pointer; background: #999; color: #000;  font-size: 24;margin-left: 5px;" type="button" value="Click Here" onClick="window.location.href='DLScript.php'" />
</form>
</div>
      <div id="box3">
      <h2>Add Employer</h2>
<p1>Click the button below to add an employer</p1>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <form>
          <input style="width: 200px; cursor: pointer; background: #999; color: #000;  font-size: 24;margin-left: 5px;" type="button" value="Click Here" onClick="window.location.href='addemployer.php'" />
</form>	
      </div>
    </div>
   
    <script type="text/javascript">
    var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
    </script>
    </body>

<?php elseif(isset($_SESSION['student_id']) ): ?> 
    <html>
    <head>
    <meta charset="utf-8">
    <title>CV Submission</title>
    <style type="text/css">
    </style>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="style.css" rel="stylesheet" type="text/css">
    <script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
    <style>
      .carousel-inner > .item > img,
      
      .carousel-inner > .item > a > img {
          width: 100%;
          height:100%;
          max-width:940;
          max-height:365;
          margin: auto;
      }
      .carousel-inner{
              background-color: #062134;
      }
          
      a:link {
        color: #FFFFFF;
    }
      a:hover {
        color: #FFFFFF;
    }
      body {
        background-color: #062134;
    }
      </style>
    <link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css">
    </head>
    <body bgcolor="#062134">
    
    <div id="header">Kingston Uni</div>
    <br>
    <br>
    <div id="navbar">
      <div id="links">
    
      <ul id="MenuBar1" class="MenuBarHorizontal">
        <li><a href="logout.php">Log out</a></li>
</ul>
    </div>
    
    <p><a href="index.php"><span class="KU">KU</span> <span class="Talent">Talent</span></a></p>
    
    </div>
    <div id="box">
      
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
          <li data-target="#myCarousel" data-slide-to="3"></li>
      </ol>
    
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
          <div class="item active">
            <img src="images/kingston2.jpg"  width="940" height="365"> 
          </div>
          
          <div class="item">
            <img src="images/kingston1.jpg"  width="940" height="365">
          </div>
        
          <div class="item">
            <img src="images/kingston5.jpg"  width="940" height="365">
          </div>
    
          <div class="item">
            <img src="images/kingston4.jpg"  width="940" height="365"> 
          </div>
        </div>
    
       
    </div>
    
    </div>
    </div>
    <br>
    <br>
    <br>
    <div id="container">
    <br>
      <div id="box1">
      
       <h2>CV Upload</h2>
<p1>Click the button below to upload your CV</p1>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <form>
          <input style="width: 200px; cursor: pointer; background: #999; color: #000;  font-size: 24;margin-left: 5px;" type="button" value="Click Here" onClick="window.location.href='studentupload.php'" />
</form>
        </p>
      </div>
      <div id="box2"></div>
      <div id="box3"></div>
    </div>
    
    <script type="text/javascript">
    var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
    </script>
    </body>
    </html>
    
    <?php elseif(isset($_SESSION['employer_id']) ): ?> 
    <html>
    <head>
    <meta charset="utf-8">
    <title>CV Submission</title>
    <style type="text/css">
    </style>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="style.css" rel="stylesheet" type="text/css">
    <script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
    <style>
      .carousel-inner > .item > img,
      
      .carousel-inner > .item > a > img {
          width: 100%;
          height:100%;
          max-width:940;
          max-height:365;
          margin: auto;
      }
      .carousel-inner{
              background-color: #062134;
      }
          
      a:link {
        color: #FFFFFF;
    }
      a:hover {
        color: #FFFFFF;
    }
      body {
        background-color: #062134;
    }
      </style>
    <link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css">
    </head>
    <body bgcolor="#062134">
    
    <div id="header">Kingston Uni</div>
    <br>
    <br>
    <div id="navbar">
      <div id="links">
    
      <ul id="MenuBar1" class="MenuBarHorizontal">
        <li><a href="logout.php">Log out</a></li>
</ul>
    </div>
    
    <p><a href="index.php"><span class="KU">KU</span> <span class="Talent">Talent</span></a></p>
    
    </div>
    <div id="box">
      
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
          <li data-target="#myCarousel" data-slide-to="3"></li>
      </ol>
    
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
          <div class="item active">
            <img src="images/kingston2.jpg"  width="940" height="365"> 
          </div>
          
          <div class="item">
            <img src="images/kingston1.jpg"  width="940" height="365">
          </div>
        
          <div class="item">
            <img src="images/kingston5.jpg"  width="940" height="365">
          </div>
    
          <div class="item">
            <img src="images/kingston4.jpg"  width="940" height="365"> 
          </div>
        </div>
    
       
    </div>
    
    </div>
    </div>
    <br>
    <br>
    <br>
    <div id="container">
    <br>
      <div id="box1">
      
       <h2>Download CV</h2>
<p1>Click the button below to show  eapproved CVs</p1>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <form>
          <input style="width: 200px; cursor: pointer; background: #999; color: #000;  font-size: 24;margin-left: 5px;" type="button" value="Click Here" onClick="window.location.href='employerDownload.php'" />
</form>
        </p>
      </div>
      <div id="box2"></div>
      <div id="box3"></div>
    </div>
    
    <script type="text/javascript">
    var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
    </script>
    </body>
    </html>
<?php else: ?> 
 
    <head>
    <meta charset="utf-8">
    <title>CV Submission</title>
    <style type="text/css">
    </style>
   
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="style.css" rel="stylesheet" type="text/css">
    <script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
    <style>
      .carousel-inner > .item > img,
     
      .carousel-inner > .item > a > img {
          width: 100%;
          height:100%;
          max-width:940;
          max-height:365;
          margin: auto;
      }
      .carousel-inner{
              background-color: #062134;
      }
         
      a:link {
        color: #FFFFFF;
    }
      a:hover {
        color: #FFFFFF;
    }
      body {
        background-color: #062134;
    }
      </style>
    <link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css">
    </head>
    <body bgcolor="#062134">
   
    <div id="header">Kingston Uni</div>
    <br>
    <br>
    <div id="navbar">
      <div id="links">
   
      <ul id="MenuBar1" class="MenuBarHorizontal">
        <li><a href="login.php">Login</a></li>
      
        
        <li><a href="register.php">Register</a></li>
    </ul>
    </div>
   
    <p><a href="index.php"><span class="KU">KU</span> <span class="Talent">Talent</span></a></p>
   
    </div>
    <div id="box">
     
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
          <li data-target="#myCarousel" data-slide-to="3"></li>
      </ol>
   
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
          <div class="item active">
            <img src="images/kingston2.jpg"  width="940" height="365">
          </div>
         
          <div class="item">
            <img src="images/kingston1.jpg"  width="940" height="365">
          </div>
       
          <div class="item">
            <img src="images/kingston5.jpg"  width="940" height="365">
          </div>
   
          <div class="item">
            <img src="images/kingston4.jpg"  width="940" height="365">
          </div>
        </div>
   
       
    </div>
   
    </div>
    </div>
    <br>
    <br>
    <br>
    
   
    <script type="text/javascript">
    var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
    </script>
    </body>
 
 
<?php endif; ?>
 
</body>
</html>