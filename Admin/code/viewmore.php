<style>
body
{
    background-color:rgb(192,249,192);
}
header
{
    background-color: #339e66ff;
    color:#fff;
    padding: 20px;
    display: flex;
    box-shadow: 0px 2px 4px rgba(0,0,0,0.1);
    border-radius: 8px;
}
header h1,header h2,header p
{
    margin: 5px 0px;
}
header img
{
    width: 10rem;
    height: 10rem;
    margin-right: 30px;
   
}
main{
    padding: 20px;
}
section
{
    margin-bottom: 30px;
    border: 2px solid #666;
    padding: 15px;
    background-color: #a2e7f3;
    box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    border-radius: 8px;
    font-size:25px;

}
section:hover
{
    background-color:rgb(215,247,245);
    transform: translateY(-5px);
    box-shadow: 0px 0px 20px rgba(0,0,0,0.2);
}
.timing
{
    overflow-x: auto;
}
table
{
    font-size:25px;
    width: 100%;
    border-collapse: collapse;
}
table,th,td{
    padding: 8px;
    text-align: left;
}
th
{
    background-color: #a2e7f3;
}


/* galerly */

.galery
{
   background-color: #ccc;
    padding:30px;
    display:flex;
    flex-direction: row;
    align-items: flex-start;
    gap:4rem;
}

.galery img
{
    width: 10rem;
    height: 10rem;
    border-radius: 10px;
    border: 1px solid lightblue;
    box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
}
.galery img:hover
{
    transform: translateY(-5px);
    box-shadow: 0px 0px 20px rgba(0,0,0,0.2);
}


/* navigation drop dowm */
#logo
{
    background-color: antiquewhite;
    padding: 10px;
    border-radius: 50%;
    margin-top: 10px;
}
#down
{
    display: none;
   
}
#logo:hover  #down
{
  
    display: flex;
    flex-direction: column;
    position: absolute;
    top:160px;
    right:8px;
    z-index: 10;
    height: fit-content;
    border-radius: 10px;
    background-color: #ccc;
    
    
}
#down div
{
    margin-top: 10px;
    padding:5px 15px;
    border-radius:5px;
    transition:background-color 0.3s ease;
    font-size:16px;
    padding: 10px;
    
}
#down a
{
    color:#fff;
    text-decoration:none;
    border-radius:5px;
   
}
#down a:hover 
{
    width: max-content;
}

</style>
<?php
include('../connection/connect.php');
$id=(int)$_GET['id'];
              $qry="Select * from business where b_id=$id";
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
                            <aside><img src='../../user/code/upload/$id/0.$e'/></aside>
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
                                     echo" <img src='../../user/code/upload/$id/$i.$e'/>";
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
?>