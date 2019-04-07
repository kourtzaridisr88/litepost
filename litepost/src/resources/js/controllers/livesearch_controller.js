import { Controller } from 'stimulus';
import Choices from 'choices.js';

export default class extends Controller
{
    static get targets()
    {
        return [
            'input',
            'results'
        ];
    }

    initialize()
    {
        this.endpoint = this.element.dataset.endpoint;
        this.postTypeId = parseInt(this.element.dataset.posttype);
    }

    connect()
    {
        this.choices = new Choices(this.inputTarget, {
            removeItemButton: true
        });
    }

    search(event)
    {
        var value = event.detail.value;
        console.log(this.postTypeId);
        if(value.length < 4) {
            return false;
        }

        var uri = this.endpoint + '?post_type_id=' + this.postTypeId + '&search=' + value;

        this.choices.ajax((callback) => {
           fetch(uri)
                .then((response) => {
                    response.json().then(function(data) {
                        callback(data.results, 'id', 'title');
                    });
                })
                .catch((error) => {
                    console.log(error);
                });
        });
    }

    teardown() {
        this.choices.destroy();
        console.log('called');
    }
}