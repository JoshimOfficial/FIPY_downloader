//Cheking if website already in dark mode or not.
if(localStorage.getItem("dark_mode")) {
    let get_dark_current_status = localStorage.getItem("dark_mode");

    if(get_dark_current_status === "true") {
        document.querySelector("html").classList.add("dark");
        document.querySelector("#light_mode").classList.remove("hidden");
    }
    else {   
        document.querySelector("html").classList.remove("dark");
        document.querySelector("#dark_mode").classList.remove("hidden");
    }
}
//If user is new then by default light mode will activate.
else {
        document.querySelector("#dark_mode").classList.remove("hidden");
}