var check = function() {
    if (document.getElementById('password').value === document.getElementById('confirm').value) {
        document.getElementById('matching').display = 'block';
        document.getElementById('matching').style.color = 'green';
        document.getElementById('matching').innerHTML = 'The passwords matched';
        document.getElementById('confirm').style.borderColor = 'green';

    } else {
        document.getElementById('matching').display = 'block';
        document.getElementById('matching').style.color = '#d25e5a';
        document.getElementById('matching').innerHTML = 'The passwords do not match';
        document.getElementById('confirm').style.borderColor = '#d25e5a';
    }
}