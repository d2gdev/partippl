function show_tab(tab_block){
    var tab_block2 = document.getElementsByClassName("edit-profile-right-text-block");

    for (let i = 0; i < tab_block2.length; i++) {
        tab_block2[i].style.display = "none";
    }

    document.getElementById(tab_block).style.display = "flex";
}

document.getElementById("details2").click();