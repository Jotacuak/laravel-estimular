require('../bootstrap');

import { renderForm } from './desktop/renderForm.js';
import { renderCard } from './desktop/cardFlip.js';
import { renderAccordion } from './desktop/accordion.js';
import { renderMenu } from './desktop/menu.js';

// import { memoryGame } from './desktop/renderMemory.js';


renderForm ();
renderCard ();
renderAccordion ();
renderMenu();

// memoryGame ();