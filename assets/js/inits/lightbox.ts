import GLightbox from 'glightbox';
import "glightbox/dist/css/glightbox.min.css"

export default function lightbox(){
    const lightbox = GLightbox({
        selector:  '.glightbox',
        touchNavigation: true,
        loop: true,
    });
}
