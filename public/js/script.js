// ===============================
// Section 1: Awardee SHowcase
// ===============================
const animatedElements = document.querySelectorAll(".animate-on-scroll");

function isInViewport(el) {
    const rect = el.getBoundingClientRect();
    return (
        rect.top <= (window.innerHeight || document.documentElement.clientHeight) &&
        rect.bottom >= 0
    );
}

function checkAnimation() {
    animatedElements.forEach(el => {
        if (isInViewport(el)) {
            el.classList.add("visible");
        }
    });
}

window.addEventListener("scroll", checkAnimation);
window.addEventListener("load", checkAnimation);



const showcaseImgs = document.querySelectorAll("#awardee-showcase .showcase-img");
let currentAwardeeIndex = 0;

function showNextImage() {
    showcaseImgs.forEach((img, idx) => {
        img.classList.toggle("active", idx === currentAwardeeIndex);
    });
    currentAwardeeIndex = (currentAwardeeIndex + 1) % showcaseImgs.length;
}

window.addEventListener('load', () => {
    if (showcaseImgs.length) {
        showNextImage();
        setInterval(showNextImage, 5000);
    }
});


// ===============================
// Section 1: Youtube
// ===============================
function onYouTubeIframeAPIReady() {
    const player1 = new YT.Player('yt-video-1', {
        events: {
            'onReady': function (event) {
                const player = event.target;
                const observer = new IntersectionObserver(entries => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            player.playVideo();
                        } else {
                            player.pauseVideo();
                        }
                    });
                }, { threshold: 0.5 });
                observer.observe(document.getElementById('yt-video-1'));
            }
        }
    });
}

(function loadYouTubeAPI() {
    const tag = document.createElement('script');
    tag.src = "https://www.youtube.com/iframe_api";
    const firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
})();


// ===============================
// Section 2: Facilities
// ===============================
const galleryImages = document.querySelectorAll('.gallery-grid img');
const lightbox = document.getElementById('lightbox');
const lightboxImg = document.getElementById('lightbox-img');
const caption = document.getElementById('lightbox-caption');
const closeBtn = document.querySelector('#lightbox .close-btn');
const prevBtn = document.querySelector('#lightbox .prev');
const nextBtn = document.querySelector('#lightbox .next');

let currentGalleryIndex = 0;

function showGalleryImage(index) {
    if (index < 0) index = galleryImages.length - 1;
    if (index >= galleryImages.length) index = 0;
    currentGalleryIndex = index;

    const selectedImg = galleryImages[currentGalleryIndex];
    lightboxImg.src = selectedImg.src;
    caption.textContent = selectedImg.alt || "";
}

galleryImages.forEach((img, index) => {
    img.addEventListener('click', () => {
        currentGalleryIndex = index;
        showGalleryImage(currentGalleryIndex);
        lightbox.style.display = 'flex';

        requestAnimationFrame(() => {
            lightbox.classList.add('show');
        });
    });
});

function closeLightbox() {
    lightbox.classList.remove('show');
    setTimeout(() => {
        lightbox.style.display = 'none';
    }, 300);
}

closeBtn.addEventListener('click', closeLightbox);

// Left and right buttons
prevBtn.addEventListener('click', () => {
    showGalleryImage(currentGalleryIndex - 1);
});
nextBtn.addEventListener('click', () => {
    showGalleryImage(currentGalleryIndex + 1);
});

// Close "X"
lightbox.addEventListener('click', (e) => {
    if (e.target === lightbox) {
        closeLightbox();
    }
});

// Nav close/left/right
document.addEventListener('keydown', (e) => {
    if (lightbox.style.display === 'flex') {
        if (e.key === 'ArrowLeft') showGalleryImage(currentGalleryIndex - 1);
        if (e.key === 'ArrowRight') showGalleryImage(currentGalleryIndex + 1);
        if (e.key === 'Escape') closeLightbox();
    }
});
