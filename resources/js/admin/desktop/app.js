require('../../bootstrap');

import {renderMenu} from './menu.js';
import {renderCkeditor} from './ckeditor.js';
import {renderTabs} from './tabs.js';
import {adminTable} from './table.js';
import {adminForm} from './form.js';

renderTabs();
renderCkeditor();
renderMenu();
adminTable();
adminForm();