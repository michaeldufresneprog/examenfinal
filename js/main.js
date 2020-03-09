
window.addEventListener("load",function(evt){
    let collectionBtnNouvelle = document.querySelectorAll(".button-css");
    if (collectionBtnNouvelle){
        for (let btn of collectionBtnNouvelle){
                btn.addEventListener('click',Ajax)
        }
    }
});


function Ajax(evt){
    evt.target.classList.add("color-red");
    evt.target.classList.remove("color-green");
    if(evt.target.classList.contains("active")){
        let id = evt.target.getAttribute("id");
        evt.target.classList.remove("color-red");
        evt.target.classList.add("color-green");
        viderSection(id);
        return;
    }
    let allInput = document.querySelectorAll("input");
    for (let i = 0; i < allInput.length; i++) {
        if(allInput[i].classList.contains("active")){
            allInput[i].classList.add("color-green");
            allInput[i].classList.remove("color-red");
            console.log(allInput[i].parentNode.nextSibling.nextSibling);
            allInput[i].parentNode.nextSibling.nextSibling.innerHTML = " ";
        }
        
    }
    evt.target.classList.add("active");
    let id = evt.target.getAttribute("id");
    let numberId = evt.target.getAttribute("data"); 
    let maRequete = new XMLHttpRequest();
    maRequete.open('GET', 'http://localhost/wordpress/wp-json/wp/v2/posts'); // modifier ici
    maRequete.onload = function () {
        if (maRequete.status >= 200 && maRequete.status < 400) {
            let data = JSON.parse(maRequete.responseText);
            creationHTML(data[id] ,id);
        } else {
            console.log('La connexion est faite mais il y a une erreur')
        }
    }
    maRequete.onerror = function () {
        console.log("erreur de connexion");
    }
    maRequete.send()
    }

    // instructions à ajouter


///////////////////////////////////////////////////////

function creationHTML(postsData, id){
    let contenuNouvelle = document.querySelectorAll(".division-vide");
    let monHtmlString = '';
        monHtmlString += '<h2>' + postsData.title.rendered + '</h2>';
        monHtmlString += postsData.content.rendered;
    contenuNouvelle[id].innerHTML = monHtmlString;
    let input = document.querySelectorAll("input");
    console.log(input);
    for (let i = 0; i < input.length; i++) {
        if(input[i].classList.contains("active") && !input[i].classList.contains("color-red")){
            input[i].classList.remove("active");
        }
        
    }
}
function viderSection(id){
    let contenuNouvelle = document.querySelectorAll(".division-vide");
    let collectionBtnNouvelle = document.querySelectorAll(".button-css");
    collectionBtnNouvelle[id].classList.remove("active");
    contenuNouvelle[id].innerHTML = ""; 
}



