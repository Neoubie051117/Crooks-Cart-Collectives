// Hero Slider Functionality
const quoteImageShowcase = document.getElementById("quoteImageShowcase");
const quoteText = document.getElementById("quoteText");

if (quoteImageShowcase && quoteText) {
    const slides = [
        { image: "./assets/Showcase1.png", text: "Burden becomes lighter when everyone helps." },
        { image: "./assets/Showcase2.png", text: "No strong fence against a united people." },
        { image: "./assets/Showcase3.png", text: "The pain of one may affect everyone." },
        { image: "./assets/Showcase4.png", text: "Community are people that strives for better tomorrow." }
    ];
    
    let imagesLoaded = 0;
    slides.forEach(slide => {
        const img = new Image();
        img.src = slide.image;
        img.onload = () => {
            imagesLoaded++;
            if (imagesLoaded === slides.length) {
                quoteImageShowcase.classList.add('loaded');
            }
        };
    });
    
    let currentIndex = 0;
    const slideDuration = 5000;
    
    function changeBackground() {
        currentIndex = (currentIndex + 1) % slides.length;
        quoteImageShowcase.style.opacity = "0";
        quoteText.style.opacity = "0";
        
        setTimeout(() => {
            quoteImageShowcase.style.backgroundImage = `url('${slides[currentIndex].image}')`;
            quoteText.innerHTML = `<h1>${slides[currentIndex].text.replace(/(everyone|united|pain|people)/g, '<span>$1</span>')}</h1>`;
            quoteImageShowcase.style.opacity = "1";
            quoteText.style.opacity = "1";
        }, 1000);
    }
    
    const checkLoad = setInterval(() => {
        if (imagesLoaded === slides.length) {
            clearInterval(checkLoad);
            setInterval(changeBackground, slideDuration);
        }
    }, 100);
}
