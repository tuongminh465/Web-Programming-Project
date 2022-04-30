if (document.readyState == 'loading') {
    document.addEventListener("DOMContentLoaded", ready);
}
else {
    ready();
}

function ready() {

    if(localStorage.getItem('userInfo') !== '') {
        const userInfo = JSON.parse(localStorage.getItem('userInfo'));

        document.getElementById('bio-field').innerHTML = userInfo.bio;
        document.getElementById('full-name').innerHTML = userInfo.fullName;
        document.getElementById('dob').innerHTML = userInfo.dob;
        document.getElementById('email').innerHTML = userInfo.email;
        document.getElementById('hobby').innerHTML = userInfo.hobby;
    }

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

function editProfile() {
    const bio = document.getElementById('bio-field').innerHTML;
    const fullName = document.getElementById('full-name').innerHTML;
    const dob = document.getElementById('dob').innerHTML;
    const email = document.getElementById('email').innerHTML;
    const hobby = document.getElementById('hobby').innerHTML;

    const userInfoObject = {
        bio,
        fullName,
        dob,
        email,
        hobby,
    }

    localStorage.setItem('userInfo', JSON.stringify(userInfoObject));
    window.location.href='./editProfile.php';
}
