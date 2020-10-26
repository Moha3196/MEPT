var overlayObj;
var overlayTxt;
let overlayActive = true;

const OverlayType = {
  ERROR: 'error',
  INFO: 'info',
  WARNING: 'warning'
}


function ToggleOverlay()
{
  overlayActive = !overlayActive;
  if(overlayActive)
  {
    overlayObj.style.display = "unset";
  }
  else
  {
    overlayObj.style.display = "none";
  }
}

function GenerateOverlayObj()
{
  overlayObj = document.getElementById("overlay");
  if(overlayObj.getElementsByTagName("H3") == null)
  {
    overlayTxt = document.createElement("H3");
    overlayTxt.className = "center";
    overlayObj.appendChild(overlayTxt);
  }
  else
  {
    overlayTxt = overlayObj.childNodes[0];
  }
}

function OverlayMessage(text, overlayType)
{
  if(overlayObj == null)
  {
    GenerateOverlayObj();
  }
  overlayTxt.innerText = text;
  switch(overlayType)
  {
    case OverlayType.ERROR:
      overlayObj.className += "error";
    break;
    case OverlayType.INFO:
      overlayObj.className += "info";
    break;
    case OverlayType.WARNING:
      overlayObj.className += "warning";
  }
}
