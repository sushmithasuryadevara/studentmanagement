<!DOCTYPE html>    
<html>    
<head>    
    <title>Login Form</title>    
    <style type="text/css">
        body  
        {  
            margin: 0;  
            padding: 0;  
            
            font-family: 'Arial';  
        }  
        .login{  
                width: 382px;  
                overflow: hidden;  
                margin: auto;  
                margin: 20 0 0 450px;  
                padding: 80px;  
                background: #8880ca;  
                border-radius: 15px ;  
                  
        }  
        h2{  
            text-align: center;  
            color: #277582;  
            padding: 20px;  
        }  
        label{  
            color: #fff;  
            font-size: 17px;  
        }  
        #Uname{  
            width: 300px;  
            height: 30px;  
            border: none;  
            border-radius: 3px;  
            padding-left: 8px;  
        }  
        #Pass{  
            width: 300px;  
            height: 30px;  
            border: none;  
            border-radius: 3px;  
            padding-left: 8px;  
              
        }  
        #log{  
            width: 300px;  
            height: 30px;  
            border: none;  
            border-radius: 17px;  
            padding-left: 7px;  
            color: blue;  
          
          
        }  
        span{  
            color: white;  
            font-size: 17px;  
        }  
        a{  
            float: right;  
            background-color: grey;  
        } 
    </style>   
</head>    
<body>    
    <h2>Student Management System</h2><br>    
    <div class="login">    
         <?php if(isset($_COOKIE['myLoginErr'])) { ?>
            <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong>Danger!</strong> <?php echo $_COOKIE['myLoginErr'];?>  
          </div>
        <?php }?>
    <form id="login" method="post" action="loginsub.php">    
        <label><b>User Name     
        </b>    
        </label>    
        <input type="text" name="username" id="Uname" placeholder="Username">    
        <br><br>    
        <label><b>Password     
        </b>    
        </label>    
        <input type="Password" name="pass" id="Pass" placeholder="Password">    
        <br><br>    
        <input type="submit" name="loginSub" id="log" value="Log in">       
       
        
    </form>     
</div>    
</body>    
</html>