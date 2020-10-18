<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="wheel1.css">
    <link rel="stylesheet" href="bet-table.css">
    <link rel="stylesheet" href="login-page.css">
    <link rel="stylesheet" href="remain.css">
    
    <style>
        body{
            /*background-color: #000080;*/
              background-color: #03bb85;
              
        }
        #but-log{
            position:relative;
            left:0px;
            top: 0px;
          
        }
        #but-rules{
            position:relative;
            left:0px;
            top: 0px;
            }  
            #but-sign{
            position:relative;
            left:0px;
            top: 0px;
          
        }
        #web-name{
            font-size: 50px;
            color:#03bb85 ;
        }
    </style>
    
</head>
<!------------------------------------Head Closeing----------------------------------------------------->

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a id="web-name" class="navbar-brand" href="#">BET\/LORD</a>
        <button type="button"style="color:white; position: relative; left:0px; top:0px" class="btn btn-link"><strong>Rules</strong></button>
        <button type="button" style="color:white; position:relative; left:0px; top:0px" class="btn btn-link"><strong>How To Play</strong> </button>
         <?php session_start();
         echo"<h3 style='color:white;position:relative;left:975px'>Welcome<h3>"."<h3 style='color:#03bb85;position:relative; left:1000px'>" . $_SESSION['uname']."<h3>";
         
         if(isset($_POST['bet-form'])&& !empty($_POST['bet-form']))
         {  
                
            $amt=$_REQUEST['bet-amt'];
              
            
               if (is_numeric($amt))
               {
                   $connect = new mysqli("localhost:3308" , "root" ,"" ,"betlord"); 
                    $uname=$_SESSION['uname'];
                   
               
                   $sql="SELECT amount FROM userdata WHERE uname = '$uname' ";
               
                   $result = mysqli_query($connect ,$sql);
                   
                   
                  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                  $availamt=$row['amount'];
                  
                    
                       if($amt<$availamt)
                       {
                           $newbalance = $availamt - $amt;
                           $updateamt="UPDATE userdata SET amount='$newbalance' WHERE uname='$uname' ";
                           $finalresult = mysqli_query($connect ,$updateamt);
                           //$row1=mysqli_fetch_array($finalresult,MYSQLI_ASSOC);
                           //echo $row1['amount'];
                       }
            
                       else
                       {
                           echo"<script>alert('Insufficent Balance')</script>";
                       }
                       
                   
               }
            
               else
               {
                   echo '<script>alert("Invalid Entry")</script>';
               }
         }

  ?>      
       <?php
       //--------------------------------------------------------------Code for displaying amount on header----------------------------------------------------------------//
        
         $connect = new mysqli("localhost:3308" , "root" ,"" ,"betlord"); 
                $uname=$_SESSION['uname'];
               
           
               $sql="SELECT amount FROM userdata WHERE uname = '$uname' ";
           
               $result = mysqli_query($connect ,$sql);
               
               
              $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
              $availamt=$row['amount'];

              //-----------------------------------------------------------------------------------------------------------------------------------------------------//
         echo"<h3 style='color:#03bb85;position:relative;left:1150px;'>".$availamt."</h3>";
        ?> 
        
        <button type="button" id="but-log" class="btn btn-danger">Log-Out</button>
        <img style="position: relative;left:950px;border-radius:25%;" src="images/coin.jpeg">
         </nav>
<!-------------------------------------------------------------------------- Wheel html code------------------------------------------------------------------------------->
<div>  <!---------------------------------------------------Big div Starting----------------------------------------->
<div style="width:fit-content; position:relative; left:900px;top:90px;visibility:hidden;" id="confirm-bet-div" class="alert alert-dismissible alert-secondary">
  <strong style="text-align: center;" id="confirm-inner-text"></strong>
  <button style="position: relative;left:20px;" type="button" class="btn btn-dark" id="confirm-bet-num" onclick="ConfirmNum()">PLACE</button>
</div>
<div class='mainbox'>
    <div id="box" class="box" style="background-color: black;" >
        <div class="box1">
            <span class="span1"><b>1</b></span>
            <span class="span5"><b>13</b></span>
            <span class="span9"><b>9</b></span>
            <span class="span13"><b>5</b></span>   
        </div>

        <div class="box2">
            <span class="span1"><b>15</b></span>
            <span class="span5"><b>11</b></span>
            <span class="span9"><b>7</b></span>
            <span class="span13"><b>3</b></span>
           

        </div>

        <div class="box3">
            <span class="span2" ><b>16</b></span>
            <span class="span8"><b>10</b></span>
            <span class="span10"><b>8</b></span>
            <span class="span16"><b>2</b></span>
            
            
        </div>
        <div class="box4">

            <span class="span4"><b>14</b></span>
            <span class="span6"><b>12</b></span>
            <span class="span12"><b>6</b></span>
            <span class="span14"><b>4</b></span>
        </div>
    </div>
    <button class="spin" onclick="Angle()">SPIN</button>
  <!---------------------------------------------------------------Alert For Bet Amount-------------------------------------------------------------------------------------->  
    <div style="position:relative;left:250px;top:140px;width:fit-content;visibility:hidden;" id="myPopup" class="alert alert-dismissible alert-danger">
    <strong><center>Please Place a Bet</center></strong> 
    </div>
    
    <div>
    <img class="arrow" src="images/right_arrow.png" alt="">
    </div>
        </div>
  <!-------------------------------------------------------------------------- /\Wheel html code/\-------------------------------------------------------------------------------> 

<button style="position: relative;left:1200px;top:-200px;width:200px;height:60px ;font-size:30px;color:#03bb85" type="button" class="btn btn-dark" id="play-btn" onclick="Display()"><strong>PLAY</strong></button>
<div class="bet-table" id="bet-table">

<input type="hidden" id="input-store">
<div style="visibility:hidden ;" class="bet-table-1" id="bet-table-num">
    <table>
        <form method="POST" name="form1">
        <!--<input type="hidden" name="postvar" value="" -->

        <tr>
            <td><input type="button" class="bet-button-black default" name="bet-button" id="id1" onclick="InputNum('1','bet-table-num')" value="1"></td>
            <td><input type="button" class="bet-button-black default" name="bet-button" id="id3" onclick="InputNum('3','bet-table-num')" value="3"></td>
            <td><input type="button" class="bet-button-black default" name="bet-button" id="id5" onclick="InputNum('5','bet-table-num')" value="5"></td>
            <td><input type="button" class="bet-button-black default" name="bet-button" id="id7" onclick="InputNum('7','bet-table-num')" value="7"></td>
            <td><input type="button" class="bet-button-black default" name="bet-button" id="id9" onclick="InputNum('9','bet-table-num')" value="9"></td>
            <td><input type="button" class="bet-button-black default" name="bet-button" id="id11" onclick="InputNum('11','bet-table-num')" value="11"></td>
            <td><input type="button" class="bet-button-black default" name="bet-button" id="id13" onclick="InputNum('13','bet-table-num')" value="13"></td>
            <td><input type="button" class="bet-button-black default" name="bet-button" id="id15" onclick="InputNum('15','bet-table-num')" value="15"></td>
        </tr>

        <tr>
            <td><input type="button" class="bet-button-red default" name="bet-button" id="id2" onclick="InputNum('2','bet-table-num')" value="2"></td>
            <td><input type="button" class="bet-button-red default" name="bet-button" id="id4" onclick="InputNum('4','bet-table-num')" value="4"></td>
            <td><input type="button" class="bet-button-red default" name="bet-button" id="id6" onclick="InputNum('6','bet-table-num')" value="6"></td>
            <td><input type="button" class="bet-button-red default" name="bet-button" id="id8" onclick="InputNum('8','bet-table-num')" value="8"></td>
            <td><input type="button" class="bet-button-red default" name="bet-button" id="id10" onclick="InputNum('10','bet-table-num')" value="10"></td>
            <td><input type="button" class="bet-button-red default" name="bet-button" id="id12" onclick="InputNum('12','bet-table-num')" value="12"></td>
            <td><input type="button" class="bet-button-red default" name="bet-button" id="id14" onclick="InputNum('14','bet-table-num')" value="14"></td>
            <td><input type="button" class="bet-button-red default" name="bet-button" id="id16" onclick="InputNum('16','bet-table-num')" value="16"></td>
        </tr>
        </form>
        
    </table>
    </div>
    <div style="visibility:hidden ;" class="bet-table-2" id="bet-table-range">
        <table>
            <form method="POST" name="form2">
            <tr>
                <td><input type="button" class="bet-button-range" value="1-8" onclick="InputNum('128','bet-table-range')"></td>
                <td><input type="button" class="bet-button-range" value="9-16"onclick="InputNum('9216','bet-table-range')"></td>
            </tr>
            </form>
        </table>
    </div>
    <div style="visibility:hidden ;" class="bet-table-3" id="bet-table-color">
        <table>
            <form method="POST" name="form3">
            <tr>
                <td><input type="button"class="last-row odd-even" id="id-even" value="EVEN" onclick="InputNum('even','bet-table-color')"></td>
                <td><input type="button"class="last-row red-black" id="id-red" style="background-color: red;" value="RED" onclick="InputNum('red','bet-table-color')"></td>
                <td><input type="button"class="last-row red-black" id="id-black" style="background-color: black;" value="BLACK" onclick="InputNum('black','bet-table-color')"></td>
                <td><input type="button"class="last-row odd-even" id="id-odd" value="ODD" onclick="InputNum('odd','bet-table-color')"></td>
            </tr>
            </form>
        </table>
    </div>
</div>
<div style="width:fit-content; position:relative; left:1100px;top:-1000px;visibility:hidden;" id="confirm-range-div" class="alert alert-dismissible alert-secondary">
  <strong style="text-align: center;" id="">Bet On Range From 1-8 to 9-16 </strong>
  <button style="position: relative;left:20px;" type="button" class="btn btn-dark" id="confirm-Range" onclick="ConfirmRange()">PLACE</button>
</div>

<div style="width:fit-content; position:relative; left:1450px;top:-850px;visibility:hidden;" id="confirm-color-div" class="alert alert-dismissible alert-secondary">
  <strong style="text-align: center;" id="inner-text-color">Bet Even Or Odd  </strong>
  <button style="position: relative;left:20px;" type="button" class="btn btn-dark" id="confirm-color" onclick="ConfirmColor()">PLACE</button>
</div>

        </div> <!--Big div ending-->       

<!-------------------------------------------------------------------------Bet Box------------------------------------------------------------------------------------------------>

<div style="position: relative; left:500px ;top:-450px; visibility:hidden" class="input-group mb-3 bet-box">
<form action="" id="mainform" method="POST">
    <div class="input-group-prepend" id="button-addon3">
  <input type="hidden" id="hidden-amt" name="bet-amt"> </input>
                 <button  class=" btn btn-dark"  style=" border:1px solid white" type="submit" value="bet-value" name="bet-form">Update</button>
                 
  
  </div>
  </form>
  <input type="text" style="border:3px solid white ;" class="form-control" id="bet-amount" name="bet" placeholder="Enter the Amount" aria-label="Example text with two button addons" aria-describedby="button-addon3">
  <button  class=" btn btn-dark"  style=" border:1px solid white"  value="place-value" name="place-bet" onclick="Angle()">Place-BET</button>

</div>

<!-------------------------------------------------------------------------/\Bet Box/\--------------------------------------------------------------------------------------- -->

</body>
<script src="rotateangle.js"></script>
<script src="Play.js"></script>

</html>


<!--Code for calculating bet amount-->

