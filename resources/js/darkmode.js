document.addEventListener("DOMContentLoaded", function () {
    const toggleButton = document.getElementById("darkModeToggle");
    const htmlElement = document.documentElement;
    const navbar = document.querySelector('.navbar');
    const prefersDarkScheme = window.matchMedia("(prefers-color-scheme: dark)");

    function setDarkMode(isDark) {
        if (isDark) {
            htmlElement.classList.add("dark");
            toggleButton.innerText = "☀️";

            navbar.classList.remove('navbar-light', 'bg-light');
            navbar.classList.add('navbar-dark', 'bg-dark');

            toggleButton.classList.remove('btn-dark');
            toggleButton.classList.add('btn-light');

            document.body.classList.add('dark');
        } else {
            htmlElement.classList.remove("dark");
            toggleButton.innerText = "🌙";

            navbar.classList.remove('navbar-dark', 'bg-dark');
            navbar.classList.add('navbar-light', 'bg-light');

            toggleButton.classList.remove('btn-light');
            toggleButton.classList.add('btn-dark');

            document.body.classList.remove('dark');
        }
    }

    const savedTheme = localStorage.getItem("theme");
    if (savedTheme) {
        setDarkMode(savedTheme === "dark");
    } else {
        setDarkMode(false);
    }

    prefersDarkScheme.addEventListener("change", (e) => {
        if (!localStorage.getItem("theme")) {
            setDarkMode(e.matches);
        }
    });

    toggleButton.addEventListener("click", function () {
        const isDark = !htmlElement.classList.contains("dark");
        setDarkMode(isDark);
        localStorage.setItem("theme", isDark ? "dark" : "light");
    });
});
