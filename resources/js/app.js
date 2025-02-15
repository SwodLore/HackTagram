import Dropzone from "dropzone";

Dropzone.autoDiscover = false;

const dropzone = new Dropzone("#my-dropzone", {
    dictDefaultMessage: 'Sube tu imagen aquí',
    acceptedFiles: ".png, .jpg, .jpeg .gif",
    addRemoveLinks: true,
    dictRemoveFile: 'Borrar archivo',
    maxFilesize: 1,
    uploadMultiple: false,

    init: function() {
        if(document.querySelector('input[name="imagen"]').value.trim()) {
            const imagenPublicada = {}
            imagenPublicada.size =  1234;
            imagenPublicada.name =  document.querySelector('input[name="imagen"]').value;

            this.options.addedfile.call(this, imagenPublicada);
            this.options.thumbnail.call(this, imagenPublicada, `/uploads/${imagenPublicada.name}`);
            imagenPublicada.previewElement.classList.add("dz-success", "dz-complete");
        }
    }
})

dropzone.on("success", function(file, response) {
    document.querySelector('input[name="imagen"]').value = response.imagen;
});
dropzone.on("removedfile", function(file) {
    document.querySelector('input[name="imagen"]').value = '';
});
