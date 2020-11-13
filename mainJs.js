var overlayTag;
var overlayObj;
var overlayTxt;
let overlayActive = true;

var overlays = [];

const OverlayType = {  //creates different overlay types
  ERROR: 'error',
  INFO: 'info',
  WARNING: 'warning',
  SUCCESS: 'success'
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
  overlayTag = document.getElementById("overlay");
  const width  = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
  console.log("Detecting site to be " + width + "px in width");
  if(overlayTag.style.marginLeft != (width/2)/2)
  {
    overlayTag.style.marginLeft = (width/2)/2 + "px";
    overlayTag.style.marginRight = (width/2)/2 + "px";
  }
  var newOverlay = document.createElement("div");
  newOverlay.className += "overlayEntry";
  var newH3 = document.createElement("h3");
  newH3.className = "center";
  newOverlay.appendChild(newH3);
  overlayTag.appendChild(newOverlay);
  return newOverlay;
}

function OverlayMessage(text, overlayType)
{
  var nOverlay;
  if(overlayTag == null)
  {
    overlayTag = document.getElementById("overlay");
  }
  nOverlay = GenerateOverlayObj();
  //setTimeout(function(){nOverlay.style.transform="translateY(" + (0+80*overlays.length) + ")";},2000);
  nOverlay.childNodes[0].innerText = text;
  switch(overlayType)
  {
    case OverlayType.ERROR:
      nOverlay.className += " error";
    break;
    case OverlayType.INFO:
      nOverlay.className += " info";
    break;
    case OverlayType.WARNING:
      nOverlay.className += " warning";
    break;
    case OverlayType.SUCCESS:
      nOverlay.className += " success";
    break;
  }
  overlays.push(nOverlay);
  setTimeout(
    function(){
      overlays.pop();
      console.log(overlays);
      nOverlay.remove();
    },9000
  );
}
