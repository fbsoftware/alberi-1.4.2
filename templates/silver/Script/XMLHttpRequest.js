/*
This method uses a couple different methods of instantiating the
XMLHttpRequest object. The reason we do this is so we can support
multiple browser (I've only tested in IE and Firefox).
*/
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