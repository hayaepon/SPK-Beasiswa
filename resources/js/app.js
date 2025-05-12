import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import { createIcons } from 'lucide';
lucide.createIcons({ icons });

createIcons();

import Chart from 'chart.js/auto';
