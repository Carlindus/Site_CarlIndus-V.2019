$(document).ready(function () {

    /************************************************/
    /*################   LOADING   ##################/
    /************************************************/

    $(function onLoad() {
        console.log('services loaded');
        setDate();
        setTime();
        setInterval(() => {
            setTime();
        }, 1000 * 60);
        addListenerOnButtons();
    });

    function setTime() {
        let currentTime = new Date();
        let currentHours = currentTime.getHours();
        let currentMinutes = currentTime.getMinutes();
        currentMinutes = (currentMinutes < 10 ? "0" : "") + currentMinutes;

        var currentTimeString = currentHours + " : " + currentMinutes;

        document.getElementById("notification-time").firstChild.nodeValue = currentTimeString;
    }

    function setDate() {
        let date = new Date();
        var monthNames = [
            "Jan.", "Fev.", "Mar.",
            "Avr.", "Mai", "Jui.", "Juil.",
            "Aou.", "Sept.", "Oct.",
            "Nov.", "Déc."
        ];

        var day = date.getDate();
        var monthIndex = date.getMonth();
        var year = date.getFullYear();

        document.getElementById("notification-date").firstChild.nodeValue = day + ' ' + monthNames[monthIndex] + ' ' + year;

    }

    function addListenerOnButtons() {
        addListenerOnStartButton();
    }

    function addListenerOnStartButton() {
        document.getElementById("startmenu-btn").addEventListener("click", (event) => {
            document.getElementById("startmenu-nav").classList.toggle("window-opened");
        })
    }
});