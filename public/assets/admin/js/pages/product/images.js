let imageToHide = null;
let videoToDelete = null;

function setEventToDeleteButtons() {
    let hideButtons = document.getElementsByClassName('deleteProductFile');

    for(let hideButton of hideButtons) {
        let image = hideButton.getAttribute('data-image');
        hideButton.onclick = function() {
            askHideImage(image);
        }
    }
}

function setEventToDeleteVideoButtons() {
    let deleteButtons = document.getElementsByClassName('deleteProductVideo');

    for(let deleteButton of deleteButtons) {
        let video = deleteButton.getAttribute('data-video');
        deleteButton.onclick = function() {
            askDeleteVideo(video);
        }
    }
}

function setEventToIsMain() {
    let checkboxes = document.getElementsByClassName('setIsMainFile');

    for(let checkbox of checkboxes) {
        checkbox.onchange = function() {
            let image = checkbox.getAttribute('data-image');
            let product = checkbox.getAttribute('data-product');
            if(checkbox.checked) {
                setAllAnotherIsMainFalse(image);
            }
            updateImage(image, false, checkbox.checked, false, product);
        }
    }
}

function setEventToQueueIndex() {
    let inputs = document.getElementsByClassName('setQueueIndex');

    for(let input of inputs) {
        let image = input.getAttribute('data-image');
        input.oninput = function() {
            if(input.value && Number.isInteger(parseInt(input.value))) {
                updateImage(image, input.value);
            }
        }
    }
}

function setAllEvents() {
    setEventToDeleteButtons();
    setEventToIsMain();
    setEventToQueueIndex();
    setEventToDeleteVideoButtons();
}

function setAllAnotherIsMainFalse(mainImage) {
    let checkboxes = document.getElementsByClassName('setIsMainFile');

    for(let checkbox of checkboxes) {
        let image = checkbox.getAttribute('data-image');
        if(mainImage !== image) {
            checkbox.checked = false;
        }
    }
}

function askHideImage(image) {
    imageToHide = image;
    $("#deleteModalFile").modal("show");
}

function askDeleteVideo(vidoe) {
    videoToDelete = vidoe;
    $("#deleteModalVideo").modal("show");
}

function hideImage() {
    $("#deleteModalFile").modal("hide");
    if(imageToHide) {
        updateImage(imageToHide, false, false, true);
    }
}

function updateImage(image, queueIndex = false, isMain = false, isHidden = false, product = false) {
    let postData = {
        image
    };
    if(queueIndex) {
        postData.queueIndex = queueIndex;
    }
    if(isMain) {
        postData.isMain = isMain;
    }
    if(isHidden) {
        postData.isHidden = isHidden;
    }
    if(product) {
        postData.product = product;
    }

    $.ajax({
        type: "PUT",
        url: '/admin/api/product-image/',
        data: postData,
        success: function (response) {
            if(response.success) {
                if(response.data.image && response.data.isHidden) {
                    removeImage(response.data.image);
                }
            }
        },
        error: function (response) {
            console.log(response);
        }
    });
}

function showAddImageModal() {
    $("#addImageModal").modal("show");
}
function showAddVideoModal() {
    $("#addVideoModal").modal("show");
}

function addNewImage(form, event) {
    event.preventDefault();

    let postData = new FormData();
    postData.append("queueIndex", form.queueIndex.value);
    postData.append("isMain", form.isMain.checked);
    postData.append("product", form.product.value);
    postData.append("image", form.image.files[0], form.image.files[0].name);

    $.ajax({
        type: "POST",
        processData: false,
        contentType: false,
        url: '/admin/api/product-image/',
        data: postData,
        success: function (response) {
            if(response.success) {
                addNewImageItem(response.data);
                $("#addImageModal").modal("hide");
                setAllEvents();
            }
        },
        error: function (response) {
            console.log(response);
        }
    });
}

function addNewVideo(form, event) {
    event.preventDefault();
    let video = getIdFromYouTubeUrl(form.video.value);

    let postData = {
        video,
        product: form.product.value
    };

    $.ajax({
        type: "POST",
        url: '/admin/api/product-video/',
        data: postData,
        success: function (response) {
            if(response.success) {
                addNewVideoItem(response.data);
                $("#addVideoModal").modal("hide");
                setAllEvents();
            }
        },
        error: function (response) {
            console.log(response);
        }
    });
}

function deleteVideo() {
    $.ajax({
        type: "DELETE",
        url: '/admin/api/product-video/?video='+videoToDelete,
        success: function (response) {
            if(response.success) {
                $("#deleteModalVideo").modal("hide");
                removeVideo(response.data.video);
            }
        },
        error: function (response) {
            console.log(response);
        }
    });
}

function getIdFromYouTubeUrl(url){
    let regExp = /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/;
    let match = url.match(regExp);
    return (match&&match[7].length==11)? match[7] : false;
}

function removeImage(image) {
    let imageItem = document.getElementById('image-'+image);
    imageItem.remove();
}

function removeVideo(video) {
    let videoItem = document.getElementById('video-'+video);
    videoItem.remove();
}

function addNewImageItem(image) {
    if(image.isMain) {
        setAllAnotherIsMainFalse(image.id);
    }
    let productItems = document.getElementsByClassName('imageItem');
    let lastProductItem = productItems[productItems.length - 1];
    let productFilesTable = document.getElementById('productFilesTable');
    let wrapper = document.createElement('tr');
    let imageWrapper = document.createElement('td');
    let queueIndexWrapper = document.createElement('td');
    let queueIndexInput = document.createElement('input');
    let isMainWrapper = document.createElement('td');
    let isMainInput = document.createElement('input');
    let actionWrapper = document.createElement('td');
    let actionButton = document.createElement('button');
    let actionButtonIcon = document.createElement('i');
    let img = document.createElement('img');

    wrapper.setAttribute('id', 'image-'+image.id);

    img.setAttribute('src', image.path);
    img.style.width = '150px';
    img.style.height = '150px';
    img.style.objectFit = 'contain';
    imageWrapper.appendChild(img);

    queueIndexInput.setAttribute('type', 'text');
    queueIndexInput.setAttribute('data-image', image.id);
    queueIndexInput.classList.add('form-control');
    queueIndexInput.classList.add('setQueueIndex');
    queueIndexInput.value = image.queueIndex;
    queueIndexWrapper.appendChild(queueIndexInput);

    isMainInput.setAttribute('type', 'checkbox');
    isMainInput.setAttribute('data-image', image.id);
    isMainInput.setAttribute('data-product', image.productId);
    isMainInput.classList.add('form-control');
    isMainInput.classList.add('setIsMainFile');
    isMainInput.checked = image.isMain;
    isMainWrapper.appendChild(isMainInput);

    actionButton.classList.add('btn');
    actionButton.classList.add('btn-white');
    actionButton.classList.add('delete');
    actionButton.classList.add('deleteProductFile');
    actionButton.setAttribute('data-image', image.id);
    actionButtonIcon.classList.add('fa');
    actionButtonIcon.classList.add('fa-trash');
    actionButton.appendChild(actionButtonIcon);
    actionWrapper.appendChild(actionButton);


    wrapper.appendChild(imageWrapper);
    wrapper.appendChild(queueIndexWrapper);
    wrapper.appendChild(isMainWrapper);
    wrapper.appendChild(actionWrapper);

    productFilesTable.appendChild(wrapper);

    lastProductItem.after(wrapper);
}

function addNewVideoItem(video) {
    let productVideosTable = document.getElementById('productFilesTable');
    let wrapper = document.createElement('tr');
    let imageWrapper = document.createElement('td');
    let imageLink = document.createElement('a');
    let img = document.createElement('img');
    let queueIndexWrapper = document.createElement('td');
    let isMainWrapper = document.createElement('td');
    let actionWrapper = document.createElement('td');
    let actionButton = document.createElement('button');
    let actionButtonIcon = document.createElement('i');

    wrapper.setAttribute('id', 'video-'+video.id);

    imageLink.setAttribute('href', video.videoUrl);
    imageLink.setAttribute('target', '_blank');

    img.setAttribute('src', video.preview);
    img.style.width = '150px';
    img.style.height = '150px';
    img.style.objectFit = 'contain';
    imageLink.appendChild(img);
    imageWrapper.appendChild(imageLink);

    queueIndexWrapper.innerText = '-';

    isMainWrapper.innerText = '-';

    actionButton.classList.add('btn');
    actionButton.classList.add('btn-white');
    actionButton.classList.add('delete');
    actionButton.classList.add('deleteProductVideo');
    actionButton.setAttribute('data-video', video.id);
    actionButtonIcon.classList.add('fa');
    actionButtonIcon.classList.add('fa-trash');
    actionButton.appendChild(actionButtonIcon);
    actionWrapper.appendChild(actionButton);


    wrapper.appendChild(imageWrapper);
    wrapper.appendChild(queueIndexWrapper);
    wrapper.appendChild(isMainWrapper);
    wrapper.appendChild(actionWrapper);

    productVideosTable.appendChild(wrapper);
}

setAllEvents();
