function addCharacteristicModal() {
    $('#addCharacteristicModal').modal('show');
}

function addCharacteristicValueModal(characteristic, title) {
    document.getElementById('charId').value = characteristic;
    document.getElementById('characteristicValueLabel').innerHTML = title+' добавити значення';
    $('#addCharacteristicValueModal').modal('show');
}

function addNewCharValue(ev, product) {
    ev.preventDefault();
    // let product = {{ product.id }};
    let characteristic = document.getElementById('charId').value;
    let translations = {
        uk: document.getElementById('charValueUK').value,
        ru: document.getElementById('charValueRU').value
    };
    document.getElementById('charValueRU').value = '';
    document.getElementById('charValueUK').value = '';
    let postData = {
        product,
        characteristic,
        translations
    };
    $.ajax({
        type: "POST",
        url: '/admin/api/characteristic-value-add/',
        data: postData,
        success: function (response) {
            if(response.success) {
                let select = document.querySelector("[name='characteristic["+response.data.characteristicId+"]']");
                let opt = document.createElement('option');
                opt.value = response.data.valueId;
                opt.innerHTML = response.data.name;
                select.appendChild(opt);
                select.value = response.data.valueId;
                $('#addCharacteristicValueModal').modal('hide');
            }
        },
        error: function (response) {
            console.log('fail');
        }
    });
}

function addNewChar(ev, category) {
    ev.preventDefault();
    // let category = {{ product.category.id }};
    let isFilter = 0;
    let translations = {
        ru: {
            name: document.getElementById('charTitleRU').value,
            measurement: document.getElementById('charMeasurementRU').value,
        },
        uk: {
            name: document.getElementById('charTitleUK').value,
            measurement: document.getElementById('charMeasurementUK').value,
        }
    };
    let postData = {
        category,
        translations,
        isFilter
    };
    $.ajax({
        type: "POST",
        url: '/admin/api/characteristic-add/',
        data: postData,
        success: function (response) {
            if(response.success) {
                $('#addCharacteristicModal').modal('hide');
                document.getElementById('charTitleRU').value = '';
                document.getElementById('charTitleUK').value = '';
                document.getElementById('charMeasurementRU').value = '';
                document.getElementById('charMeasurementUK').value = '';
            }
        },
        error: function (response) {
            console.log('fail');
        }
    });
}

function changeCharValue(product, characteristic, value) {
    let postData = {
        product,
        characteristic,
        value
    };

    $.ajax({
        type: "POST",
        url: '/admin/api/product-characteristic-value/',
        data: postData,
        success: function (response) {
            if(response.success) {

            }
        },
        error: function (response) {
            console.log('fail');
        }
    });
}

function setCharacteristicChangeValueListener() {
    let charSelects = document.getElementsByClassName('characteristics');

    for(let charSelect of charSelects) {
        console.log(charSelect);
        charSelect.addEventListener('change', function(e) {
            let product = this.getAttribute('data-product');
            let characteristic = this.getAttribute('data-characteristic');
            let newValue = this.value;

            changeCharValue(product, characteristic, newValue);
        }, false);
    }
}

setCharacteristicChangeValueListener();
