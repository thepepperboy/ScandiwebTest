const select = document.getElementById('productType');
const description = document.querySelectorAll('div.description');

select.addEventListener('change', function () {
    for (let otherDiv of document.querySelectorAll('div.description')) {
        otherDiv.classList.add("hidden");
        otherDiv.classList.remove("show");
    }
    const div = document.getElementById(this.value);
    div.classList.remove("hidden");
    div.classList.add("show");
});

if (select.value != 'defult') {
    const show = document.getElementById(select.value);
    show.classList.remove("hidden");
    show.classList.add("show");
}