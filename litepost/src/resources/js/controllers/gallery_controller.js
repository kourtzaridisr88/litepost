import { Controller } from 'stimulus';
import axios from 'axios';

export default class extends Controller
{
    static get targets()
    {
        return [
            'imagesInput',
            'imagesWrapper',
            'deleteForm'
        ];
    }

    initialize()
    {
        this.api = '/litepost/api/v1/'
        this.fieldableName = this.element.getAttribute('data-fieldable');
    }

    upload()
    {
        const _this = this;
        const imagesInput = this.imagesInputTarget;
        var formData = new FormData();

        for (let i = 0; i < imagesInput.files.length; i++) {
            formData.append('images' + i, imagesInput.files[i]);
        }

        axios.post(this.api + 'images/store', formData)
            .then(function(response) {  
                var images = response.data.images;

                images.forEach(image => {
                    _this.showImage(image);
                });
            });
    }

    showImage(image)
    {
        const imagesWrapper = this.imagesWrapperTarget;
        var html = `<div class="image__wrapper col-md-3">
                    <span class="image__action" data-action="click->gallery#deleteImage">&times;</span>
                    <img src="/uploads/images/` + image + `" class="img-thumbnail">
                    <input type="hidden" name="custom_fields[` + this.fieldableName + `][]" value="` + image + `">
                </div>`;
        ;
        
        imagesWrapper.insertAdjacentHTML('beforeend', html);
    }

    deleteImage(event)
    {
        var image = event.target.parentNode;
        const imagesWrapper = this.imagesWrapperTarget;

        imagesWrapper.removeChild(image);
    }

}