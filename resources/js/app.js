import './bootstrap';
import 'daisyui'
import AOS from "aos";
import 'aos/dist/aos.css'

import Alpine from 'alpinejs';
import persist from '@alpinejs/persist'

Alpine.plugin(persist)
document.addEventListener('alpine:init', () => {
    Alpine.store('darkMode', {
        on: Alpine.$persist(true).as('darkmode'),
        toggle() {
            this.on = !this.on
        }
    })
    document.body.classList.remove('hidden')
})

document.addEventListener('DOMContentLoaded', () => AOS.init() )

window.Alpine = Alpine;
Alpine.start();

