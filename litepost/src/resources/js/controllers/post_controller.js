import { Controller } from 'stimulus';
import axios from 'axios';

export default class extends Controller
{
    static get targets()
    {
        return [
            'deleteForm'
        ];
    }

    deleteFormHandler(event)
    {
        event.preventDefault();

        this.deleteFormTarget.submit();
    }

}