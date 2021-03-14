// Design Model S functions

// function to rotate between car paint colors
function changeColor(id, color) {
    // removes active class from all elements if it is present
    document.getElementById("#white-paint").classList.remove('paint-ball-active')
    document.getElementById("#black-paint").classList.remove('paint-ball-active')
    document.getElementById("#gray-paint").classList.remove('paint-ball-active')
    document.getElementById("#blue-paint").classList.remove('paint-ball-active')
    document.getElementById("#red-paint").classList.remove('paint-ball-active')
    
    // add active class to clicked element
    document.getElementById(id).classList.add('paint-ball-active')

    // changes image
    document.getElementById("#main-model-s-image").src = '../assets/model_s_' + color + '.png'
}

// function to toggle dark mode on/off
function changeTheme() {
    // changing button text and logo colors
    if (document.getElementById("#theme-toggle").innerText == "Dark Mode Theme") {
        document.getElementById("#theme-toggle").innerText = "Light Mode Theme"
        document.getElementById("#nav-logo").src = '../assets/tesla_logo_title_white.png'
    }
    else {
        document.getElementById("#theme-toggle").innerText = "Dark Mode Theme"
        document.getElementById("#nav-logo").src = '../assets/tesla_logo_title.png'
    }

    // changing theme
    document.getElementById("#main-body").classList.toggle('dark-mode')
}