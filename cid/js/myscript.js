$(document).ready(function () {

  /************************************************/
  /*################   LOADING   ##################/
  /************************************************/

  $(function onLoad() {
    // Add Listener to icons & draggableAction to all windows
    var CONFIG_CONTENT_PATH = "cid/config/config_content.json";
    initAllIcons(CONFIG_CONTENT_PATH);

    // TODO Find a best way to addEventListener to the form icon
    $("#contactForm-ico").click(addEventListenerOnIcon("contactForm"));

  });

  /************************************************/
  /*###############  CONFIGURATION  ##############*/
  /************************************************/

  // zone for possible displaying the top left of the window directory
  // in percentage of the document size
  const LANDSCAPE_WINDOW = {
    "min": { "x": 0.25, "y": 0.25 },
    "max": { "x": 0.5, "y": 0.5 }
  }
  const PORTRAIT_WINDOW = {
    "min": { "x": 0.25, "y": 0.25 },
    "max": { "x": 0.5, "y": 0.5 }
  }

  let currentDocumentSize = { "height": 0, "width": 0 };
  let currentZIndex = 10;

  /************************************************/
  /*################  SERVICES  ################***/
  /************************************************/

  // Download file from server
  function XHR(file, callback) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', file, false);
    xhr.onload = function () {
      if (xhr.readyState === 4 && xhr.status === 200) {
        callback(xhr.responseText);
      } else {
        //console.log('the file "' + file + '" is not found');
      }
    }
    xhr.send(null);
  }

  function getJsonText(file) {
    var jsonText;
    XHR(file, function (response) {
      jsonText = JSON.parse(response);
    });
    return jsonText;
  }

  function getDocumentSize() {
    return { height: window.innerHeight, width: window.innerWidth };
  }
  function randomInterval(min, max) {
    return Math.floor(Math.random() * (max - min + 1) + min);
  }

  function isWindowSizeChange(oldSize, newSize) {
    return (oldSize.height != newSize.height || oldSize.width != newSize.width) ? true : false;
  }
  /************************************************/
  /*##############  INITIALISATION  ###############/
  /************************************************/

  /*
   * Create all Icons define in the configuration file
   */
  function initAllIcons(configFilesPath) {
    var icons = getJsonText(configFilesPath);

    for (let iconName in icons) {
      var icon = icons[iconName];
      initIcon(icon);
    }
    draggableWindows();
  }

  /*
   * Create icon only or with its directory and all icons that it contains
   */
  function initIcon(icon) {
    if (icon.isDirectory) {
      addEventListenerOnIcon(icon.id);
      for (let elem in icon.content) {
        initIcon(icon.content[elem]);
      }
    }
  };


  /*
   * Add Listeners on click to the directory
   */
  function addEventListenerOnIcon(iconId) {

    // Add listener on the icon => open the directory
    $('#' + iconId + '-ico').click(function () {
      console.log('is clicked');
      var window = $('#' + iconId);
      if (!window.hasClass('window-opened')) {
        if (isWindowSizeChange(currentDocumentSize, getDocumentSize()) || window.attr("data-position") == "unset") {
          setWindowDirectoryPosition(iconId);
          currentDocumentSize = getDocumentSize();
          window.attr("data-position", "set");
        }
        window.addClass('window-opened');
        ++currentZIndex;
        window.css({ "z-index": currentZIndex });
      }
    });

    // Add listener on the cross of the directory => close the directory
    $('#' + iconId + ' .cross').click(function () {
      $('#' + iconId).removeClass('window-opened');
    });
  }


  /*
   * Define the position of the top left corner of the directory
   */
  function setWindowDirectoryPosition(iconId) {

    const documentSize = getDocumentSize();
    const screenFormat = (documentSize.height * 1.2 > documentSize.width) ?
      PORTRAIT_WINDOW : LANDSCAPE_WINDOW; // constant define in the configuration on the top

    let topValue = "" + randomInterval(documentSize.height * screenFormat.min.y, documentSize.height * screenFormat.max.y) + "px";
    let leftValue = "" + randomInterval(documentSize.width * screenFormat.min.x, documentSize.width * screenFormat.max.x) + "px";

    //DEBUG
    console.log("screen : " + documentSize.height + "(" + documentSize.height * 0.25 + ", " + documentSize.height * 0.5 + ")" + " , " + documentSize.width + "(" + documentSize.width * 0.25 + ", " + documentSize.width * 0.5 + ")");
    console.log("top : " + topValue + " ; Left : " + leftValue);


    // Set value to the Window directory
    $('#' + iconId).css({
      "top": topValue,
      "left": leftValue
    });
  }

  /*
   * Add draggable comportement for the directory
   */
  function draggableWindows() {

    $(".directory").draggable(
      {
        containment: "parent",
        cursor: "move",
        scroll: true,
        addClasses: false,
        start: function (e, ui) {
          myStart = ui.position;
        },
        drag: function (e, ui) {
          if (ui.position.right < myStart.right) {
            return false;
          }
        }
      }
    );
  };



}); // end of $(document).ready({ ...

