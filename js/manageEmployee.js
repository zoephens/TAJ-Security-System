window.onload= function(){
    const last = document.querySelector('#last-name');
    const first = document.querySelector('#first-name');

    last.addEventListener('input', function(){
        this.value = this.value.replace(/[^\D]/g,'')
    })

    first.addEventListener('input', function(){
        this.value = this.value.replace(/[^\D]/g,'')
    })
}