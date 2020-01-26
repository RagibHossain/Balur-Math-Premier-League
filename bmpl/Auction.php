<?php


include('connection.php');

$bal = 1000000 ;
$tId = $_SESSION['t_id'];
$result = mysqli_query($link,"SELECT * FROM player WHERE sold= 0 ");
$result1=mysqli_query($link,"SELECT * FROM team WHERE t_id='$tId'");
$numRows = mysqli_num_rows($result);

$bought = mysqli_query($link,"SELECT * FROM player WHERE t_id='$tId' AND sold=1");




$team = mysqli_fetch_array($result1);
$i=1;
$page = $_SERVER['PHP_SELF'];
$sec = "10";
?>


<!DOCTYPE Html>
<html>
<head>
      <meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
<title>Auction</title>    
        <link href="https://fonts.googleapis.com/css?family=Cinzel|Courgette|Press+Start+2P&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Cinzel|Courgette&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Courgette&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/devicons/1.8.0/css/devicons.min.css">

<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
</head>
<body style="background-image: url('images/157-1572191_hd-wallpapers-for-website-background-cool-background-image.jpg')">
    <div class="container pt-5">
        
        <div >
            <h1 class="heading text-center">
            BALUR MATH PREMIER LEAGUE
            
            </h1>
             <h1 class="heading text-center" id="ac">
            Auction Ends In
            
            </h1>
            <h1 id="aucTime" class="text-center" style="color:#8825a1"></h1>
        </div>
        
        <div class="text-right pb-5"> 
            <h2 class="heading"><?php echo $_SESSION['tName'];?></h2>
            <img src="images/<?php echo $_SESSION['logoLoc'];?>" style="width:80px;height:80px" class="rounded m-3">
            <h3 id="bal">Balance : <?php echo $team['balance'];?> $</h3>
            
        
        </div>
        
      <!-- Bought Player list  -->
        
        
        
        
        <div class="text-center">
        Players
            
            <?php 
            
            while($get = mysqli_fetch_array($bought))
            {
                
                
        ?>
            
            <p> <?php $get['p_name'] ; ?></p>
            
            
            
        <?php    
            }
            
            
            ?>
            
        
        </div>
        
        
        <div class="row" id="plList">
            <?php 
            while($row= mysqli_fetch_array($result)){ 
            
            if($row['t_id']) 
            
            
            ?>
            <div class="col-md-3 pb-5">
                
               <div id="p_card<?php echo $row['p_id'];?>" class="card" style="background-color : #182452; height:380px;">
                   
                   <div class="card-header">
                       
                       <h3  class="heading text-center text-color">
                           
                           <?php echo $row['p_name'];?>
                       </h3>
                   </div>
                   
                   <div class="card-body">
                       
                       <img src="images/<?php echo $row['img_location'];?>" class="float-center" style="width:100px ;height : 100px">
                    
                       
                       <p class="mt-2 mb-2 text-color"> <?php echo $row['category'];?></p>
                       
                       <p id="sb<?php echo $row['p_id']?>" style="display:<?php if($row['current_bid']>0) echo "none";?>" class="text-color">Starting Bid : <?php echo $row['starting_bid'];?> mil</p>
                       
                       <p id="cBid<?php echo $row['p_id']?>" class="text-color" style="display:<?php if($row['current_bid']==0) echo "none"; else echo "block";?>">Current Bid : <?php echo $row['current_bid']?></p>
                       
                       <p id="tr<?php echo $row['p_id']?>" class="text-color">Time Remaining</p>
                       
                       <p id="demo" class="text-color"></p>
                       
                       <label class="text-color" hidden>Bid Started</label>
                       
                       <input type="text" value="<?php if($row['t_id']!=0) echo "1";
                                                     else echo "0"; ?>"  hidden>
                       
                       <label  hidden class="text-color">My Bid</label>
                       
                       <input id="myBid<?php echo $row['p_id']?>" type="text" value="<?php if($_SESSION['t_id']==$row['t_id']) echo "1"; // if bidding team id already in the id column of the table
                                                     else echo "0"; ?>" hidden>
                       
                       <label  hidden class="text-color">player id</label>
                       
                       <input id="p_id" type="text" value="<?php echo $row['p_id']?>" hidden>
                       
                       <label > Final Bid </label>
                       
                       <input id="fBid<?php echo $row['p_id'];?>" type="text" value="<?php echo $row['current_bid']?>">
                       
                       <label >Player Serial </label>
                       <input type="text" value="<?php echo $i;?>">
                       
                       <input id="s_time<?php echo $row['p_id']?>" type="number" value="<?php echo $row['start_time'];?>">
                       
                       <input id="e_time<?php echo $row['p_id']?>" type="number" value="<?php echo $row['end_time'];?>">
                       
                       <p id="check<?php echo $row['p_id']?>" class="text-color"> </p>
                       
                       <button id="bidBtn<?php echo $row['p_id']?>" style="display:<?php if($_SESSION['t_id']==$row['t_id']) echo "none";?>" onclick="bid(<?php echo $row['p_id']?>,<?php echo $row['current_bid']?>,<?php echo $_SESSION['t_id'];?>,<?php echo $team['balance'];?>)" name="bidBtn" class="btn btn-dark"> Bid</button>
                       
                   </div>
                
                </div>
            
            </div>
            <?php
            $i++; 
            }
            ?>
        
        </div>
         <button class="float-center" id="view" style="display:none">View Teams</button>
        
        
        
    </div>
    
     <script>
         
         //bid function 
         
         
         function bid(p_id,bid,t_id,bal)
         {
            //var p_id=document.getElementById("p_id").value;
             
            console.log("myBid"+p_id);
             ++bid;
             --bal;
             document.getElementById("myBid"+p_id).value="1";
             document.getElementById("bidBtn"+p_id).style.display="none";
              document.getElementById("cBid"+p_id).innerHTML="Current Bid : "+bid;
             document.getElementById("cBid"+p_id).style.display="block";
            // document.getElementById("sb"+p_id).style.display = "None";
             document.getElementById("bal").innerHTML = "Balance : "+bal+" $"
          $(document).ready(function(){
          $('#cBid'+p_id).load("bid.php",{
                bid : bid,
                p_id : p_id,
                t_id : t_id,
                bal: bal
                
            });
      });
             
             
         }
         
         
// Set the date we're counting down to
var countDownDate = new Date("Jan 26, 2020 10:18:25").getTime();

var countDownDate1 = new Date("Jan 26, 2020 15:40:00").getTime();
         console.log(countDownDate1);
      
         try{ 
             var p_id = document.getElementById("p_id").value; 
            }catch(err){
                
                console.log("handled");
         }
         
        

         // Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  try{  
   
   var f_bid=document.getElementById("fBid"+p_id).value;
    
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date

    if(p_id==1){
    var distance = countDownDate - now;
     var endTime = document.getElementById("e_time"+p_id).value;
        document.getElementById("check"+p_id).innerHTML = endTime ;
    }
    else {
        
       var endTime = document.getElementById("e_time"+p_id).value;
        document.getElementById("check"+p_id).innerHTML = endTime ;
        console.log(" player id "+p_id+" "+endTime +" endtime");
        var distance = endTime*10000 - now;
        
    }
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("demo").innerHTML =minutes + "m " + seconds + "s ";
   
    // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "Sold At "+f_bid+" mil";
      document.getElementById("tr"+p_id).style.display = "None";
   //   document.getElementById("p_card"+p_id).style.display = "None";
  //    document.getElementById("tr"+p_id).style.hidden;
      document.getElementById("cBid"+p_id).style.display="none";
      document.getElementById("sb"+p_id).style.display = "None";
      document.getElementById("bidBtn"+p_id).style.display = "None";
      
          $(document).ready(function(){
          $('#p_card'+p_id).load("sold.php",{
                
                p_id : p_id
                
            });
      });
      
  }
} catch(err){ console.log("solved");}
}, 1000);
         
         
var y = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
    
  // Find the distance between now and the count down date
  var distance = countDownDate1 - now;
    console.log(distance);
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("aucTime").innerHTML = hours+"h "+minutes + "m " + seconds + "s ";
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(y);
      
    // if time is the cards will be hidden and view button will display 
      
    document.getElementById("aucTime").innerHTML = "Auction Ended";
     document.getElementById("ac").style.display = "None";
      document.getElementById("view").style.display = "block";
      document.getElementById("plList").style.display = "None";
  }
}, 1000);  
         
         console.log(y);
         console.log(x);
         
         console.log(new Date("Jan 26, 2020 10:20:00").getTime()+" 8:15 ");
         
         console.log(new Date("Jan 26, 2020 10:22:00").getTime()+" 9:46 ");
         
</script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>  
 <script src="https://use.fontawesome.com/releases/v5.11.2/js/all.js"></script>  
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>  
    
</body>
</html>