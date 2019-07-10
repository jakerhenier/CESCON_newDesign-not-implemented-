// var bodybg = body.style.backgroundColor;
// var formbg = document.getElementsByClassName('input-form').style.backgroundColor;
// var fontcolor = html.style.color;

// FOR DARK MODE

var mode = document.querySelector('select');
var html = document.querySelector('html');
var form = document.getElementById('login');
var body = document.querySelector('body');
var un = document.getElementById('username');
var pw = document.getElementById('password');
var err = document.getElementById('err-txt');

function changeMode(bodybg, formbg, fontcolor) {
    body.style.backgroundColor = bodybg;
    form.style.backgroundColor = formbg;
    html.style.color = fontcolor;
    un.style.color = fontcolor;
    pw.style.color = fontcolor;
}

mode.onchange = function() {
    if (mode.value === 'Dark') {
        changeMode('#222222', '#333333', '#ffffff');
    }
    else
    {
        changeMode('rgb(240,240,240)', '#ffffff', '#333333');
    }
}

// TOP MENU INTERACTIVITY

var menuButton = document.getElementById('menu-icon');

function expandMenu() {
    const topMenu = document.getElementById('top-menu');
    const menuTop = document.getElementById('top-init');
    const bottomAct = document.getElementById('mobile-bottom');

    if (topMenu.getAttribute('class') === 'top-menu'){
        topMenu.setAttribute('class', 'top-menu-expanded');
        menuTop.style.borderBottom = '1px solid rgba(0,0,0,.2)';
        bottomAct.setAttribute('id', 'mobile-bottom-appear');
    }
    else {
        topMenu.setAttribute('class', 'top-menu');
        menuTop.style.borderBottom = 'none';
        document.getElementById('mobile-bottom-appear').setAttribute('id', 'mobile-bottom');
    }
}

//DARK MODE MAIN PAGES

function darkMode() {
    const darkAttrs = [
        bgClr = '#222222',
        foregroundColor = '#333333',
        fontcolor = '#ffffff',
    ];

    // var darkToggle = document.getElementById('input-toggle');

    document.querySelector('body').style.color = darkAttrs[2];
    document.getElementById('side-menu').style.backgroundColor = darkAttrs[0];
    document.getElementById('menu-link').style.color = darkAttrs[2];
    document.getElementById('item-screen').style.backgroundColor = darkAttrs[1];
    document.getElementById('active-item').style.backgroundColor = darkAttrs[1];
    document.getElementsByClassName('list-item').setAttribute('class', 'darkMode-item');
}