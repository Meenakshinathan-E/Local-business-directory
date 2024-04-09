<?php 
    include('../common_functions/function.php');
	session_start();
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  href="../style/interface.css"></link>
    <title>Document</title>
</head>
<body>
    <div class="head">
        <header><text>Mn Business</text></header>
    </div>
    
       
    <div class="navigation">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="#contact">Contact</a></li>
           
            <li>
            <form action='' method='GET'>
                    <input type=search id='sd' name='sdata' value="<?php  if(isset($_GET['sdata']))  echo $_GET['sdata']?>">
                    <button type='submit' id='sub'>Search</button>
                 </form>
            </li>
            <li>
                
                <div id='logo'>
                    <?php
                         if(isset($_SESSION['u_id']))
                         {
                            $str=$_SESSION['user'];
                            $l=substr($str,0,1);
                            echo $l;
                         }
                           
                         else
                         {
                             $str="Guest";
                            $l=substr($str,0,1);
                            echo $l;

                         }
                            
                     ?>
                     <ul id='down'>
                     
                           <?php
                           if(!isset($_SESSION['u_id']))
                           {
                               echo"<div><a>Guest</a></div>";
                               echo "<div><a href='out.php?id=t'>Log in</a></div>";  
                              
                           }
                               
                            else
                            {     
                               $g=$_SESSION['user'] ;
                               echo"<div><a class='user-g'>$g</a></div>";
                               echo "<div><a href='out.php?id=f'>Log out</a></div>";
                               echo "<div><a href='checkpayment.php'>Add You business</a></div>";
                                 
                            }
                            ?>
                        
                </ul>
                </div>
                 
            </li>
            
            
        </ul>
    </div>
    <?php  getcatg(); ?>
    <?php  getbusiness(); ?>
        
        <div class="foot" id='contact'>
           <a href="mailto:mn@gmail.com">Mail us</a>
           <a href="tel:+1234567890">Call</a>
           <address>
               48/5,Xavier's colony<br>
               Melapalayam,Tirunelveli

            </address>
        </div>
    
        <script>
        const sd=document.getElementById("sd");
        const sub=document.getElementById("sub");
        sd.addEventListener("keydown",(e)=>{
            console.log(e);
            if(e.key=="Enter")
            {
                
                sub.click();
            }
            
        })
    </script>
    
</body>
</html>