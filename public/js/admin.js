/* SIDEBAR ACTIVE */
// Get the container element
var btnContainer = document.getElementById("nav-links");

// Get all buttons with class='btn' inside the container
var btns = btnContainer?.getElementsByClassName("link");

// Loop through the buttons and add the active class to the current/clicked button
for (var i = 0; i < btns?.length; i++) {
    btns[i].addEventListener("click", function () {
        var current = document?.getElementsByClassName("active");
        current[0].className = current[0].className.replace(" active", "");
        this.className += " active";
    });
}

/* TURN ON/OFF GRID/LIST VIEW */
var gView = document.getElementById("g-view");
var lView = document.getElementById("l-view");

var gridView = document.getElementById("grid-view");
var listView = document.getElementById("list-view");

gView?.addEventListener("click", function () {
    gridView.style.display = "grid";
    localStorage.setItem("gridView", gridView.style.display);
    listView.style.display = "none";
    localStorage.setItem("listView", listView.style.display);
});

lView?.addEventListener("click", function () {
    gridView.style.display = "none";
    localStorage.setItem("gridView", gridView.style.display);
    listView.style.display = "flex";
    localStorage.setItem("listView", listView.style.display);
});

window.onload = () => {
    var grid = localStorage.getItem('gridView');
    var list = localStorage.getItem('listView');

    if(grid === 'grid') {
        gridView.style.display = "grid"; // Przywracamy widok grida
        listView.style.display = "none"; // Ukrywamy widok listy
    } else if (list === 'flex') {
        gridView.style.display = "none"; // Ukrywamy widok grida
        listView.style.display = "flex"; // Przywracamy widok listy
    }
};

// add elements to form
$(document).ready(function() {
    var counter = 1;

    $('.section-content .s_form-control:first').hide();

    $(document).on('click', '.btn-add', function() {
        var clonedSection = $(this).closest('.form-wrapper').find('.section-content .s_form-control:first').clone(true);

        // Dodawanie unikalnych nazw do pól formularza
        clonedSection.find('input[name="element_name"]').attr('name', 'element_name' + counter);
        clonedSection.find('textarea[name="element_content"]').attr('name', 'element_content' + counter);

        clonedSection.insertAfter($(this).closest('.form-wrapper').find('.section-content .s_form-control:last')).show().find('.btn-delete').show();

        counter++; // Inkrementacja licznika
    });

    $(document).on('click', '.btn-delete', function() {
        $(this).closest('.s_form-control').remove();
    });
});


