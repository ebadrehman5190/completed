 function validate()
    {
        var validate= true;
        var letters = /^[A-Za-z]+$/;  
        var filter=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;    
        var date_regex = /^(0[1-9]|1[0-2])\/(0[1-9]|1\d|2\d|3[01])\/(19|20)\d{2}$/ ;
        
            if(document.getElementById("mSelect").value == ""){
                    document.getElementById("var_mSelect").innerHTML="please select a member";
                    validate = false;
                }else{
                    document.getElementById("var_mSelect").innerHTML="";
                }               
                
            if(document.getElementById("date").value == ""){
                    document.getElementById("var_date").innerHTML="please enter date";
                    validate = false;
                }else{
                    document.getElementById("var_date").innerHTML="";
                }
                
                
                if(validate == false){
                    return(false);
                }else{
                    return(true);
                }
    }		
