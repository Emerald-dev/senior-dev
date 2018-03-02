/**
 * This file contains functions that validate the form
 */

/**
 * Function validates the forms and checks to make sure the forms are good.
 * @param event
 * @returns {boolean}
 */
function validateForm(event)
{
    const input = event.target.querySelector("textarea");
    const select = event.target.querySelector("select");
	console.log(select.value);
    if(select.value == "Link" || select.value == "Image")
    {
        if(!ValidURL(input.value))
        {
            return false;
        } 
    }
    return true;
    
}

/**
 * Regex function that checks to make sure the url is valid
 * @param str
 * @returns {boolean}
 */
function ValidURL(str) 
{
  var expression = /[-a-zA-Z0-9@:%_\+.~#?&//=]{2,256}\.[a-z]{2,4}\b(\/[-a-zA-Z0-9@:%_\+.~#?&//=]*)?/gi;
  var regex = new RegExp(expression);
  if(!str.match(regex)) {
    alert("Please enter a valid URL.");
    return false;
  } else {
    return true;
  }
}
