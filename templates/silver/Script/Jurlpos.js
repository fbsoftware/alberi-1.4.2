function FireOffAJAXRequest(url,pos)
{	var myXMLHttpRequest = GET_XMLHTTPRequest(); //Instantiate a new XMLHttpRequestobject
if (myXMLHttpRequest)	  				//Make sure the XMLHttpRequest object was instantiated
    {	myXMLHttpRequest.open("GET",url, true);				//Tell the XMLHttpRequest object what we want it to do.	In the first parameter we're telling it to use HTTP GET for the request.In the second parameter we're telling it what page to request.In the third parameter we're telling it to do the request asychronously
	    myXMLHttpRequest.onreadystatechange = function (aEvt) 				
//Lets define the method that gets called when the request finishes	Any time the readyState of the XMLHttpRequest object changes this method is called. Loading is complete when the readyState equals 4, so that's the only value we care about right now.	  
    	{	if(myXMLHttpRequest.readyState == 4){	
//Sweet! The page loaded. Now lets set the contents of the request to the document
        		document.getElementById(pos).innerHTML = myXMLHttpRequest.responseText; }};
        myXMLHttpRequest.send(null);	  }		//Lets fire off the request
     else     {   alert("Problema nell'instanziare l'oggetto: XMLHttpRequest.");	 }	
}	