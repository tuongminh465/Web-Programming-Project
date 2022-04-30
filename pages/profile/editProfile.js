if (document.readyState == 'loading') {
    document.addEventListener("DOMContentLoaded", ready);
}
else {
    ready();
}

function ready() {
    if (localStorage.getItem('userInfo') !== '') {
        const userInfo = JSON.parse(localStorage.getItem('userInfo'));
        
        document.getElementById('edit-bio-input').innerHTML = userInfo.bio;

        document.forms['edit-profile-form']['full-name'].value = userInfo.fullName;
        document.forms['edit-profile-form']['dob'].value = userInfo.dob;
        document.forms['edit-profile-form']['email'].value = userInfo.email;
        document.forms['edit-profile-form']['hobby'].value = userInfo.hobby;

    }
}

function saveProfile() {

    const bio = document.getElementById('edit-bio-input').value;

    const fullName = document.forms['edit-profile-form']['full-name'].value;
    const dob = document.forms['edit-profile-form']['dob'].value;
    const email = document.forms['edit-profile-form']['email'].value;
    const hobby = document.forms['edit-profile-form']['hobby'].value;

    const userInfoObject = {
        bio,
        fullName,
        dob,
        email,
        hobby,
    }

    localStorage.setItem('userInfo', JSON.stringify(userInfoObject));
}