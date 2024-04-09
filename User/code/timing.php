<?php
 if(isset($_POST['sub']))
       {
        $mon=$_POST['mon1']."*".$_POST['mon2']."*".$_POST['mon3']."*".$_POST['mon4'];
        $tue=$_POST['tue1']."*".$_POST['tue2']."*".$_POST['tue3']."*".$_POST['tue4'];
        $wed=$_POST['wed1']."*".$_POST['wed2']."*".$_POST['wed3']."*".$_POST['wed4'];
        $thur=$_POST['thur1']."*".$_POST['thur2']."*".$_POST['thur3']."*".$_POST['thur4'];
        $fri=$_POST['fri1']."*".$_POST['fri2']."*".$_POST['fri3']."*".$_POST['fri4'];
        $sat=$_POST['sat1']."*".$_POST['sat2']."*".$_POST['sat3']."*".$_POST['sat4'];
        $sun=$_POST['sun1']."*".$_POST['sun2']."*".$_POST['sun3']."*".$_POST['sun4'];
        session_start();
        $_SESSION['t1']=$mon;
        $_SESSION['t2']=$tue;
        $_SESSION['t3']=$wed;
        $_SESSION['t4']=$thur;
        $_SESSION['t5']=$fri;
        $_SESSION['t6']=$sat;
        $_SESSION['t7']=$sun;
        header('location:business1.php');
       }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../style/timing.css"></link>
</head>
<body>
    <div class="container">
        <form action=""id="form" method="POST">
            <h1>Timing Detail</h1>
            <div class="box">
                <strong><label>Select hours of opening</label></strong>
                <div>
                  <strong><label for="time">Select all</label></strong>
                   <input type="checkbox" name="check" id="time">
                </div>
           </div>
        <div class="input-control">
            <label class="day">Mon</label>
            <div class="time">
                <select class="opt" id="t1" name='mon1'>
                    <option value="12" selected>12</option>
                    <option value="11">11</option>
                    <option value="10">10</option>
                    <option value="9">9</option>
                    <option value="8">8</option>
                    <option value="7">7</option>
                    <option value="6">6</option>
                    <option value="5">5</option>
                    <option value="4">4</option>
                    <option value="3">3</option>
                    <option value="2">2</option>
                    <option value="1">1</option>
                    <option value="0">Holiday</option>
                </select>
                <select class="opt" id="t2" name='mon2'>
                    <option value="am"selected>am</option>
                    <option value="pm">pm</option>
                </select>
            </div>
            <label>to</label>
            <div class="time">
                <select class="opt" id="t3" name='mon3'>
                     <option value="12" selected>12</option>
                     <option value="11">11</option>
                     <option value="10">10</option>
                     <option value="9">9</option>
                     <option value="8">8</option>
                     <option value="7">7</option>
                     <option value="6">6</option>
                     <option value="5">5</option>
                     <option value="4">4</option>
                     <option value="3">3</option>
                     <option value="2">2</option>
                     <option value="1">1</option>
                     <option value="0">Holiday</option>
               </select>
               <select class="opt" id="t4" name='mon4'>
                  <option value="am">am</option>
                   <option value="pm" selected>pm</option>
               </select>
           </div>
    </div>
    <div class="input-control">
            <label  class="day">Tue</label>
            <div class="time">
                <select class="opt" id="t1" name="tue1">
                    <option value="12" selected>12</option>
                    <option value="11">11</option>
                    <option value="10">10</option>
                    <option value="9">9</option>
                    <option value="8">8</option>
                    <option value="7">7</option>
                    <option value="6">6</option>
                    <option value="5">5</option>
                    <option value="4">4</option>
                    <option value="3">3</option>
                    <option value="2">2</option>
                    <option value="1">1</option>
                    <option value="0">Holiday</option>
                </select>
                <select class="opt" id="t2" name="tue2">
                    <option value="am"selected>am</option>
                    <option value="pm">pm</option>
                </select>
            </div>
            <label>to</label>
            <div class="time">
                <select class="opt" id="t3" name="tue3">
                     <option value="12" selected>12</option>
                     <option value="11">11</option>
                     <option value="10">10</option>
                     <option value="9">9</option>
                     <option value="8">8</option>
                     <option value="7">7</option>
                     <option value="6">6</option>
                     <option value="5">5</option>
                     <option value="4">4</option>
                     <option value="3">3</option>
                     <option value="2">2</option>
                     <option value="1">1</option>
                     <option value="0">Holiday</option>
               </select>
               <select class="opt" id="t4" name="tue4">
                  <option value="am">am</option>
                   <option value="pm" selected>pm</option>
               </select>
           </div>
    </div>
    <div class="input-control">
            <label  class="day">Wed</label>
            <div class="time">
                <select class="opt" id="t1" name='wed1'>
                    <option value="12" selected>12</option>
                    <option value="11">11</option>
                    <option value="10">10</option>
                    <option value="9">9</option>
                    <option value="8">8</option>
                    <option value="7">7</option>
                    <option value="6">6</option>
                    <option value="5">5</option>
                    <option value="4">4</option>
                    <option value="3">3</option>
                    <option value="2">2</option>
                    <option value="1">1</option>
                    <option value="0">Holiday</option>
                </select>
                <select class="opt"id="t2" name='wed2'>
                    <option value="am"selected>am</option>
                    <option value="pm">pm</option>
                </select>
            </div>
            <label>to</label>
            <div class="time">
                <select class="opt" id="t3" name='wed3'>
                     <option value="12" selected>12</option>
                     <option value="11">11</option>
                     <option value="10">10</option>
                     <option value="9">9</option>
                     <option value="8">8</option>
                     <option value="7">7</option>
                     <option value="6">6</option>
                     <option value="5">5</option>
                     <option value="4">4</option>
                     <option value="3">3</option>
                     <option value="2">2</option>
                     <option value="1">1</option>
                     <option value="0">Holiday</option>
               </select>
               <select class="opt" id="t4" name='wed4'>
                  <option value="am">am</option>
                   <option value="pm" selected>pm</option>
               </select>
           </div>
    </div>
    <div class="input-control">
            <label  class="day">Thur</label>
            <div class="time">
                <select class="opt" id="t1" name='thur1'>
                    <option value="12" selected>12</option>
                    <option value="11">11</option>
                    <option value="10">10</option>
                    <option value="9">9</option>
                    <option value="8">8</option>
                    <option value="7">7</option>
                    <option value="6">6</option>
                    <option value="5">5</option>
                    <option value="4">4</option>
                    <option value="3">3</option>
                    <option value="2">2</option>
                    <option value="1">1</option>
                    <option value="0">Holiday</option>
                </select>
                <select class="opt" id="t2" name='thur2'>
                    <option value="am"selected>am</option>
                    <option value="pm">pm</option>
                </select>
            </div>
            <label>to</label>
            <div class="time">
                <select class="opt" id="t3" name='thur3'>
                     <option value="12" selected>12</option>
                     <option value="11">11</option>
                     <option value="10">10</option>
                     <option value="9">9</option>
                     <option value="8">8</option>
                     <option value="7">7</option>
                     <option value="6">6</option>
                     <option value="5">5</option>
                     <option value="4">4</option>
                     <option value="3">3</option>
                     <option value="2">2</option>
                     <option value="1">1</option>
                     <option value="0">Holiday</option>
               </select>
               <select class="opt" id="t4" name='thur4'>
                  <option value="am">am</option>
                   <option value="pm" selected>pm</option>
               </select>
           </div>
    </div>
    <div class="input-control">
            <label  class="day">Fri</label>
            <div class="time">
                <select class="opt" id="t1" name="fri1">
                    <option value="12" selected>12</option>
                    <option value="11">11</option>
                    <option value="10">10</option>
                    <option value="9">9</option>
                    <option value="8">8</option>
                    <option value="7">7</option>
                    <option value="6">6</option>
                    <option value="5">5</option>
                    <option value="4">4</option>
                    <option value="3">3</option>
                    <option value="2">2</option>
                    <option value="1">1</option>
                    <option value="0">Holiday</option>
                </select>
                <select class="opt" id="t2"  name="fri2">
                    <option value="am"selected>am</option>
                    <option value="pm">pm</option>
                </select>
            </div>
            <label>to</label>
            <div class="time">
                <select class="opt" id="t3"  name="fri3">
                     <option value="12" selected>12</option>
                     <option value="11">11</option>
                     <option value="10">10</option>
                     <option value="9">9</option>
                     <option value="8">8</option>
                     <option value="7">7</option>
                     <option value="6">6</option>
                     <option value="5">5</option>
                     <option value="4">4</option>
                     <option value="3">3</option>
                     <option value="2">2</option>
                     <option value="1">1</option>
                     <option value="0">Holiday</option>
               </select>
               <select class="opt" id="t4"  name="fri4">
                  <option value="am">am</option>
                   <option value="pm" selected>pm</option>
               </select>
           </div>
    </div>
    <div class="input-control">
            <label  class="day">Sat</label>
            <div class="time">
                <select class="opt" id="t1" name='sat1'>
                    <option value="12" selected>12</option>
                    <option value="11">11</option>
                    <option value="10">10</option>
                    <option value="9">9</option>
                    <option value="8">8</option>
                    <option value="7">7</option>
                    <option value="6">6</option>
                    <option value="5">5</option>
                    <option value="4">4</option>
                    <option value="3">3</option>
                    <option value="2">2</option>
                    <option value="1">1</option>
                    <option value="0">Holiday</option>
                </select>
                <select class="opt" id="t2" name='sat2'>
                    <option value="am">am</option>
                    <option value="pm" selected>pm</option>
                </select>
            </div>
            <label>to</label>
            <div class="time">
                <select class="opt" id="t3" name='sat3'>
                     <option value="12" selected>12</option>
                     <option value="11">11</option>
                     <option value="10">10</option>
                     <option value="9">9</option>
                     <option value="8">8</option>
                     <option value="7">7</option>
                     <option value="6">6</option>
                     <option value="5">5</option>
                     <option value="4">4</option>
                     <option value="3">3</option>
                     <option value="2">2</option>
                     <option value="1">1</option>
                     <option value="0">Holiday</option>
               </select>
               <select class="opt" id="t4" name='sat4'>
                  <option value="am">am</option>
                   <option value="pm" selected>pm</option>
               </select>
           </div>
    </div>
    <div class="input-control">
            <label class="day">Sun</label>
            <div class="time">
                <select class="opt" id="t1" name='sun1'>
                    <option value="12" selected>12</option>
                    <option value="11">11</option>
                    <option value="10">10</option>
                    <option value="9">9</option>
                    <option value="8">8</option>
                    <option value="7">7</option>
                    <option value="6">6</option>
                    <option value="5">5</option>
                    <option value="4">4</option>
                    <option value="3">3</option>
                    <option value="2">2</option>
                    <option value="1">1</option>
                    <option value="0">Holiday</option>
                </select>
                <select class="opt" id="t2"  name='sun2'>
                    <option value="am"selected>am</option>
                    <option value="pm">pm</option>
                </select>
            </div>
            <label>to</label>
            <div class="time">
                <select class="opt" id="t3"  name='sun3'>
                     <option value="12" selected>12</option>
                     <option value="11">11</option>
                     <option value="10">10</option>
                     <option value="9">9</option>
                     <option value="8">8</option>
                     <option value="7">7</option>
                     <option value="6">6</option>
                     <option value="5">5</option>
                     <option value="4">4</option>
                     <option value="3">3</option>
                     <option value="2">2</option>
                     <option value="1">1</option>
                     <option value="0">Holiday</option>
               </select>
               <select class="opt" id="t4"  name='sun4'>
                  <option value="am">am</option>
                   <option value="pm" selected>pm</option>
               </select>
           </div>
    </div>
    
    <button type="submit" name='sub'>Next</button>
</form>
</div>
</body>
</html>
<script>
    const t1s=document.querySelectorAll("#t1");
    const t3s=document.querySelector("#t3 ");
    const dayselect={"mon1":"mon3","tue1":"tue3","wed1":"wed3","thur1":"thur3","fri1":"fri3","sat1":"sat3","sun1":"sun3"};
    for(var i=0;i<t1s.length;i++)
    {
        console.log(t1s[i]);
        t1s[i].addEventListener("change",(e)=>{
            console.log(i);
            console.log(e.target.name);
            day=dayselect[e.target.name];
            sel=document.querySelector("select[name="+day+"]");
            console.log(sel);
            if(e.target.value==0)
            sel.value=e.target.value;
        })
    }
 
    // t1s.addEventListener("change",(e)=>{
    //     if(e.target.value==0)
    //     t3s.value=e.target.value;
    // })
 

    function selectall()
    {
        t1=document.getElementById('t1').value;
        t2=document.getElementById('t2').value;
        t3=document.getElementById('t3').value;
        t4=document.getElementById('t4').value;
       
        const select=document.querySelectorAll(".input-control .time select");
        select.forEach(element => {
            if(element.id=='t1')
               element.value=t1;
            if(element.id=='t2')
              element.value=t2;
            if(element.id=='t3')
              element.value=t3;
            if(element.id=='t4')
              element.value=t4;
            
        });
    }
    var checkbox=document.getElementById('time');
    checkbox.addEventListener('change',(event)=>
    {
        if(event.target.checked)
           selectall();
        else
           console.log('unclick');
    })
    
</script>