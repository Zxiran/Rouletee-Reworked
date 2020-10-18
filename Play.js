function Display(){
    document.getElementById('play-btn').style.visibility="hidden";
    document.getElementById('bet-table').style.visibility="visible";
    document.getElementById('bet-table-num').style.visibility="visible";
    document.getElementById('confirm-inner-text').innerHTML='Bet On Number';
    document.getElementById('confirm-bet-div').animate( {opacity:[0,0.5,1]},2000);
    document.getElementById('confirm-bet-div').style.visibility="visible";
    console.log("Hello");
}

function InputNum(val1,_id){
       
    // document.getElementById('input-store').value=val1;
       // let input_store=document.getElementById('input-store').value;
       
       
       if(document.getElementById('bet-table-num').id == _id) 
       {
           let x=val1;
           console.log(x);
       }
       else if(document.getElementById('bet-table-range').id ==_id)
       {
           let y=val1;
           console.log(y);
       }
       
       else{
        let hid=document.getElementById('input-store').value
        let z1=hid;let z2;          //Z1 and z2 variables for odd even and red and black
        if(z1==0)
        {
            z1=val1;
            document.getElementById('input-store').value=z1;
            let classname = document.getElementsByClassName('red-black');
            for(let i=0;i<classname.length;i++)
                {
                    classname[i].disabled=false;
            
        
                }
                let classname1 = document.getElementsByClassName('odd-even');
            for(let i=0;i<classname.length;i++)
                {
                    classname1[i].disabled=true;
            
        
                }      
                document.getElementById('id-even').style.opacity="0.2";
                document.getElementById('id-odd').style.opacity="0.2";
                document.getElementById('id-red').style.opacity="1";
                document.getElementById('id-black').style.opacity="1";
                
                document.getElementById('confirm-color-div').animate( {opacity:[0,0.5,1]},2000);//Change in Opacity 
                document.getElementById('inner-text-color').innerHTML="Bet On Red Or Black " // Change the Inner text 
                
        }
        else{
            z2=val1;
        }
        console.log(z1);
        console.log(z2);
       }
    
    
}



function ConfirmNum(){
   // let input_take =document.getElementById('input-store').value;
    document.getElementById('bet-table-num').style.opacity=0.2;
    let classname = document.getElementsByClassName('default');
       for(let i=0;i<classname.length;i++)
        {
            classname[i].disabled=true;
        
        }
    document.getElementById('bet-table-range').style.visibility="visible";
    
   
    document.getElementById('confirm-bet-div').animate( {opacity:[1,0.5,0]},2000);
    document.getElementById('confirm-bet-div').style.visibility="hidden";

    document.getElementById('confirm-range-div').animate( {opacity:[0,0.5,1]},2000);
    document.getElementById('confirm-range-div').style.visibility="visible";
    //console.log(input_take);
}



function ConfirmRange(){
   
   document.getElementById('bet-table-range').style.opacity=0.2;
   document.getElementById('confirm-color-div').animate( {opacity:[0,0.5,1]},2000);
   document.getElementById('confirm-color-div').style.visibility="visible";
    let classname = document.getElementsByClassName('bet-button-range');
       for(let i=0;i<classname.length;i++)
        {
            classname[i].disabled=true;
        
        }
    document.getElementById('confirm-range-div').animate( {opacity:[1,0.5,0]},2000);
    document.getElementById('confirm-range-div').style.visibility="hidden";
    let classname1 = document.getElementsByClassName('red-black');
       for(let i=0;i<classname.length;i++)
        {
            classname1[i].disabled=true;
            
        
        }   
    document.getElementById('bet-table-color').style.visibility="visible";
    document.getElementById('id-red').style.opacity="0.2";
    document.getElementById('id-black').style.opacity="0.2";
    

}