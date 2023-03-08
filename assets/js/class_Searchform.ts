import flatpickr from "flatpickr";
import "flatpickr/dist/flatpickr.css"
import "flatpickr/dist/l10n/pl.js";

export default class searchForm{
    form;
    inputs = {
        location: null,
        dates: null,
        guests: null,
        addons: null,
    };
    searchInputs = {
        location: null,
        dates: null,
        guests: null,
        addons: null,
    }
    values = {
        location: "",
        dates: "",
        guests: "",
        addons: "",
    }
    constructor(selector){
        this.form = document.querySelector(selector);
        this.inputs.location = this.form.querySelector("#location")
        this.inputs.guests = this.form.querySelector("#people")
        this.inputs.dates = this.form.querySelector("#dates")
        this.inputs.addons = this.form.querySelector("#multiple-addons")

        this.searchInputs.location = this.form.querySelector("#searchLocation")
        this.searchInputs.guests = this.form.querySelector("#searchGuests")
        this.searchInputs.dates = this.form.querySelector("#searchDates")
        this.searchInputs.addons = this.form.querySelector("#searchAddons")

        this.datePicker();
        this.populate();
        this.onChange();
        this.updateSearchValue();
    }
    populate(){
        for (const [key, input] of Object.entries(this.inputs)){
            let value = (input as HTMLInputElement).value;
            switch(key){
                case "location": {
                    this.values.location = value;
                    break;
                }
                case "dates": {
                    this.values.dates = value;
                    break;
                }
                case "guests": {
                    this.values.guests = value;
                    break;
                }
                case "addons": {
                    this.values.addons = value;
                    break;
                }
                default: {
                    break;
                }
            }
        }
        console.log("--- Form: Values populated")
    }
    onChange(){
        for (const [key, input] of Object.entries(this.inputs)){
            input.addEventListener("change", (ev) => {
                let value = (ev.currentTarget as HTMLInputElement).value;
                console.log(key);
                switch(key){
                    case "location": {
                        this.values.location = value;
                        break;
                    }
                    case "dates": {
                        this.values.dates = value;
                        break;
                    }
                    case "guests": {
                        this.values.guests = value;
                        break;
                    }
                    case "addons": {
                        this.values.addons = value;
                        break;
                    }
                    default: {
                        break;
                    }
                }
                console.log("--- Form: change at " + key)
                this.updateSearchValue();
            })
        }
        console.log("--- Form: change events handeled")
    }
    datePicker(){
        let dateInput = this.inputs.dates as HTMLInputElement;
        flatpickr('.search-date', {
            locale: "pl",
            mode: "range",
            wrap: true,
            enableTime: false,
            dateFormat: "Y-m-d",
            onChange: function(selectedDates, dateStr, instance){
                if (selectedDates[0] && selectedDates[1]){
                    let from = flatpickr.formatDate(selectedDates[0], "Y-m-d");
                    let to = flatpickr.formatDate(selectedDates[1], "Y-m-d");
                    dateInput.value = from + "," + to;
                    dateInput.dispatchEvent(new Event("change"));
                }
            },
          });
        console.log("--- Form: date picker inited")
    }
    updateSearchValue(){
        (this.searchInputs.location as HTMLInputElement).value = this.values.location;
        (this.searchInputs.guests as HTMLInputElement).value = this.values.guests;
        (this.searchInputs.dates as HTMLInputElement).value = this.values.dates;
        (this.searchInputs.addons as HTMLInputElement).value = this.values.addons;
        console.log(this.values);
    }
}