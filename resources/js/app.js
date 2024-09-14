import './bootstrap';
import 'daisyui'
import AOS from "aos";
import 'aos/dist/aos.css'

import Alpine from 'alpinejs';

document.addEventListener('DOMContentLoaded', () => AOS.init() )

window.Alpine = Alpine;
Alpine.start();

