/*plays() is the function that plays each sound as it is
pressed. It first pauses all sounds, then loads the sounds
to play from the beginning.*/
function plays(theSound) {
    stops();
    var sounds = document.getElementById(theSound);
    sounds.load();
    sounds.play();
}
/*stops() is the function that pauses all sounds*/
function stops() {
    var aud = document.getElementsByTagName("AUDIO");

    for(i=0; i<aud.length; i++) {
        aud[i].pause();
    }
}

/*showFacts() is the function that removes the dino pic
and returns the dino facts*/
function showFacts() {
    var facts = document.getElementById("dFact");
    var pic = document.getElementById("dinoPic");
    facts.style.display = "block";
    pic.style.display = "none";
    plays('fact');
}
/*hideFacts() is the function that reverses the dino facts
and dino pic*/
function hideFacts() {
    var facts = document.getElementById("dFact");
    var pic = document.getElementById("dinoPic");
    pic.style.display = "block";
    facts.style.display = "none";  
    stops();  
}

function showMenu(menus,menus2,menus3) {
    var change = document.getElementById(menus);
    var change2 = document.getElementById(menus2);

    if(window.matchMedia("(min-width: 1024px)").matches) {
        var change3 = document.getElementById(menus3);
        if(change.style.display == "block")
            change.style.display = "none";
        else {
            change.style.display = "block";
            change3.style.display = "none";
        }
    }
     
    else{
      if(change.style.display == "block")
          change.style.display = "none";
     else {
         change.style.display = "block";
         change2.style.display = "none";
     }
    }

     
}

function closeMenu() {
    var menus = [];
    var starts;
    menus[0] = document.getElementById('nav-menu');
    menus[1] = document.getElementById('cat');
    menus[2] = document.getElementById('nav-settings');

    if(window.matchMedia("(min-width: 1024px)").matches)
        starts = 1;
    else
        starts = 0;
        
    for(i=starts; i<3; i++) {
        menus[i].style.display = "none";
    }
}

document.getElementById("letters").addEventListener("click", closeMenu);
document.getElementById("dinos").addEventListener("click", closeMenu);
document.getElementById("sounds").addEventListener("click", closeMenu);

function volumeLevel() {
    var vol = document.getElementById("vol");
    var volumes = vol.value/100;

    var aud = document.getElementsByTagName("AUDIO");
    var volPic = document.getElementById("volPic");

    for(i=0; i<aud.length; i++) {
        aud[i].volume = volumes;
        console.log(aud[i].volume);
    }

    if(vol.value >= 65)
        volPic.innerHTML = "&#X1F50A";
    else if(vol.value > 0)
        volPic.innerHTML = "&#X1F509";
    else
        volPic.innerHTML = "&#X1F507";
}

function unMute() {
    var vol = document.getElementById("vol");

    if(vol.value > 0) {
        vol.value = 0;
    }
    else {
        vol.value = 50;
    }
    volumeLevel();
}



// function lgScreen() {
//     if(window.matchMedia("(min-width: 1024px)").matches) {
//         var getMenu =  document.getElementById("top");
//         getMenu.innerHTML = "Menu";
//     }
// }

// lgScreen();