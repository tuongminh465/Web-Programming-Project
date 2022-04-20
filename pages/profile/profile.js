if (document.readyState == 'loading') {
    document.addEventListener("DOMContentLoaded", ready);
}
else {
    ready();
}

function ready() {
    const avatar = document.querySelector('#avatar');
    const editAvatar = document.querySelector('#edit-avatar');

    editAvatar.addEventListener('change', function(){
        const chosenFile = this.files[0];
        
        if (chosenFile) {
            const reader = new FileReader();
            reader.addEventListener('load', function(){
                avatar.setAttribute('src', reader.result)
            })
            reader.readAsDataURL(chosenFile);
        }
    });
}
