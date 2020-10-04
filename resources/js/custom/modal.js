$.fn.extend(
    {
        modal: function (action) {
            const modal = this[0];
            const body = document.querySelector('body')
            const overlay = modal.querySelector('.modal-overlay')
            const closemodal = modal.querySelectorAll('.modal-close')

            switch(action) {
                case 'show':
                    toggleModal()
                    break;
                case 'hide':
                    toggleModal()
                    break;
                default:

            }

            overlay.addEventListener('click', toggleModal)
            for (var i = 0; i < closemodal.length; i++) {
                closemodal[i].addEventListener('click', toggleModal)
            }

            document.onkeydown = function (evt) {
                evt = evt || window.event
                var isEscape = false
                if ("key" in evt) {
                    isEscape = (evt.key === "Escape" || evt.key === "Esc")
                } else {
                    isEscape = (evt.keyCode === 27)
                }
                if (isEscape && document.body.classList.contains('modal-active')) {
                    toggleModal()
                }
            };

            function toggleModal() {
                modal.classList.toggle('opacity-0')
                modal.classList.toggle('pointer-events-none')
                body.classList.toggle('modal-active')
            }
        }

    }
);
