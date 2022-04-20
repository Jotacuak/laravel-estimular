require('../bootstrap');

import { renderForm } from './desktop/renderForm.js';
import { flipCard } from './desktop/cardFlip.js';
import {renderMenu} from './mobile/menu.js';

renderMenu();
renderForm ();
flipCard ();