var pencarian = document.getElementById('pencarian');
var cari = document.getElementById('cari');
var buku_s = document.getElementById('buku_s');
pencarian.addEventListener('keyup', function(){
    
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function(){
        if( xhr.readyState == 4 && xhr.status == 200 ){
            buku_s.innerHTML = xhr.responseText;
        }
    }

    xhr.open('GET', 'buku_ed.php?pencarian=' + pencarian.value, true);
    xhr.send();

});
