require('../bootstrap');

import { renderForm } from './desktop/renderForm.js';
import { renderCard } from './desktop/cardFlip.js';
import { renderAccordion } from './desktop/accordion.js';
import { renderMenu } from './desktop/menu.js';
import {renderCategoryFilter} from './desktop/categoryFilter.js';


renderForm ();
renderCard ();
renderAccordion ();
renderMenu();
renderCategoryFilter();