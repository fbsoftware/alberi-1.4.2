function FireOffAJAXRequest(url,pos)
{	var myXMLHttpRequest = GET_XMLHTTPRequest();  XMLHttpRequestobject
	if (myXMLHttpRequest)	  				
    {	
	myXMLHttpRequest.open("GET",url, true);				
	document.getElementById(pos).innerHTML = myXMLHttpRequest.responseText; 
    myXMLHttpRequest.send(null);	
	}		
     else     
	 {   
	 alert("Problema nell'instanziare l'oggetto: XMLHttpRequest.");	
	 }	
}	

function GET_XMLHTTPRequest()
{
    var request;     // Lets try using ActiveX to instantiate the XMLHttpRequest object
    try{
        request = new ActiveXObject("Microsoft.XMLHTTP");
    	}catch(ex1){
        			try{
            			request = new ActiveXObject("Msxml2.XMLHTTP");
        				}catch(ex2){
         request = null;
        }
    }

XMLHttpRequest //If the previous didn't work,lets check if the browser natively	support
    if(!request && typeof XMLHttpRequest != "undefined")
	{
       request = new XMLHttpRequest();//The browser does, so lets instantiate the object
    }
    return request;
}