function DelayFn(){
    //if(document.getElementById('mainform'))
       
        
        if(document.getElementById('bet-amount').value != null)
        {
            var temp =document.getElementById('bet-amount').value;
            document.getElementById('hidden-amt').innerHTML=temp;
            console.log(temp);
           // setTimeout("Angle(temp)", 1000); // set timout
        }

        else{
            var x = document.getElementById("myPopup").innerHTML="Please Place a Bet ";   
        }
       
    
}



function Angle()
{   var x=document.getElementById('bet-amount').value;
    if( x==0)
        {  
              
            document.getElementById('myPopup').style.visibility='visible';
            document.getElementById('myPopup').animate( {opacity:[0,0.5,1]},4000);
            document.getElementById('bet-amount').addEventListener("focus",DisappearFn);

            function DisappearFn(){
                //console.log("hello");
                document.getElementById('myPopup').style.visibility="hidden";
            }
            
                
                
              
        }

    else
    {
        
        console.log(x);
        var temp =x;
        document.getElementById('hidden-amt').value=temp;
        console.log(temp);
        
       
       // setTimeout("Angle(temp)", 1000);  set timout
       let angle =[0,337.5,315,292.5,270,247.5,225,202.5,180,157.5,135,112.5,90,67.5,45,22.5];
       let rand;
       let deg;
      
       
           rand = Math.floor((Math.random()*16)+1);
           
           deg =(360*(Math.floor(Math.random()*8)+4))-(angle[rand-1]);
           document.getElementById("box").style.transform="rotate("+deg+"deg)";
           console.log(rand);
        //popup.classList.toggle("show");
    }
    //document.getElementById("box").style.transform="rotateZ(0deg)";*/
    
    
}
