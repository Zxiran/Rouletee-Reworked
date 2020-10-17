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
        <button type="button" style="position: relative; left:0px; top:0px" class="btn btn-outline-secondary">Rules</button>
        <button style="position: relative; left:0px; top:0px" type="button" class="btn btn-outline-secondary">How To Play</button>
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
    <span class="" id="myPopup"></span>
    
    <div>
    <img class="arrow" src="images/right_arrow.png" alt="">
    </div>

  <!-------------------------------------------------------------------------- /\Wheel html code/\-------------------------------------------------------------------------------> 
</div>
<div class="bet-table">
<div class="bet-table-1">
    <table>
        <form method="POST" name="form1">
        <input type="hidden" name="postvar" value="" />

        <tr>
            <td><input type="button" class="bet-button-black" name="bet-button" value="1"></td>
            <td><input type="button" class="bet-button-black" name="bet-button" value="3"></td>
            <td><input type="button" class="bet-button-black" name="bet-button" value="5"></td>
            <td><input type="button" class="bet-button-black" name="bet-button" value="7"></td>
            <td><input type="button" class="bet-button-black" name="bet-button" value="9"></td>
            <td><input type="button" class="bet-button-black" name="bet-button" value="11"></td>
            <td><input type="button" class="bet-button-black" name="bet-button" value="13"></td>
            <td><input type="button" class="bet-button-black" name="bet-button" value="15"></td>
        </tr>

        <tr>
            <td><input type="button" class="bet-button-red" name="bet-button" value="2"></td>
            <td><input type="button" class="bet-button-red" name="bet-button" value="4"></td>
            <td><input type="button" class="bet-button-red" name="bet-button" value="6"></td>
            <td><input type="button" class="bet-button-red" name="bet-button" value="8"></td>
            <td><input type="button" class="bet-button-red" name="bet-button" value="10"></td>
            <td><input type="button" class="bet-button-red" name="bet-button" value="12"></td>
            <td><input type="button" class="bet-button-red" name="bet-button" value="14"></td>
            <td><input type="button" class="bet-button-red" name="bet-button" value="16"></td>
        </tr>
        </form>
        <?php 
            if (isset($_POST["postvar"]))
                 {
                    echo $_POST["postvar"]
                    ;
                 }
        ?>
    </table>
    </div>
    <div class="bet-table-2">
        <table>
            <form method="POST" name="form2">
            <tr>
                <td><input type="button" class="bet-button-range" value="1-8"></td>
                <td><input type="button" class="bet-button-range" value="9-16"></td>
            </tr>
            </form>
        </table>
    </div>
    <div class="bet-table-3">
        <table>
            <form method="POST" name="form3">
            <tr>
                <td><input type="button"class="last-row" value="EVEN"></td>
                <td><input type="button"class="last-row" style="background-color: red;" value="RED"></td>
                <td><input type="button"class="last-row" style="background-color: black;" value="BLACK"></td>
                <td><input type="button"class="last-row" value="ODD"></td>
            </tr>
            </form>
        </table>
    </div>
</div>



<!-------------------------------------------------------------------------Bet Box------------------------------------------------------------------------------------------------>

<div style="position: relative; left:500px ;top:-450px;" class="input-group mb-3 bet-box">
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
<script>
        window.onload = function()
        {
            document.getElementsByName("bet-button").onclick = function(){
            document.getElementsByName("postvar")[0].value = this.value;
            document.forms.form1.submit();
            }
        }
    </script>
</html>


<!--Code for calculating bet amount-->

