require('../../bootstrap');

import {renderMenu} from './menu.js';
import {renderCkeditor} from './ckeditor.js';
import {renderTabs} from './tabs.js';
import {adminForm} from './form.js';

renderTabs();
renderCkeditor();
renderMenu();
adminForm();