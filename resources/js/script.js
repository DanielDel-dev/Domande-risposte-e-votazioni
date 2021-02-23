

let alertTime = setTimeout(() => {
    let alert = document.querySelector(".alert-pers")
    alert.classList.add("alert-persTime")

    setTimeout(() => {
        let alertPar = document.querySelector(".alert-persTime")
        alertPar.style.display = "none"
    }, 1000);
    
}, 3000);






