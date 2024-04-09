<?php
  include('../connection/connect.php');
  function getbusiness()
  {
    global $con;
    if(!isset($_GET['sdata']))
    {
    if(!isset($_GET['c_id']))
    {
      if(!isset($_GET['b_id']))
      {
        
        $qry="Select * from business  where status='Verified' order by rand()";
        $res=mysqli_query($con,$qry);
        echo "<div class='container'>";
                
      
      while($row=mysqli_fetch_assoc($res))
      {
        $uid=$row['u_id'];
        $ext=explode(',',$row['image']);
        $e=$ext[0];
        $qry1="select * from user where u_id=$uid ";
        $r=mysqli_query($con,$qry1);
        while($row1=mysqli_fetch_assoc($r))
        {
          $mail=$row1['email'];
        }
        $id=$row['b_id'];
        echo"<div class='business'>";
        echo"<img src='upload/$id/0.$e' alt='business' width='150px' height='150px'/>";
        echo"<div class='business-details' >";
          
         echo"
          <h4>$row[b_name]</h4>
          <p>$row[building]</p>
          <p >$row[descrip]</p>
          <a class='btn' href='mailto:$mail'>Send mail</a>
          
          <a href='businessdetail.php?b_id=$id' class='btn'>View more</a>
          ";
          echo"</div>";
          echo"</div>";
      }                         
      
                
            echo"</div>";
            
              
          }

        }
    }
    if(!(isset($_GET['sdata'])))
    {
      if(isset($_GET['c_id']))
       {
        $c=(int)$_GET['c_id'];
        $qry="Select * from business where catg=$c and status='Verified'";
        $res=mysqli_query($con,$qry);
        $n=mysqli_num_rows($res);
        if($n==0)
          echo"<h1>No data</h1>";
        else
        {
          echo "<div class='container'>";
          while($row=mysqli_fetch_assoc($res))
          {
            $uid=$row['u_id'];
            $ext=explode(',',$row['image']);
            $e=$ext[0];
            $qry1="select * from user where u_id=$uid";
            $r=mysqli_query($con,$qry1);
            while($row1=mysqli_fetch_assoc($r))
            {
              $mail=$row1['email'];
            }
            $id=$row['b_id'];
            echo"<div class='business'>";
            echo"<img src='upload/$id/0.$e' alt='business' width='150px' height='150px'/>";
            echo"<div class='business-details'>";
              
             echo"
              <h4>$row[b_name]</h4>
              <p>$row[building]</p>
              <p>$row[descrip]</p>
              <a class='btn' href='mailto:$mail'>Send mail</a>
              
              <a href='businessdetail.php?b_id=$id' class='btn'>View more</a>
              ";
              echo"</div>";
              echo"</div>";
          }         
      echo"</div>";
        }
        
    }
    }

    if(isset($_GET['sdata']))
    {
        $key=$_GET['sdata'];
        $qry="Select * from business where status='Verified' and (b_name like '%$key%' or city like '%$key%' or landmark like '%$key%') order by rand()";
      
        $res=mysqli_query($con,$qry);
        $n=mysqli_num_rows($res);
        if($n==0)
           echo"<h1>No data</h1>";
        else
        {
          echo "<div class='container'>";
          while($row=mysqli_fetch_assoc($res))
          {
            $uid=$row['u_id'];
            $qry1="select * from user where u_id=$uid";
            $r=mysqli_query($con,$qry1);
            while($row1=mysqli_fetch_assoc($r))
            {
              $mail=$row1['email'];
            }
            $ext=explode(',',$row['image']);
            $e=$ext[0];
            $id=$row['b_id'];
            echo"<div class='business'>";
            echo"<img src='upload/$id/0.$e' alt='business' width='150px' height='150px'/>";
            echo"<div class='business-details'>";
              
             echo"
              <h4>$row[b_name]</h4>
              <p>$row[building]</p>
              <p  >$row[descrip]</p>
              <a class='btn' href='mailto:$mail'>send mail</a>
              
              <a href='businessdetail.php?b_id=$id' class='btn'>View more</a>
              ";
              echo"</div>";
              echo"</div>";
          }         
      echo"</div>";
        }
        
        
    }
   
      if(isset($_GET['b_id']))
       {
        session_start();
        if(isset($_SESSION['u_id']))
        {
        $id=(int)$_GET['b_id'];
        $qry="Select * from business where b_id=$id and status='Verified'";
        $res=mysqli_query($con,$qry);
        $n=mysqli_num_rows($res);
        if($n==0)
          echo"<h1>No data</h1>";
        else
              {
       while($row=mysqli_fetch_array($res))
       {
           $id=$row['b_id'];
           $catg=$row['catg'];
           $uid=$row['u_id'];
           $qry1="select * from user where u_id=$uid";
           $r=mysqli_query($con,$qry1);
           while($row1=mysqli_fetch_assoc($r))
           {
             $mail=$row1['email'];
           }
           $ext=explode(',',$row['image']);
           $e=$ext[0];
           echo"
           <div class='bu'>
           <main>
             <header>
                 <aside><img src='upload/$id/0.$e'/></aside>
                 <div>
                     <h1>$row[b_name]</h1>
                     <h2>Contact Person : $row[con_person]</h2>
                     <h3>Mobile number : <a href='tel:+91 $row[mobile]'>$row[mobile]</a></h3>
                     <h3>Mail :<a href='mailto:$mail'>$mail</a></h3>
                 </div>
             </header>
           </main>";
            echo"
            <main>
                <section>
                    <h2>About Us</h2>
                    <p>Description</p>
                    <p>$row[descrip]</p>
                </section>                    
            </main>
            </div>";
            echo"
            <main>
            <section>
                 <h2>Address</h2>
                 <p>Building name : $row[building]</p>
                 <p>Street : $row[street]</p>
                 <p>Landmark : $row[landmark]</p>
             </section>
            </main>";

                     
            if(count($ext)>2)
            {
              echo"
              <main>
                  <section>
                    <h2>Additional Photos</h2>
                    <div class='galery'>";
                        for($i=1;$i<count($ext)-1;$i++)
                           echo" <img src='upload/$id/$i.$e'/>";
               echo"</div>
                  </section>
              </main>";
            }
            $qry2="select * from timing where b_id=$id";
            $r2=mysqli_query($con,$qry2);
            while($row2=mysqli_fetch_assoc($r2))
            {
              $mon=$row2['mon'];
              $m=explode('*',$mon);
              $tue=$row2['tue'];
              $tu=explode('*',$tue);
              $wed=$row2['wed'];
              $w=explode('*',$wed);
              $thur=$row2['thur'];
              $th=explode('*',$thur);
              $fri=$row2['fri'];
              $f=explode('*',$fri);
              $sat=$row2['sat'];
              $sa=explode('*',$sat);
              $sun=$row2['sun'];
              $su=explode('*',$sun);
            }
            echo"
 <main>
     <section>
         <h2>Business Hours</h2>
         <div class='timing'>
           <table>
             <tr>
               <th>Day</th>
               <th>Opening Time</th>
               <th>Closing Time</th>
             </tr>
             <tr>
               <td>Monday</td>";
               if($m[0]==0)
               {
                 echo"<td>Holiday</td><td>Holiday<td>";
               }
               else
               {
                  echo" <td>$m[0]-$m[1]</td>
                 <td>$m[2]-$m[3]</td>";
               }
               
            echo" </tr>
             <tr>
               <td>Tuesday</td>";
               if($tu[0]==0)
               {
                 echo"<td>Holiday</td><td>Holiday<td>";
               }
               else
               {
                  echo" <td>$tu[0]-$tu[1]</td>
                 <td>$tu[2]-$tu[3]</td>";
               }
            echo" </tr>
             <tr>
               <td>Wednesday</td>";
               if($w[0]==0)
               {
                 echo"<td>Holiday</td><td>Holiday<td>";
               }
               else
               {
                  echo" <td>$w[0]-$w[1]</td>
                 <td>$w[2]-$w[3]</td>";
               }
  echo" </tr>
   <tr>
     <td>Thursday</td>";
     if($th[0]==0)
     {
       echo"<td>Holiday</td><td>Holiday<td>";
     }
     else
     {
        echo" <td>$th[0]-$th[1]</td>
       <td>$th[2]-$th[3]</td>";
     }
   echo"</tr>
   <tr>
     <td>Friday</td>";
     if($f[0]==0)
     {
       echo"<td>Holiday</td><td>Holiday<td>";
     }
     else
     {
        echo" <td>$f[0]-$f[1]</td>
       <td>$f[2]-$f[3]</td>";
     }
  echo" </tr>
   <tr>
     <td>Saturday</td>";
     if($sa[0]==0)
     {
       echo"<td>Holiday</td><td>Holiday<td>";
     }
     else
     {
        echo" <td>$sa[0]-$sa[1]</td>
       <td>$sa[2]-$sa[3]</td>";
     }
   echo"</tr>
   <tr>
     <td>Sunday</td>";
    if($su[0]==0)
    {
      echo"<td>Holiday</td><td>Holiday<td>";
    }
    else
    {
       echo" <td>$su[0]-$su[1]</td>
      <td>$su[2]-$su[3]</td>";
    }
                                    
   echo"  </tr>
               </table>                              
             </div>
         </section>
     </main>";
 }
  }
  echo"<div class='related'>"; 
  $qry1="Select * from business  where catg=$catg and b_id!=$id and status='Verified' ";
  $r=mysqli_query($con,$qry1);
  $n=mysqli_num_rows($r);
  if($n>0)
  {
    echo"<h1>Related Business</h1>";
    while($row2=mysqli_fetch_assoc($r))
        {
          
             $u=$row2['u_id'];
             $id=$row2['b_id'];
             $qry2="select * from user where u_id=$u";
             $r1=mysqli_query($con,$qry2);
             while($row1=mysqli_fetch_assoc($r1))
             {
               $mail=$row1['email'];
             }
             
             
            
             echo"<div class='business'>";
             echo"<img src='upload/$id/0.$e' alt='business' width='150px' height='150px'/>";
             echo"<div class='business-details'>";
                           
            echo"
             <h4>$row2[b_name]</h4>
             <p>$row2[building]</p>
             <p  >$row2[descrip]</p>
             <a class='btn' href='mailto:$mail'>send mail</a>
             
             <a href='businessdetail.php?b_id=$id' class='btn'>View more</a>
             ";
             echo"</div>";
             echo"</div>";
                    }         

              }
              echo"</div>";
        }
        else
        {
          echo "<div class='alert'>
                <div class='a'><h2>To view more information you need to login</h2></div>
                <div class='b'>
                  <a href='log.php'>Login</a>
                  <a href='index.php'>Cancel</a>
                </div>
          </div>";
        }
        

        
        
       }
    
  }



  function getcatg()
  {
    global $con;
    $step=0;
    $qry="Select * from category limit 20";
    $res=mysqli_query($con,$qry);
    echo"<div class='catg'>";
       echo"<ul>";
    
          while($row=mysqli_fetch_array($res))
          {
                echo"<li><a href='index.php?c_id=$row[c_id]'>$row[c_name]</a></li>";
                $step=$step+1;
                if($step>19)
                {
                  echo"<li><a href='cat.php'>view more</a></li>";
                  break;
                }
                 
          }
          
      echo"<ul>";
    echo"</div>";

  }
?>