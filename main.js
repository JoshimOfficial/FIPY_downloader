                                                        //................................................................................//
                                                        //                                    All logics                                  //
                                                        //.................................................................................//






//........................................................Working with dark mode..............................................................//
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

//Cheking if dark mode id exist in the current webpage.
if(document.querySelector("#dark_mode")) {
    let dark_mode = document.querySelector("#dark_mode");

    dark_mode.addEventListener("click", ()=>{
        turn_on_dark_mode();
    })
}

//Cheking if light mode id exist in the current webpage.
if(document.querySelector("#light_mode")) {
let light_mode = document.querySelector("#light_mode");

light_mode.addEventListener("click", ()=>{
    turn_on_light_mode();
})
}
//..............................................Working with dark mode part has been ended....................................................//









                                                    //................................................................................//
                                                    //                                     All functions                              //
                                                    //.................................................................................//


//if user click on dark mode icon
function turn_on_dark_mode() {
localStorage.setItem("dark_mode", "true");

let current_status = localStorage.getItem("dark_mode");
if(current_status === "true") {
    let light_mode = document.querySelector("#light_mode");
    let dark_mode = document.querySelector("#dark_mode");
    document.querySelector("html").classList.add("dark");

    dark_mode.classList.add("hidden");
    light_mode.classList.remove("hidden");
}
}


//If user click on light mode icon
function turn_on_light_mode() {
localStorage.setItem("dark_mode", "false");

let get_current_status = localStorage.getItem("#dark_mode");
if(get_current_status != "true") {
    let get_dark_mode = document.querySelector("#dark_mode");
    let get_light_mode = document.querySelector("#light_mode");
    document.querySelector("html").classList.remove("dark");

    get_dark_mode.classList.remove("hidden");
    get_light_mode.classList.add("hidden");
}
}
