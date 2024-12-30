            document.addEventListener('DOMContentLoaded', () => {
                const imageContainer = document.querySelector('.image-container');
                const hoverPopup = document.querySelector('.hover-popup');

                imageContainer.addEventListener('mouseenter', () => {
                    hoverPopup.style.display = 'block';
                });

                imageContainer.addEventListener('mouseleave', () => {
                    hoverPopup.style.display = 'none';
                });
            });
