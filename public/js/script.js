const accordions = document.querySelectorAll('.faq__accordion');

accordions.forEach(accordion => {
    accordion.addEventListener('click', () => {
        const body = accordion.querySelector('.faq__accordion--body');
        body.classList.toggle('active');
    })
})


const botoesSobe = document.querySelectorAll('.back-up');


botoesSobe.forEach(botao => {
    botao.addEventListener('click', (event) => {
        event.preventDefault(); 
        
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
});
