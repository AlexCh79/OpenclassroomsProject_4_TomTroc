const burger = document.querySelector('.burger');
const menu = document.querySelector('.mobile-menu');

burger.addEventListener('click', () => {
    menu.classList.toggle('open');
});


document.addEventListener('DOMContentLoaded', () => {
    const isMobile = window.matchMedia("(max-width: 768px)").matches;
    const url = new URL(window.location.href);

    if (isMobile && url.searchParams.get('otherId')) {
        document.querySelector('.messenger').style.display = 'none';
        document.querySelector('.conversation-view').classList.remove('mobile-hidden');
        document.querySelector('.conversation-view').style.display = 'block';
    }
});