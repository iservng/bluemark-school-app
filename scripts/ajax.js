//Holds an instance of XMLHttpRequest
var xmlHttp = createXmlHttpRequestObject();

//Display error messages (true) or degrade to non-AJAX Behaviour (false)
var showErrors = true;

//Contain the link or form clicked or submitted by the visitor 
var actionObject = '';

// This is true when the Place Order button is clicked, false otherwise
var placingOrder = false;

//Create an XMLHttpRequest instance 
function createXmlHttpRequestObject()
{
    //Will store the XMLHttprequest object
    var xmlHttp;

    //Create the XMLHttpRequest object
    try {
        //Try to create the native XMLHttpRequest object
        xmlHttp = new XMLHttpRequest();
    } catch (e) {
        //Assume IE or older
        var XmlHttpVersions = new Array(
            "MSXML2.XMLHTTP.6.0", "MSXML2.XMLHTTP.5.0", "MSXML2.XMLHTTP.4.0",
            "MSXML2.XMLHTTP.3.0", "MSXML2.XMLHTTP", "Microsoft.XMLHTTP"
        );
        //Try every id untill one works 
        for(i = 0; i < XmlHttpVersions.length && !xmlHttp; i++)
        {
            try {
                xmlHttp = new ActiveXObject(XmlHttpVersions[i]);
            } catch (error) {
                //Ignore potetial error
            }
        }
    }

    if(xmlHttp)
    {
        return xmlHttp;
    }
    //If an error happened, pass it to an error handler 
    else 
    {
        handleError("Error creating the XMLHttpRequest object");

    }
}
















//Displas the error message of degrade to no-AJAX behaviour
function handleError($message)
{
    //Ignores errors if show error is false 
    if(showErrors)
    {
        //Display error message 
        alert("Error encountered: \n" + $message);
        return false;
    }
    //Fall back to non-AJAX behaviour 
    else if(!actionObject.tagName)
    {
        return true;
    }
    //fall back to non-AJAX behaviour by following the link
    else if(actionObject.tagName == 'A')
    {
        window.location = actionObject.href;
    }
    //fall back to non-AJAX behaviour by submitting the form
    else if(actionObject.tagName == 'FORM')
    {
        actionObject.submit();
    }
}













//Adds a product to the shopping cart 
function addProductToCart(form)
{
    //Display "Updating" message
    document.getElementById('updating').style.visibility = 'visible';

    //Degrade to classical form submit id XMLHttpRequest object is not available
    if(!xmlHttp) return true;

    //Create the URL we open asynchronously
    request = form.action + '&AjaxRequest';
    params = '';

    //Obtain selected attributes 
    formSelects = form.getElementByTagName('SELECT');
    if(formSelects)
    {
        for(i = 0; i < formSelects.length; i++)
        {
            params += '&' + formSelects[i].name + '=';
            selected_index = formSelects[i].selectedIndex;
            params += encodeURIComponent(formSelects[i][selected_index].text);
        }
    }

    //Try to connect to the server 
    try {
        //Continue only if the XMLttpRequest object isn't busy
        if(xmlHttp.readyState == 4 || xmlHttp.readyState == 0)
        {
            //Make a server request to validate the extracted data
            xmlHttp.open("POST", request, true);
            xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlHttp.onReadyStatechange = addToCartStatechange;
            xmlHttp.send(params);
        }
    } catch (e) {
        //Handle errors
        handleError(e.toString());
    }
    //Stop classical form submit if AJAX succeded
    return false;
}

















//Function that retrives the HTTP response
function addToCartStatechange()
{
    //When ready state is in 4, we also read the server response
    if(xmlHttp.readyState == 4)
    {
        //Continue only if HTTP status is OK 
        if(xmlHttp.status == 200)
        {
            try {
                updateCartSummary();
            } catch (e) {
                handleError(e.toString());
            }
        }
        else
        {
            handleError(xmlHttp.statusText);
        }
    }
    

}












//Process server
function updateCartSummary()
{
    //Read the response 
    response = xmlHttp.responseText;

    //Server error?
    if(respose.indexOf("ERRNO") >= 0 || response.indexOf("error") >= 0)
    {
        handleError(response);
    }
    else 
    {
        //Extract the content of the cart_summary div elememt 
        var cartSummaryRegEx = /^<div class="box" id="cart-summary">([/s/S]*)<\/div>$/m;
        matches = cartSummaryRegEx.exec(response);
        response = matches[1];

        //Update the cart summary box and hide the loading message 
        document.getElementById("cart-summary").innerHTML = response;
        //Hide the "updating..." message
        document.getElementById("updating").style.visibility = 'hidden';
    }
}














//Called on shopping cart update action 
function executeCartAction(obj)
{
    // Degrade to classical form submit for Place Order action
    if (placingOrder) return true;

    //Display "Updating..." message 
    document.getElementById("updating").style.visibility = 'visible';

    //Degrade to classical form submission is XMLHttpRequest is not available 
    if(!xmlHttp) return true;

    //Save object reference
    actionObject = obj;

    //Initialize response and parameters 
    response = '';
    params = '';

    //If a link was clicked, we get its href attribute
    if(obj.tagName == 'A')
    {
        url = obj.href + '&AjaxRequest';
    }
    //if a form was submitted we gets its element 
    else 
    {
        url = obj.action + '&AjaxRequest';
        formElements = obj.getElementsByTagName('INPUT');
        if(formElements)
        {
            for(i = 0; i < formElements.length; i++)
            {
                if (formElements[i].name != 'place_order')
                {
                    params += '&' + formElements[i].name + '=';
                    params += encodeURIComponent(formElements[i].value);
                }
            }
        }
    }
    //Try to connect to the server 
    try {
        //Make the server request only if the XMLHttpRequest isn't busy 
        if(xmlHttp.readyState == 4 || xmlHttp.readyState == 0)
        {
            xmlHttp.open("POST", url, true);
            xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xmlHttp.onreadystatechange = cartActionStateChange;
            xmlHttp.send(params);
        }
    } catch (e) {
        //Handle error
        handleError(e.toString());
    }
    //Stop classical form action if AJAX succeeded
    return false;
}
















//Function that retrieves the HTTP response 
function cartActionStateChange()
{
    //When ready state is 4 we also read the  server responds 
    if(xmlHttp.readyState == 4)
    {
        //Continue only if HTTP status is 'OK'
        if(xmlHttp.status == 200)
        {
            try {
                //Read the responds 
                response = xmlHttp.responseText;

                //If error
                if(response.indexOf('ERRNO') >= 0 || response.indexOf("error") >= 0)
                {
                    handleError(response);
                }
                else 
                {
                    //Update the cart
                    document.getElementById('contents').innerHTML = response;
                    //Hide the "Updating..." message
                    document.getElementById('updating').style.visibility = 'hidden';
                }
            } catch (e) {
                //Hnale error
                handleError(e.toString());
            }
        }
        else 
        {
            //Handle error
            handleError(xmlHttp.statusText);
        }
    }
}