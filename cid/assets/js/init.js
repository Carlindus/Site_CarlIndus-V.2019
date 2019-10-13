$(document).ready(function () {

    $(function onLoad() {

        // Add Listener to icons & draggableAction to all windows
        // TODO load the path from config file
        var CONFIG_CONTENT_PATH = "cid/config/config_content.json";
        initDesktop(CONFIG_CONTENT_PATH);
        initTaskbar();

        // TODO Find a best way to addEventListener to the form icon
        $("#contactForm-ico").click(addEventListenersOnIcon("contactForm"));

    });



}); // end of $(document).ready({ ...