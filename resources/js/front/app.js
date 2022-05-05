require('../bootstrap');

import { renderForm } from './desktop/renderForm.js';
import { flipCard } from './desktop/cardFlip.js';
import { accordionRender } from './desktop/accordion.js';
import { renderMenu } from './desktop/menu.js';

// import { memoryGame } from './desktop/renderMemory.js';


renderForm ();
flipCard ();
accordionRender ();
renderMenu();
// memoryGame ();