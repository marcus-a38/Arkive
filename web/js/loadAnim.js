const quips = [
    "Spinning records...",
    "Tuning guitars...",
    "Mixing beats...",
    "Finding rhythm...",
    "Strumming strings...",
    "Rehearsing single...",
    "Composing song...",
    "Playing chords..."
];
const page = document.getElementById('body');
const solarsys = document.getElementById('load');
const quipText = document.getElementById('quip');
const quip = getQuip();

startLoad();

window.onload = function() {
    revealPageContents();
}

function getQuip() {
    let random = Math.floor(Math.random() * quips.length);
    return quips[random];
}

function revealPageContents() {
    setTimeout(() => {
        solarsys.style.display = "none";
        page.style.display = "block";
    }, 750);
}

function startLoad() {
    page.style.display = "none";
    solarsys.style.display = "flex";
    quipText.innerHTML = quip;
}
