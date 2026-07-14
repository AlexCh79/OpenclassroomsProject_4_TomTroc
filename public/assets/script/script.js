// Affichage et masquage des éléments mobile ou PC

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

// Gestion de la recherche des livres
document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.getElementById('search-books');
    const cards = document.querySelectorAll('.card-book');

    searchInput.addEventListener('input', () => {
        const query = searchInput.value.toLowerCase();

        cards.forEach(card => {
            const title = card.querySelector('.title').textContent.toLowerCase();

            if (title.includes(query)) {
                card.parentElement.style.display = "block"; // le <a>
            } else {
                card.parentElement.style.display = "none";
            }
        });
    });
});