
const txtoldpass = document.querySelector('.oldpass');
const showoldpass = document.querySelector('.showoldpass');
const txtnewpass = document.querySelector('.newpass');
const shownewpass = document.querySelector('.shownewpass');





showoldpass.addEventListener('mouseover', function() {
    txtoldpass.setAttribute('type', 'text');
});

showoldpass.addEventListener('mouseout', function() {
    txtoldpass.setAttribute('type', 'password');
});


//--------------------------------------------------------------

shownewpass.addEventListener('mouseover', function() {
    txtnewpass.setAttribute('type', 'text');
});

shownewpass.addEventListener('mouseout', function() {
    txtnewpass.setAttribute('type', 'password');
});
