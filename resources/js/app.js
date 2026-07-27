import './bootstrap';
import '../css/app.css';
import ujs from '@rails/ujs';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

ujs.start();
Alpine.start();
