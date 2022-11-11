require('../../bootstrap');

import {renderActiveButton} from './activeButton.js'
import {renderCkeditor} from './ckeditor.js';
import {renderForm} from './form.js';
import { renderInputCounter } from './inputCounter.js';
import {renderMenu} from './menu.js';
import {renderModalDelete} from './modalDelete.js';
require('./modalDeleteImage');
require('./modalImage');
// import {renderMessages} from './messages.js';
import {renderTable} from './table.js';
import {renderTabs} from './tabs.js';
import {renderUploadImage} from './uploadImage';
// import {renderWait} from './wait.js';


renderActiveButton();
renderCkeditor();
renderForm();
renderInputCounter();
renderMenu();
renderModalDelete();
// renderMessages();
renderTable();
renderTabs();
renderUploadImage();
// renderWait();