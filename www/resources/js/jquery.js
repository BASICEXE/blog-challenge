
import ckediter from '@ckeditor/ckeditor5-build-classic';

import MyUploadAdapter from './jquery/MyUploadAdapter'

function MyCustomUploadAdapterPlugin( editor ) {
  editor.plugins.get( 'FileRepository' ).createUploadAdapter = ( loader ) => {
    // Configure the URL to the upload script in your back-end here!
    return new MyUploadAdapter( loader );
  };
}

const config = {
  // toolbar: [
  //   'heading',
  //   '|',
  //   'bold',
  //   'italic',
  //   'link',
  //   'bulletedList',
  //   'numberedList',
  //   'alignment',
  //   '|',
  //   'blockQuote',
  //   'undo',
  //   'redo'
  // ],
  language: 'ja',
  heading: {
    options: [
      { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
      { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
      { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
    ]
  },
  extraPlugins: [ MyCustomUploadAdapterPlugin ],
}

const edit = document.querySelector('.admin-editer')
if (edit) {

  ckediter.create(edit, config)
    .then(editor => {
      console.log( editor )
    })
    .catch(error => {
      console.error( error )
    })

}


