let sidebar = document.getElementById('switch_sidebar');
sidebar.addEventListener('click', getLifeSidebar);

function getLifeSidebar(){
    let menu = document.getElementById('side_menu');
    menu.classList.toggle('switch_menu');
    let spans = document.querySelectorAll('#side_menu span');
    spans.forEach(function(item){
        item.classList.toggle('d-none');
    });
}

