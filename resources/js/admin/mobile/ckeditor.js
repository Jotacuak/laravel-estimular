import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
require('@ckeditor/ckeditor5-build-classic/build/translations/es.js');

export let renderCkeditor = () => {

    document.addEventListener("renderFormModules",( event =>{
        renderCkeditor();
    }),{once: true});

    window.ckeditors = [];

    document.querySelectorAll('.ckeditor').forEach(ckeditor => {

        ClassicEditor.create(ckeditor, {
            
            toolbar: {
                items: [
                    'bold',
                    'italic',
                    'link',
                    'bulletedList',
                    'numberedList',
                    '|',
                    'outdent',
                    'indent',
                    '|',
                    'blockQuote',
                    'undo',
                    'redo'
                ]
            },
            language: 'es',
            licenseKey: '',
        })
        .then( classicEditor => {
            ckeditors[ckeditor.name] = classicEditor;
        })
        .catch( error => {
            console.error(error);
        } );
    });
}