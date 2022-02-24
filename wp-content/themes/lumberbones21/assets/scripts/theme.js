/** Import */

document.addEventListener("DOMContentLoaded", function () {
    /** Address HTML & Body no-js Class */
    (function () {
        /** Remove .no-js */
        // document.documentElement.classList.remove('no-js');
        // document.body.classList.remove('no-js');

        /** Replace .no-js with .js */
        document.documentElement.className =
            document.documentElement.className.replace("no-js", "js");
        document.body.className = document.body.className.replace(
            "no-js",
            "js"
        );
    })();

    /** Call */
});
