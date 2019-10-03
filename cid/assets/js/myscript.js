$(document).ready(function () {

  /************************************************/
  /*################   LOADING   ##################/
  /************************************************/

  $(function onLoad() {

    // Add Listener to icons & draggableAction to all windows
    // TODO load the path from config file
    var CONFIG_CONTENT_PATH = "cid/config/config_content.json";
    initAllIcons(CONFIG_CONTENT_PATH);

    // TODO Find a best way to addEventListener to the form icon
    $("#contactForm-ico").click(addEventListenersOnIcon("contactForm"));

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
        console.log('the file "' + file + '" is not found');
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
  function initAllIcons(configContentPath) {
    var icons = getJsonText(configContentPath);

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
      addEventListenersOnIcon(icon.id);
      for (let elem in icon.content) {
        initIcon(icon.content[elem]);
      }
    }
  };

  /*
   * Add Listeners on click to the icons of directory target
   */
  function addEventListenersOnIcon(iconId) {
    addEventListenerOpenWindow(iconId);
    addEventListenerCloseWindow(iconId);
    addEventListenerMaximizeWindow(iconId);
    addEventListenerMinimizeWindow(iconId);
  }

  // Add listener on the icon => open the directory window
  function addEventListenerOpenWindow(iconId) {
    $('#' + iconId + '-ico').click(function () {
      openWindow(iconId);
    });
  }

  // Add listener on the cross of the directory => close the directory window
  function addEventListenerCloseWindow(iconId) {
    $('#' + iconId + ' .cross').click(function () {
      closeWindow(iconId);
    });

  }

  function addEventListenerMaximizeWindow(iconId) {
    $('#' + iconId + ' .maximize-window').click((event) => {
      $('#' + iconId).toggleClass("window-is-maximized");
    });
  }

  function addEventListenerMinimizeWindow(iconId) {
    $('#' + iconId + ' .minimize-window').click(() => {
      closeWindow(iconId);
      if (!$('#' + iconId + '-menu-item').length) {
        $('#minimize-windows-area').append(createLink(iconId));
      }
      $('#' + iconId + '-menu-item').click(() => {
        $('#' + iconId).toggleClass("window-opened");
      });
    });
  }

  function openWindow(id) {
    var window = $('#' + id);
    if (id == "lala") {
      console.log("id = lala");
    } else {
      if (!window.hasClass("window-opened")) {
        if (isWindowSizeChange(currentDocumentSize, getDocumentSize()) || window.attr("data-position") == "unset") {
          setWindowDirectoryPosition(id);
          currentDocumentSize = getDocumentSize();
          window.attr("data-position", "set");
        }
        window.addClass("window-opened");
        ++currentZIndex;
        window.css({ "z-index": currentZIndex });
      }
    }
  }

  function closeWindow(id) {
    $('#' + id).removeClass("window-opened");
    // if shortcut exist on taskbar-> delete it
    if ($('#' + id + '-menu-item').length) {
      destroyLink(id);
    }
  }

  function createLink(id) {
    let link =
      '<div id="' + id + '-menu-item" class="menuItem">' +
      '<img src="' + getImgUrlFromDirectory(id) + '"/>' +
      '<p>' + getNameFromDirectory(id) + '</p>' +
      '</div>';
    return link;
  }

  function destroyLink(id) {
    console.log('destroy');
    $('#' + id + '-menu-item').remove('div');
  }

  function getImgUrlFromDirectory(iconId) {
    return $('#' + iconId + ' .top-bar-title img').attr('src');
  }

  function getNameFromDirectory(iconId) {
    return $('#' + iconId + ' .top-bar-title p').text();
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

