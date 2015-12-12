"use strict";

function submitform()
{
    if(document.saveForm.onsubmit &&
    !document.saveForm.onsubmit())
    {
        return;
    }
 document.saveForm.submit();
}