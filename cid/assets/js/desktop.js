/************************************************/
/*###############  CONFIGURATION  ##############*/
/************************************************/

// zone for possible displaying the top left of the window directory
// in percentage of the document size
const LANDSCAPE_WINDOW = {
  "min": { "x": 0.20, "y": 0.25 },
  "max": { "x": 0.4, "y": 0.4 }
}
const PORTRAIT_WINDOW = {
  "min": { "x": 0.10, "y": 0.10 },
  "max": { "x": 0.3, "y": 0.10 }
}

let currentDocumentSize = { "height": 0, "width": 0 };
let currentZIndex = 10;

/************************************************/
/*##############  INITIALISATION  ###############/
/************************************************/

/*
 * Create all Icons define in the configuration file
 */
function initDesktop(configContentPath) {
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
  if (icon.type === "directory") {
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
    if (!$('#' + iconId + '-taskbar-item').length) {
      $('#minimize-windows-area').append(createLink(iconId));
    }
    $('#' + iconId + '-taskbar-item').click(() => {
      $('#' + iconId).toggleClass("window-opened");
    });
  });
}

function openWindow(id) {
  var window = $('#' + id);
  if (!window.hasClass("window-opened")) {

    // if on mobile, open the directory in fullscreen
    if (detectmob()) {
      $('#' + id).addClass("window-is-maximized");

      // else use the configuration LANDSCAPE or PORTRAIT and ajust randomly the position of the window directory
      // at the first time or if the window's browser was resized.
    } else if (isWindowSizeChange(currentDocumentSize, getDocumentSize()) || window.attr("data-position") == "unset") {
      setWindowDirectoryPosition(id);
      currentDocumentSize = getDocumentSize();
      window.attr("data-position", "set");
    }

    window.addClass("window-opened");
    ++currentZIndex;
    window.css({ "z-index": currentZIndex });

  }
}

function closeWindow(id) {
  $('#' + id).removeClass("window-opened");
  // if shortcut exist on taskbar-> delete it
  if ($('#' + id + '-taskbar-item').length) {
    destroyLink(id);
  }
}

function createLink(id) {
  let link =
    '<div id="' + id + '-taskbar-item" class="taskItem btn">' +
    '<img src="' + getImgUrlFromDirectory(id) + '"/>' +
    '<p>' + getNameFromDirectory(id) + '</p>' +
    '</div>';
  return link;
}

function destroyLink(id) {
  $('#' + id + '-taskbar-item').remove('div');
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


